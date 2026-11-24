<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\PricingPlan;
use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class LeadController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $services = config('brief.services');
        $addons = config('brief.addons');
        $data = $request->validate([
            'draft_id' => ['required', 'uuid'],
            'brand' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:32', 'regex:/^\+?[0-9 ().-]+$/'],
            'service' => ['required', Rule::in(array_keys($services))],
            'plan' => ['nullable', 'integer', Rule::exists('pricing_plans', 'id')->where('is_published', true)],
            'addons' => ['sometimes', 'array', 'max:'.count($addons)],
            'addons.*' => ['string', 'distinct', Rule::in(array_keys($addons))],
            'budget' => ['nullable', 'string', 'max:80'],
            'timeline' => ['nullable', 'string', 'max:80'],
            'notes' => ['nullable', 'string', 'max:600'],
            'estimate' => ['nullable', 'string', 'max:120'],
        ]);

        $phone = str_starts_with($data['phone'], '+')
            ? preg_replace('/\D/', '', $data['phone'])
            : SiteSetting::normalizeWhatsappNumber($data['phone']);
        if (!preg_match('/^[1-9][0-9]{7,14}$/', $phone)) {
            throw ValidationException::withMessages(['phone' => 'Masukkan nomor WhatsApp yang valid.']);
        }

        $lead = Lead::updateOrCreate(['draft_id' => $data['draft_id']], [
            'brand' => $data['brand'],
            'phone' => $phone,
            'service' => $services[$data['service']],
            'plan' => isset($data['plan']) ? PricingPlan::query()->where('is_published', true)->whereKey($data['plan'])->value('name') : null,
            'addons' => array_map(fn ($key) => $addons[$key][0], $data['addons'] ?? []),
            'budget' => $data['budget'] ?? null,
            'timeline' => $data['timeline'] ?? null,
            'notes' => $data['notes'] ?? null,
            'estimate' => $data['estimate'] ?? null,
        ]);

        return response()->json(['saved' => true], $lead->wasRecentlyCreated ? 201 : 200);
    }
}
