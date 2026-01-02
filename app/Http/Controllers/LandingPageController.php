<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\PricingPlan;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Testimonial;

class LandingPageController extends Controller
{
    public function show()
    {
        $pricingPlans = PricingPlan::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $projects = Project::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $testimonials = Testimonial::query()
            ->where('is_published', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $faqs = Faq::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $settings = SiteSetting::query()->get()->keyBy('key');

        return view('welcome', [
            'pricingPlans' => $pricingPlans,
            'projects' => $projects,
            'testimonials' => $testimonials,
            'faqs' => $faqs,
            'settings' => $settings,
        ]);
    }
}
