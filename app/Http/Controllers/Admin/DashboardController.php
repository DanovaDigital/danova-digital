<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnalyticsEvent;
use App\Models\Lead;
use App\Models\PageView;
use App\Models\SiteSetting;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $range = (string) $request->query('range', '7d');
        $end = now();

        [$start, $range, $rangeLabel] = match ($range) {
            '30d' => [now()->subDays(30)->startOfDay(), '30d', '30 Hari Terakhir'],
            'month' => [now()->startOfMonth(), 'month', 'Bulan Ini'],
            '90d' => [now()->subDays(90)->startOfDay(), '90d', '90 Hari Terakhir'],
            default => [now()->subDays(7)->startOfDay(), '7d', '7 Hari Terakhir'],
        };

        // Analytics KPIs
        $todayViews = PageView::getTodayViews();
        $todayVisitors = PageView::getTodayUniqueVisitors();
        $periodViews = PageView::getViewsBetween($start, $end);
        $periodVisitors = PageView::getUniqueVisitorsBetween($start, $end);

        // Trends & Top Content by selected range
        $dailyTrend = PageView::getDailyTrendBetween($start, $end);
        $topProjects = PageView::getTopProjectsBetween($start, $end, 5);
        $topReferrers = PageView::getTopReferrersBetween($start, $end, 10);

        // Device breakdown by selected range
        $deviceBreakdown = Visitor::query()
            ->whereBetween('last_seen_at', [$start, $end])
            ->select(
                DB::raw("COALESCE(NULLIF(device_type, ''), 'unknown') as device_type"),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('device_type')
            ->orderByDesc('total')
            ->pluck('total', 'device_type')
            ->toArray();

        // Lead & Conversion stats
        $totalLeads = Lead::count();
        $periodLeads = Lead::whereBetween('created_at', [$start, $end])->count();
        $recentLeads = Lead::latest('updated_at')->limit(5)->get();

        // Outbound / CTA events by selected range
        $periodOutboundTotal = AnalyticsEvent::getOutboundTotalBetween($start, $end);
        $periodOutboundCounts = AnalyticsEvent::getOutboundCountsBetween($start, $end);
        $periodWhatsAppClicks = $periodOutboundCounts['whatsapp'] ?? 0;
        $periodEmailClicks = $periodOutboundCounts['email'] ?? 0;
        $periodPricingClicks = $periodOutboundCounts['pricing'] ?? 0;
        $topPricingPackages = AnalyticsEvent::getTopPricingPackagesBetween($start, $end, 5);

        $leadConversionRate = $periodVisitors > 0
            ? round(($periodLeads / $periodVisitors) * 100, 1)
            : 0.0;
        $ctaClickRate = $periodVisitors > 0
            ? round(($periodOutboundTotal / $periodVisitors) * 100, 1)
            : 0.0;

        // Operational readiness check
        $whatsappValue = (string) (SiteSetting::where('key', 'contact.whatsapp')->value('value') ?? '');
        $isDummyWhatsapp = $whatsappValue === '' || SiteSetting::normalizeWhatsappNumber($whatsappValue) === '6281234567890';

        $payload = compact(
            'range',
            'rangeLabel',
            'todayViews',
            'todayVisitors',
            'periodViews',
            'periodVisitors',
            'dailyTrend',
            'topProjects',
            'topReferrers',
            'deviceBreakdown',
            'totalLeads',
            'periodLeads',
            'recentLeads',
            'periodOutboundTotal',
            'periodWhatsAppClicks',
            'periodEmailClicks',
            'periodPricingClicks',
            'topPricingPackages',
            'leadConversionRate',
            'ctaClickRate',
            'isDummyWhatsapp'
        );

        if ($request->ajax() || $request->wantsJson() || $request->query('format') === 'json') {
            return response()->json($payload);
        }

        return view('admin.dashboard', $payload);
    }
}
