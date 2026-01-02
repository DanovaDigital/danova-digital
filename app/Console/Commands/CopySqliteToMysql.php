<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CopySqliteToMysql extends Command
{
    protected $signature = 'db:copy-sqlite-to-mysql
        {--sqlite-path= : Path to the SQLite database file (e.g. database/database.sqlite or danova)}
        {--sqlite-connection=sqlite : The connection name to use for reading SQLite}
        {--mysql-connection=mysql : The connection name to use for writing MySQL}
        {--skip= : Comma-separated list of tables to skip}
        {--include-migrations : Include the migrations table (default: skipped)}
        {--truncate : Truncate destination MySQL tables before copying}
        {--force : Skip confirmation prompts (required for truncation)}
        {--chunk=500 : Number of rows per insert batch}';

    protected $description = 'Copy all data from a SQLite database into a MySQL database (after migrations)';

    public function handle(): int
    {
        $sqlitePath = $this->option('sqlite-path')
            ?: env('SQLITE_DATABASE_PATH')
            ?: config('database.connections.sqlite.database');

        $sqlitePath = $this->normalizeSqlitePath($sqlitePath);

        if (!is_string($sqlitePath) || $sqlitePath === '' || !file_exists($sqlitePath)) {
            $this->error('SQLite database file not found: ' . (string) $sqlitePath);
            $this->line('Tip: pass --sqlite-path=danova or --sqlite-path=database/database.sqlite');
            return self::FAILURE;
        }

        $sqliteConnName = (string) $this->option('sqlite-connection');
        $mysqlConnName = (string) $this->option('mysql-connection');

        // Re-point the sqlite connection to the provided legacy file.
        config(['database.connections.' . $sqliteConnName . '.database' => $sqlitePath]);

        $sqlite = DB::connection($sqliteConnName);
        $mysql = DB::connection($mysqlConnName);

        try {
            $sqlite->getPdo();
        } catch (\Throwable $e) {
            $this->error('Failed to connect to SQLite: ' . $e->getMessage());
            return self::FAILURE;
        }

        try {
            $mysql->getPdo();
        } catch (\Throwable $e) {
            $this->error('Failed to connect to MySQL: ' . $e->getMessage());
            return self::FAILURE;
        }

        $truncate = (bool) $this->option('truncate');
        $force = (bool) $this->option('force');

        if ($truncate && !$force) {
            $this->warn('Truncation requested. This will DELETE ALL existing data in the destination MySQL tables.');
            if (!$this->confirm('Continue?', false)) {
                $this->line('Aborted. Re-run with --force to skip this prompt.');
                return self::SUCCESS;
            }
        }

        $skipTables = $this->parseSkipTables((string) $this->option('skip'));

        if (!(bool) $this->option('include-migrations')) {
            $skipTables[] = 'migrations';
        }

        $skipTables = array_values(array_unique($skipTables));

        $tables = $this->listSqliteTables($sqlite);
        $tables = array_values(array_filter($tables, fn($t) => !in_array($t, $skipTables, true)));

        if (empty($tables)) {
            $this->warn('No tables found to copy (after skips).');
            return self::SUCCESS;
        }

        $chunkSize = (int) $this->option('chunk');
        if ($chunkSize < 1) {
            $chunkSize = 500;
        }

        $this->info('SQLite source: ' . $sqlitePath);
        $this->info('Destination MySQL connection: ' . $mysqlConnName);
        $this->info('Tables to copy: ' . count($tables));

        $mysql->disableQueryLog();
        $sqlite->disableQueryLog();

        $mysql->statement('SET FOREIGN_KEY_CHECKS=0');

        try {
            foreach ($tables as $table) {
                $this->line('→ ' . $table);

                if ($truncate) {
                    $mysql->table($table)->truncate();
                }

                $columnsInfo = $sqlite->select("PRAGMA table_info('" . str_replace("'", "''", $table) . "')");
                $columns = array_values(array_filter(array_map(fn($c) => $c->name ?? null, $columnsInfo)));

                if (empty($columns)) {
                    $this->warn('  Skipping (no columns detected).');
                    continue;
                }

                $pk = $this->detectPrimaryKeyColumn($columnsInfo);

                $copied = 0;
                if ($pk !== null) {
                    $last = null;
                    while (true) {
                        $q = $sqlite->table($table)->orderBy($pk)->limit($chunkSize);
                        if ($last !== null) {
                            $q->where($pk, '>', $last);
                        }
                        $rows = $q->get();
                        if ($rows->isEmpty()) {
                            break;
                        }

                        $payload = $this->rowsToInsertPayload($rows->all(), $columns);
                        if (!empty($payload)) {
                            $mysql->table($table)->insert($payload);
                            $copied += count($payload);
                        }

                        $last = Arr::last($rows->all())->{$pk};
                        if ($rows->count() < $chunkSize) {
                            break;
                        }
                    }
                } else {
                    $offset = 0;
                    while (true) {
                        $rows = $sqlite->table($table)->offset($offset)->limit($chunkSize)->get();
                        if ($rows->isEmpty()) {
                            break;
                        }

                        $payload = $this->rowsToInsertPayload($rows->all(), $columns);
                        if (!empty($payload)) {
                            $mysql->table($table)->insert($payload);
                            $copied += count($payload);
                        }

                        $offset += $chunkSize;
                        if ($rows->count() < $chunkSize) {
                            break;
                        }
                    }
                }

                $this->line('  Copied rows: ' . $copied);
            }
        } finally {
            $mysql->statement('SET FOREIGN_KEY_CHECKS=1');
        }

        $this->info('Done.');
        return self::SUCCESS;
    }

    private function listSqliteTables($sqlite): array
    {
        $rows = $sqlite->select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' ORDER BY name");
        return array_values(array_filter(array_map(fn($r) => $r->name ?? null, $rows)));
    }

    private function detectPrimaryKeyColumn(array $columnsInfo): ?string
    {
        $pkCols = [];
        foreach ($columnsInfo as $c) {
            if (!empty($c->pk) && !empty($c->name)) {
                $pkCols[] = $c->name;
            }
        }
        if (count($pkCols) === 1) {
            return $pkCols[0];
        }
        return null;
    }

    private function rowsToInsertPayload(array $rows, array $columns): array
    {
        $allowed = array_fill_keys($columns, true);
        $payload = [];
        foreach ($rows as $row) {
            $arr = (array) $row;
            $filtered = [];
            foreach ($arr as $k => $v) {
                if (isset($allowed[$k])) {
                    $filtered[$k] = $v;
                }
            }
            // Ensure all missing columns are present as null (helps with strict inserts)
            foreach ($columns as $col) {
                if (!array_key_exists($col, $filtered)) {
                    $filtered[$col] = null;
                }
            }
            $payload[] = $filtered;
        }
        return $payload;
    }

    private function parseSkipTables(string $skip): array
    {
        if (trim($skip) === '') {
            return [];
        }
        return array_values(array_filter(array_map(fn($t) => trim($t), explode(',', $skip))));
    }

    private function normalizeSqlitePath(string $path): string
    {
        $path = trim($path);
        if ($path === '') {
            return $path;
        }

        // If already absolute, keep it.
        if (Str::startsWith($path, ['/', '\\']) || preg_match('~^[A-Za-z]:[\\\\/]~', $path) === 1) {
            return $path;
        }

        // Relative paths resolve from project root.
        return base_path($path);
    }
}
