<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class LeadCaptureTest extends TestCase
{
    use RefreshDatabase;

    public function test_review_saves_one_lead_across_edits_and_retries(): void
    {
        $brief = [
            'draft_id' => (string) Str::uuid(),
            'brand' => 'Kedai Aruna',
            'phone' => '0812 3456 7890',
            'service' => 'website',
            'addons' => ['cms'],
            'estimate' => 'Rp 3.500.000',
        ];

        $this->postJson(route('brief.store'), $brief)->assertCreated()->assertExactJson(['saved' => true]);
        $brief['notes'] = 'Butuh katalog produk';
        $this->postJson(route('brief.store'), $brief)->assertOk();

        $this->assertDatabaseCount('leads', 1);
        $lead = Lead::query()->sole();
        $this->assertSame('6281234567890', $lead->phone);
        $this->assertSame('Website Profil Bisnis', $lead->service);
        $this->assertSame(['Panel Admin CMS Mandiri'], $lead->addons);
        $this->assertSame('Butuh katalog produk', $lead->notes);
        $this->get(route('admin.leads.index'))->assertRedirect(route('admin.login'));

        config(['services.admin.username' => 'test-admin', 'services.admin.password' => 'test-password']);
        $this->post(route('admin.login.submit'), [
            'username' => 'test-admin',
            'password' => 'test-password',
        ])->assertRedirect(route('admin.leads.index'));
        $this->get(route('admin.leads.index'))->assertOk()->assertSee('Kedai Aruna')->assertSee('https://wa.me/6281234567890');
    }

    public function test_invalid_contact_or_addon_does_not_create_a_lead(): void
    {
        $this->postJson(route('brief.store'), [
            'draft_id' => (string) Str::uuid(),
            'brand' => 'Kedai Aruna',
            'phone' => '123',
            'service' => 'website',
            'addons' => ['unknown'],
        ])->assertUnprocessable()->assertJsonValidationErrors('addons.0');

        $this->postJson(route('brief.store'), [
            'draft_id' => (string) Str::uuid(),
            'brand' => 'Kedai Aruna',
            'phone' => '123',
            'service' => 'website',
        ])->assertUnprocessable()->assertJsonValidationErrors('phone');

        $this->assertDatabaseCount('leads', 0);
    }
}
