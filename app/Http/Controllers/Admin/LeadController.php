<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $filters = [
            'q' => trim((string) $request->query('q', '')),
            'status' => trim((string) $request->query('status', '')),
            'service' => trim((string) $request->query('service', '')),
            'date_from' => trim((string) $request->query('date_from', '')),
            'date_to' => trim((string) $request->query('date_to', '')),
        ];

        $leads = $this->filteredQuery($filters)
            ->orderByDesc('updated_at')
            ->orderByDesc('id')
            ->paginate(20)
            ->withQueryString();

        $statusCounts = Lead::query()
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        $services = Lead::query()
            ->whereNotNull('service')
            ->where('service', '!=', '')
            ->distinct()
            ->orderBy('service')
            ->pluck('service');

        return view('admin.leads.index', [
            'leads' => $leads,
            'filters' => $filters,
            'statuses' => Lead::STATUSES,
            'statusCounts' => $statusCounts,
            'totalAllLeads' => array_sum($statusCounts),
            'services' => $services,
        ]);
    }

    public function update(Request $request, Lead $lead): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'string', Rule::in(array_keys(Lead::STATUSES))],
            'admin_notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $lead->update($validated);

        return back()->with('success', 'Status brief ' . $lead->brand . ' berhasil diperbarui.');
    }

    public function export(Request $request): Response
    {
        $filters = [
            'q' => trim((string) $request->query('q', '')),
            'status' => trim((string) $request->query('status', '')),
            'service' => trim((string) $request->query('service', '')),
            'date_from' => trim((string) $request->query('date_from', '')),
            'date_to' => trim((string) $request->query('date_to', '')),
        ];

        $leads = $this->filteredQuery($filters)
            ->orderByDesc('updated_at')
            ->orderByDesc('id')
            ->get();

        $xml = $this->buildExcelXml($leads);
        $filename = 'brief-masuk-danova-' . now()->format('Ymd-His') . '.xls';

        return response($xml, 200, [
            'Content-Type' => 'application/vnd.ms-excel; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'no-store, no-cache, must-revalidate',
        ]);
    }

    private function filteredQuery(array $filters): Builder
    {
        $query = Lead::query();

        if ($filters['q'] !== '') {
            $term = '%' . mb_strtolower($filters['q']) . '%';
            $query->where(function (Builder $sub) use ($term) {
                $sub->whereRaw('LOWER(brand) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(phone) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(service) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(COALESCE(plan, \'\')) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(COALESCE(notes, \'\')) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(COALESCE(admin_notes, \'\')) LIKE ?', [$term]);
            });
        }

        if ($filters['status'] !== '' && array_key_exists($filters['status'], Lead::STATUSES)) {
            $query->where('status', $filters['status']);
        }

        if ($filters['service'] !== '') {
            $query->where('service', $filters['service']);
        }

        if ($filters['date_from'] !== '') {
            $query->whereDate('updated_at', '>=', $filters['date_from']);
        }

        if ($filters['date_to'] !== '') {
            $query->whereDate('updated_at', '<=', $filters['date_to']);
        }

        return $query;
    }

    private function buildExcelXml($leads): string
    {
        $escape = fn($val): string => htmlspecialchars((string) $val, ENT_XML1 | ENT_QUOTES, 'UTF-8');

        $headers = [
            'No',
            'Tanggal Masuk',
            'Brand / Usaha',
            'WhatsApp',
            'Layanan',
            'Paket',
            'Fitur Tambahan',
            'Estimasi Kalkulator',
            'Anggaran Klien',
            'Target Peluncuran',
            'Tujuan Proyek',
            'Status Follow-up',
            'Catatan Internal',
        ];

        $rowsXml = '';
        $rowsXml .= '<Row ss:Height="24">';
        foreach ($headers as $header) {
            $rowsXml .= '<Cell ss:StyleID="header"><Data ss:Type="String">' . $escape($header) . '</Data></Cell>';
        }
        $rowsXml .= '</Row>' . "\n";

        foreach ($leads as $index => $lead) {
            $cells = [
                ['type' => 'Number', 'val' => $index + 1],
                ['type' => 'String', 'val' => $lead->updated_at->timezone(config('app.timezone'))->format('d/m/Y H:i')],
                ['type' => 'String', 'val' => $lead->brand],
                ['type' => 'String', 'val' => '+' . $lead->phone],
                ['type' => 'String', 'val' => $lead->service],
                ['type' => 'String', 'val' => $lead->plan ?: '-'],
                ['type' => 'String', 'val' => !empty($lead->addons) ? implode(', ', $lead->addons) : '-'],
                ['type' => 'String', 'val' => $lead->estimate ?: '-'],
                ['type' => 'String', 'val' => $lead->budget ?: '-'],
                ['type' => 'String', 'val' => $lead->timeline ?: '-'],
                ['type' => 'String', 'val' => $lead->notes ?: '-'],
                ['type' => 'String', 'val' => $lead->status_label],
                ['type' => 'String', 'val' => $lead->admin_notes ?: '-'],
            ];

            $rowsXml .= '<Row>';
            foreach ($cells as $cell) {
                $rowsXml .= '<Cell ss:StyleID="cell"><Data ss:Type="' . $cell['type'] . '">' . $escape($cell['val']) . '</Data></Cell>';
            }
            $rowsXml .= '</Row>' . "\n";
        }

        $colWidths = [40, 110, 140, 110, 140, 95, 180, 140, 110, 110, 220, 110, 200];
        $colsXml = '';
        foreach ($colWidths as $w) {
            $colsXml .= '<Column ss:AutoFitWidth="0" ss:Width="' . $w . '"/>' . "\n";
        }

        return '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
            . '<?mso-application progid="Excel.Sheet"?>' . "\n"
            . '<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"'
            . ' xmlns:o="urn:schemas-microsoft-com:office:office"'
            . ' xmlns:x="urn:schemas-microsoft-com:office:excel"'
            . ' xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">' . "\n"
            . '<Styles>'
            . '<Style ss:ID="header">'
            . '<Font ss:Bold="1" ss:Color="#FFFFFF" ss:Size="10"/>'
            . '<Interior ss:Color="#2454A5" ss:Pattern="Solid"/>'
            . '<Alignment ss:Vertical="Center" ss:WrapText="1"/>'
            . '<Borders><Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#193D7F"/></Borders>'
            . '</Style>'
            . '<Style ss:ID="cell">'
            . '<Font ss:Size="10" ss:Color="#142746"/>'
            . '<Alignment ss:Vertical="Top" ss:WrapText="1"/>'
            . '<Borders><Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#DBE8F8"/></Borders>'
            . '</Style>'
            . '</Styles>' . "\n"
            . '<Worksheet ss:Name="Brief Masuk Danova">' . "\n"
            . '<Table>' . "\n"
            . $colsXml
            . $rowsXml
            . '</Table>' . "\n"
            . '</Worksheet>' . "\n"
            . '</Workbook>';
    }
}
