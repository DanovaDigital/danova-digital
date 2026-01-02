<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnalyticsEvent;
use App\Models\PageView;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\PricingPlan;

class DashboardController extends Controller
{
    public function index()
    {
        // Analytics KPIs
        $todayViews = PageView::getTodayViews();
        $todayVisitors = PageView::getTodayUniqueVisitors();
        $last7DaysViews = PageView::getLast7DaysViews();
        $last7DaysVisitors = PageView::getLast7DaysUniqueVisitors();

        // Trends for charts
        $dailyTrend7Days = PageView::getDailyTrend(7);
        $dailyTrend30Days = PageView::getDailyTrend(30);

        // Top content
        $topPages = PageView::getTopPages(10);
        $topProjects = PageView::getTopProjects(5);
        $topReferrers = PageView::getTopReferrers(10);

        // CMS stats
        $totalProjects = Project::count();
        $publishedProjects = Project::where('is_published', true)->count();
        $totalTestimonials = Testimonial::count();
        $totalPricingPlans = PricingPlan::count();

        // Outbound / CTA events
        $last7DaysOutboundTotal = AnalyticsEvent::getLast7DaysOutboundTotal();
        $last7DaysOutboundCounts = AnalyticsEvent::getLast7DaysOutboundCounts();
        $last7DaysWhatsAppClicks = $last7DaysOutboundCounts['whatsapp'] ?? 0;
        $last7DaysEmailClicks = $last7DaysOutboundCounts['email'] ?? 0;
        $last7DaysPricingClicks = $last7DaysOutboundCounts['pricing'] ?? 0;
        $topPricingPackages7Days = AnalyticsEvent::getTopPricingPackagesLast7Days(5);

        return view('admin.dashboard', compact(
            'todayViews',
            'todayVisitors',
            'last7DaysViews',
            'last7DaysVisitors',
            'dailyTrend7Days',
            'dailyTrend30Days',
            'topPages',
            'topProjects',
            'topReferrers',
            'totalProjects',
            'publishedProjects',
            'totalTestimonials',
            'totalPricingPlans',
            'last7DaysOutboundTotal',
            'last7DaysWhatsAppClicks',
            'last7DaysEmailClicks',
            'last7DaysPricingClicks',
            'topPricingPackages7Days'
        ));
    }
}
