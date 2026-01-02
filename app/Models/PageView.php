<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PageView extends Model
{
    protected $table = 'analytics_page_views';

    protected $fillable = [
        'occurred_at',
        'visitor_id',
        'visitor_token',
        'session_id_hash',
        'method',
        'status_code',
        'path',
        'route_name',
        'page_type',
        'page_key',
        'project_id',
        'referrer',
        'referrer_domain',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'ip_hash',
        'user_agent',
    ];

    protected $casts = [
        'occurred_at' => 'datetime',
    ];

    public function visitor(): BelongsTo
    {
        return $this->belongsTo(Visitor::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // Query scopes
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('occurred_at', today());
    }

    public function scopeYesterday(Builder $query): Builder
    {
        return $query->whereDate('occurred_at', today()->subDay());
    }

    public function scopeLast7Days(Builder $query): Builder
    {
        return $query->where('occurred_at', '>=', now()->subDays(7));
    }

    public function scopeLast30Days(Builder $query): Builder
    {
        return $query->where('occurred_at', '>=', now()->subDays(30));
    }

    public function scopePublicPages(Builder $query): Builder
    {
        return $query->whereNotNull('page_type');
    }

    // Analytics helpers
    public static function getTodayViews(): int
    {
        return static::today()->count();
    }

    public static function getTodayUniqueVisitors(): int
    {
        return static::today()->distinct('visitor_token')->count('visitor_token');
    }

    public static function getLast7DaysViews(): int
    {
        return static::last7Days()->count();
    }

    public static function getLast7DaysUniqueVisitors(): int
    {
        return static::last7Days()->distinct('visitor_token')->count('visitor_token');
    }

    public static function getDailyTrend(int $days = 7): array
    {
        return static::select(
            DB::raw('DATE(occurred_at) as date'),
            DB::raw('COUNT(*) as views'),
            DB::raw('COUNT(DISTINCT visitor_token) as unique_visitors')
        )
            ->where('occurred_at', '>=', now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->toArray();
    }

    public static function getTopPages(int $limit = 10): array
    {
        return static::select(
            'page_type',
            'page_key',
            'path',
            DB::raw('COUNT(*) as views'),
            DB::raw('COUNT(DISTINCT visitor_token) as unique_visitors')
        )
            ->publicPages()
            ->last30Days()
            ->groupBy('page_type', 'page_key', 'path')
            ->orderByDesc('views')
            ->limit($limit)
            ->get()
            ->toArray();
    }

    public static function getTopProjects(int $limit = 5): array
    {
        return static::select(
            'projects.id',
            'projects.title',
            'projects.slug',
            DB::raw('COUNT(*) as views'),
            DB::raw('COUNT(DISTINCT visitor_token) as unique_visitors')
        )
            ->join('projects', 'analytics_page_views.project_id', '=', 'projects.id')
            ->where('page_type', 'work_detail')
            ->last30Days()
            ->groupBy('projects.id', 'projects.title', 'projects.slug')
            ->orderByDesc('views')
            ->limit($limit)
            ->get()
            ->toArray();
    }

    public static function getTopReferrers(int $limit = 10): array
    {
        return static::select(
            'referrer_domain',
            DB::raw('COUNT(*) as visits')
        )
            ->whereNotNull('referrer_domain')
            ->last30Days()
            ->groupBy('referrer_domain')
            ->orderByDesc('visits')
            ->limit($limit)
            ->get()
            ->toArray();
    }
}
