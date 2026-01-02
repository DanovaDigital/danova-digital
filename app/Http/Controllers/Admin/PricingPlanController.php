<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function index()
    {
        $plans = PricingPlan::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.pricing-plans.index', ['plans' => $plans]);
    }

    public function create()
    {
        return view('admin.pricing-plans.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sort_order' => ['nullable', 'integer'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'features_text' => ['nullable', 'string'],
            'cta_label' => ['required', 'string', 'max:255'],
            'cta_package_name' => ['nullable', 'string', 'max:255'],
            'cta_package_price' => ['nullable', 'string', 'max:255'],
        ]);

        $features = collect(preg_split('/\r\n|\r|\n/', (string) ($data['features_text'] ?? '')))
            ->map(fn($v) => trim($v))
            ->filter()
            ->values()
            ->all();

        PricingPlan::create([
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_featured' => (bool) ($data['is_featured'] ?? false),
            'is_published' => (bool) ($data['is_published'] ?? false),
            'name' => $data['name'],
            'price' => $data['price'],
            'subtitle' => $data['subtitle'] ?? null,
            'features' => $features,
            'cta_label' => $data['cta_label'],
            'cta_package_name' => $data['cta_package_name'] ?? null,
            'cta_package_price' => $data['cta_package_price'] ?? null,
        ]);

        return redirect()->route('admin.pricing-plans.index');
    }

    public function edit(PricingPlan $pricing_plan)
    {
        return view('admin.pricing-plans.edit', ['plan' => $pricing_plan]);
    }

    public function update(Request $request, PricingPlan $pricing_plan)
    {
        $data = $request->validate([
            'sort_order' => ['nullable', 'integer'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'features_text' => ['nullable', 'string'],
            'cta_label' => ['required', 'string', 'max:255'],
            'cta_package_name' => ['nullable', 'string', 'max:255'],
            'cta_package_price' => ['nullable', 'string', 'max:255'],
        ]);

        $features = collect(preg_split('/\r\n|\r|\n/', (string) ($data['features_text'] ?? '')))
            ->map(fn($v) => trim($v))
            ->filter()
            ->values()
            ->all();

        $pricing_plan->update([
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'is_featured' => (bool) ($data['is_featured'] ?? false),
            'is_published' => (bool) ($data['is_published'] ?? false),
            'name' => $data['name'],
            'price' => $data['price'],
            'subtitle' => $data['subtitle'] ?? null,
            'features' => $features,
            'cta_label' => $data['cta_label'],
            'cta_package_name' => $data['cta_package_name'] ?? null,
            'cta_package_price' => $data['cta_package_price'] ?? null,
        ]);

        return redirect()->route('admin.pricing-plans.index');
    }

    public function destroy(PricingPlan $pricing_plan)
    {
        $pricing_plan->delete();

        return redirect()->route('admin.pricing-plans.index');
    }
}
