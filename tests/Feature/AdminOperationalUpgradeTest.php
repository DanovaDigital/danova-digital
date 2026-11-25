<?php

namespace Tests\Feature;

use App\Http\Middleware\AdminSessionAuth;
use App\Models\BusinessDocument;
use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminOperationalUpgradeTest extends TestCase
{
    use RefreshDatabase;

    public function test_leads_can_be_filtered_updated_and_exported_to_excel(): void
    {
        $leadA = Lead::create([
            'draft_id' => 'draft-a',
            'brand' => 'Kopi Nusantara',
            'phone' => '628111111111',
            'service' => 'Website Profil Bisnis',
            'addons' => [],
            'status' => 'baru',
        ]);

        Lead::create([
            'draft_id' => 'draft-b',
            'brand' => 'Bengkel Maju',
            'phone' => '628222222222',
            'service' => 'Landing Page Iklan',
            'addons' => [],
            'status' => 'deal',
        ]);

        $session = [AdminSessionAuth::SESSION_KEY => true];

        $this->withSession($session)
            ->get(route('admin.leads.index', ['q' => 'Kopi', 'status' => 'baru']))
            ->assertOk()
            ->assertSee('Kopi Nusantara')
            ->assertDontSee('Bengkel Maju');

        $this->withSession($session)
            ->patch(route('admin.leads.update', $leadA), [
                'status' => 'negosiasi',
                'admin_notes' => 'Sudah kirim penawaran awal.',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('leads', [
            'id' => $leadA->id,
            'status' => 'negosiasi',
            'admin_notes' => 'Sudah kirim penawaran awal.',
        ]);

        $exportResponse = $this->withSession($session)
            ->get(route('admin.leads.export', ['status' => 'negosiasi']));

        $exportResponse->assertOk();
        $this->assertStringContainsString('application/vnd.ms-excel', (string) $exportResponse->headers->get('Content-Type'));
        $this->assertStringContainsString('Kopi Nusantara', $exportResponse->getContent());
        $this->assertStringNotContainsString('Bengkel Maju', $exportResponse->getContent());
    }

    public function test_dashboard_supports_date_range_filter(): void
    {
        $session = [AdminSessionAuth::SESSION_KEY => true];

        foreach (['7d', '30d', 'month', '90d'] as $range) {
            $this->withSession($session)
                ->get(route('admin.dashboard', ['range' => $range]))
                ->assertOk();
        }
    }

    public function test_business_document_lifecycle_conversion_and_pdf_generation(): void
    {
        $session = [AdminSessionAuth::SESSION_KEY => true];

        $tinyPng = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=';

        $storeResponse = $this->withSession($session)->post(route('admin.documents.store'), [
            'document_type' => 'quotation',
            'document_number' => 'QT/DNV/202611/001',
            'title' => 'Pembuatan Website Company Profile',
            'issue_date' => '2026-11-25',
            'due_date' => '2026-12-09',
            'status' => 'sent',
            'client_name' => 'Budi Santoso',
            'client_company' => 'PT Maju Jaya',
            'items' => [
                [
                    'name' => 'Website Company Profile',
                    'description' => 'Desain custom + CMS',
                    'qty' => 1,
                    'unit_price' => 8000000,
                ],
            ],
            'discount' => 500000,
            'tax_percent' => 0,
            'dp_percent' => 50,
            'paid_amount' => 0,
            'company_name' => 'DANOVA DIGITAL',
            'signer_name' => 'Andi Pratama',
            'signer_role' => 'Founder',
            'signature_data' => $tinyPng,
        ]);

        $doc = BusinessDocument::firstOrFail();
        $storeResponse->assertRedirect(route('admin.documents.edit', $doc));
        $this->assertSame(7500000, $doc->grand_total);
        $this->assertSame(3750000, $doc->dp_amount);

        // Preview HTML with KOP Surat & Electronic Signature
        $this->withSession($session)
            ->get(route('admin.documents.preview', $doc))
            ->assertOk()
            ->assertSee('QT/DNV/202611/001')
            ->assertSee('PT Maju Jaya')
            ->assertSee('E-Signed');

        // Download PDF
        $pdfResponse = $this->withSession($session)
            ->get(route('admin.documents.pdf', $doc));
        $pdfResponse->assertOk();
        $this->assertStringContainsString('application/pdf', (string) $pdfResponse->headers->get('Content-Type'));
        $this->assertStringStartsWith('%PDF-', $pdfResponse->getContent());

        // Convert Quotation -> Pengajuan DP
        $this->withSession($session)
            ->post(route('admin.documents.convert', $doc), ['target_type' => 'dp_request'])
            ->assertRedirect();

        $dpDoc = BusinessDocument::where('document_type', 'dp_request')->firstOrFail();
        $this->assertSame(3750000, $dpDoc->balance_due);
    }
}
