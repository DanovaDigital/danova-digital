<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessDocument;
use App\Models\Lead;
use App\Models\SiteSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class DocumentController extends Controller
{
    public function index(Request $request): View
    {
        $filters = [
            'q' => trim((string) $request->query('q', '')),
            'type' => trim((string) $request->query('type', '')),
            'status' => trim((string) $request->query('status', '')),
        ];

        $query = BusinessDocument::query()->orderByDesc('issue_date')->orderByDesc('id');

        if ($filters['q'] !== '') {
            $term = '%' . mb_strtolower($filters['q']) . '%';
            $query->where(function (Builder $sub) use ($term) {
                $sub->whereRaw('LOWER(document_number) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(title) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(client_name) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(COALESCE(client_company, \'\')) LIKE ?', [$term]);
            });
        }

        if ($filters['type'] !== '' && array_key_exists($filters['type'], BusinessDocument::TYPES)) {
            $query->where('document_type', $filters['type']);
        }

        if ($filters['status'] !== '' && array_key_exists($filters['status'], BusinessDocument::STATUSES)) {
            $query->where('status', $filters['status']);
        }

        return view('admin.documents.index', [
            'documents' => $query->paginate(20)->withQueryString(),
            'filters' => $filters,
            'types' => BusinessDocument::TYPES,
            'statuses' => BusinessDocument::STATUSES,
        ]);
    }

    public function create(Request $request): View
    {
        $type = (string) $request->query('type', 'quotation');
        if (!array_key_exists($type, BusinessDocument::TYPES)) {
            $type = 'quotation';
        }

        $defaults = $this->companyDefaults();
        $lead = null;
        if ($request->filled('lead_id')) {
            $lead = Lead::find($request->integer('lead_id'));
        }

        $defaultItems = [
            [
                'name' => $lead ? ($lead->service . ($lead->plan ? ' — Paket ' . $lead->plan : '')) : 'Pembuatan Website Bisnis Custom',
                'description' => $lead && $lead->notes ? $lead->notes : 'Desain UI/UX modern, pengembangan responsif, optimasi kecepatan & SEO dasar.',
                'qty' => 1,
                'unit_price' => 5000000,
            ],
        ];

        $document = new BusinessDocument([
            'lead_id' => $lead?->id,
            'document_type' => $type,
            'document_number' => BusinessDocument::generateDocumentNumber($type),
            'title' => $lead ? ('Proyek Website ' . $lead->brand) : 'Penawaran Pembuatan Website Bisnis',
            'issue_date' => now()->toDateString(),
            'due_date' => now()->addDays(14)->toDateString(),
            'status' => $type === 'paid_invoice' ? 'paid' : 'draft',
            'client_name' => $lead?->brand ?? '',
            'client_company' => $lead?->brand ?? '',
            'client_phone' => $lead ? ('+' . $lead->phone) : '',
            'items' => $defaultItems,
            'discount' => 0,
            'tax_percent' => 0,
            'dp_percent' => 50,
            'paid_amount' => 0,
            'payment_terms' => $this->defaultPaymentTerms($type),
            'notes' => $this->defaultNotes($type),
            'company_name' => $defaults['company_name'],
            'company_tagline' => $defaults['company_tagline'],
            'company_address' => $defaults['company_address'],
            'bank_info' => $defaults['bank_info'],
            'signer_name' => $defaults['signer_name'],
            'signer_role' => $defaults['signer_role'],
            'signature_data' => $defaults['signature_data'],
        ]);

        return view('admin.documents.form', [
            'document' => $document,
            'types' => BusinessDocument::TYPES,
            'statuses' => BusinessDocument::STATUSES,
            'isEdit' => false,
            'leads' => Lead::query()->orderByDesc('updated_at')->limit(50)->get(['id', 'brand', 'service']),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateDocument($request);
        $data['verification_code'] = BusinessDocument::generateVerificationCode();

        $document = BusinessDocument::create($data);

        if ($request->boolean('save_defaults')) {
            $this->persistCompanyDefaults($data);
        }

        return redirect()
            ->route('admin.documents.edit', $document)
            ->with('success', 'Dokumen ' . $document->document_number . ' berhasil dibuat.');
    }

    public function edit(BusinessDocument $document): View
    {
        return view('admin.documents.form', [
            'document' => $document,
            'types' => BusinessDocument::TYPES,
            'statuses' => BusinessDocument::STATUSES,
            'isEdit' => true,
            'leads' => Lead::query()->orderByDesc('updated_at')->limit(50)->get(['id', 'brand', 'service']),
        ]);
    }

    public function update(Request $request, BusinessDocument $document): RedirectResponse
    {
        $data = $this->validateDocument($request, $document->id);
        $document->update($data);

        if ($request->boolean('save_defaults')) {
            $this->persistCompanyDefaults($data);
        }

        return redirect()
            ->route('admin.documents.edit', $document)
            ->with('success', 'Dokumen ' . $document->document_number . ' berhasil diperbarui.');
    }

    public function destroy(BusinessDocument $document): RedirectResponse
    {
        $number = $document->document_number;
        $document->delete();

        return redirect()
            ->route('admin.documents.index')
            ->with('success', 'Dokumen ' . $number . ' telah dihapus.');
    }

    public function convert(Request $request, BusinessDocument $document): RedirectResponse
    {
        $targetType = (string) $request->input('target_type', 'dp_request');
        if (!array_key_exists($targetType, BusinessDocument::TYPES)) {
            $targetType = 'dp_request';
        }

        $paidAmount = $document->paid_amount;
        if ($targetType === 'final_invoice_request' && $paidAmount === 0) {
            $paidAmount = $document->dp_amount;
        } elseif ($targetType === 'paid_invoice') {
            $paidAmount = $document->grand_total;
        }

        $copy = $document->replicate(['document_number', 'verification_code', 'created_at', 'updated_at']);
        $copy->document_type = $targetType;
        $copy->document_number = BusinessDocument::generateDocumentNumber($targetType);
        $copy->verification_code = BusinessDocument::generateVerificationCode();
        $copy->issue_date = now()->toDateString();
        $copy->due_date = now()->addDays(7)->toDateString();
        $copy->status = $targetType === 'paid_invoice' ? 'paid' : 'draft';
        $copy->paid_amount = $paidAmount;
        $copy->payment_terms = $this->defaultPaymentTerms($targetType);
        $copy->notes = $this->defaultNotes($targetType);
        $copy->save();

        return redirect()
            ->route('admin.documents.edit', $copy)
            ->with('success', 'Berhasil membuat ' . $copy->type_meta['short'] . ' baru (' . $copy->document_number . ') dari dokumen sebelumnya.');
    }

    public function preview(BusinessDocument $document): View
    {
        return view('admin.documents.pdf', $this->pdfPayload($document, false));
    }

    public function pdf(BusinessDocument $document): Response
    {
        $pdf = Pdf::loadView('admin.documents.pdf', $this->pdfPayload($document, true))
            ->setPaper('a4', 'portrait');

        $safeFilename = str_replace(['/', '\\', ' '], '-', $document->document_number) . '.pdf';

        return $pdf->download($safeFilename);
    }

    private function pdfPayload(BusinessDocument $document, bool $isPdf): array
    {
        $settings = SiteSetting::query()->get()->keyBy('key');
        $email = (string) (optional($settings->get('contact.email'))->value ?? 'danovaagency@gmail.com');
        $whatsapp = (string) (optional($settings->get('contact.whatsapp'))->value ?? '');
        $whatsappDigits = $whatsapp !== '' ? SiteSetting::normalizeWhatsappNumber($whatsapp) : '';

        $logoDataUri = $this->resolveLogoDataUri($settings->get('branding.header_logo')?->value);

        return [
            'document' => $document,
            'isPdf' => $isPdf,
            'logoDataUri' => $logoDataUri,
            'companyEmail' => $email,
            'companyWhatsapp' => $whatsappDigits ? '+' . $whatsappDigits : '-',
            'companyWebsite' => rtrim((string) config('app.url'), '/'),
        ];
    }

    private function resolveLogoDataUri(?string $customLogo): ?string
    {
        $candidates = [];
        if ($customLogo) {
            $candidates[] = storage_path('app/public/' . $customLogo);
        }
        $candidates[] = public_path('images/DanovaBlue.png');
        $candidates[] = public_path('images/DanovaBlack.png');

        foreach ($candidates as $path) {
            if ($path && is_file($path) && is_readable($path)) {
                $mime = mime_content_type($path) ?: 'image/png';
                $raw = file_get_contents($path);
                if ($raw !== false) {
                    return 'data:' . $mime . ';base64,' . base64_encode($raw);
                }
            }
        }

        return null;
    }

    private function validateDocument(Request $request, ?int $ignoreId = null): array
    {
        $validated = $request->validate([
            'lead_id' => ['nullable', 'integer', 'exists:leads,id'],
            'document_type' => ['required', 'string', Rule::in(array_keys(BusinessDocument::TYPES))],
            'document_number' => [
                'required',
                'string',
                'max:64',
                Rule::unique('business_documents', 'document_number')->ignore($ignoreId),
            ],
            'title' => ['required', 'string', 'max:200'],
            'issue_date' => ['required', 'date'],
            'due_date' => ['nullable', 'date'],
            'status' => ['required', 'string', Rule::in(array_keys(BusinessDocument::STATUSES))],
            'client_name' => ['required', 'string', 'max:180'],
            'client_company' => ['nullable', 'string', 'max:180'],
            'client_phone' => ['nullable', 'string', 'max:40'],
            'client_email' => ['nullable', 'email', 'max:180'],
            'client_address' => ['nullable', 'string', 'max:1000'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.name' => ['required', 'string', 'max:200'],
            'items.*.description' => ['nullable', 'string', 'max:1000'],
            'items.*.qty' => ['required', 'integer', 'min:1', 'max:9999'],
            'items.*.unit_price' => ['required', 'integer', 'min:0'],
            'discount' => ['nullable', 'integer', 'min:0'],
            'tax_percent' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'dp_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'paid_amount' => ['nullable', 'integer', 'min:0'],
            'payment_terms' => ['nullable', 'string', 'max:3000'],
            'notes' => ['nullable', 'string', 'max:3000'],
            'company_name' => ['required', 'string', 'max:180'],
            'company_tagline' => ['nullable', 'string', 'max:200'],
            'company_address' => ['nullable', 'string', 'max:1000'],
            'bank_info' => ['nullable', 'string', 'max:1000'],
            'signer_name' => ['required', 'string', 'max:120'],
            'signer_role' => ['required', 'string', 'max:120'],
            'signature_data' => ['nullable', 'string'],
            'client_signer_name' => ['nullable', 'string', 'max:120'],
            'client_signature_data' => ['nullable', 'string'],
        ]);

        $validated['items'] = array_values(array_map(fn($item) => [
            'name' => trim((string) $item['name']),
            'description' => trim((string) ($item['description'] ?? '')),
            'qty' => (int) $item['qty'],
            'unit_price' => (int) $item['unit_price'],
        ], $validated['items']));

        $validated['discount'] = (int) ($validated['discount'] ?? 0);
        $validated['tax_percent'] = (float) ($validated['tax_percent'] ?? 0);
        $validated['dp_percent'] = (int) ($validated['dp_percent'] ?? 50);
        $validated['paid_amount'] = (int) ($validated['paid_amount'] ?? 0);

        return $validated;
    }

    private function companyDefaults(): array
    {
        $settings = SiteSetting::query()->where('group', 'company')->get()->keyBy('key');
        $get = fn(string $key, string $default): string => (string) (optional($settings->get($key))->value ?? $default);

        return [
            'company_name' => $get('company.name', 'DANOVA DIGITAL'),
            'company_tagline' => $get('company.tagline', 'Studio Desain & Pembuatan Website Bisnis'),
            'company_address' => $get('company.address', 'Indonesia · Layanan Pembuatan Website & Sistem Digital Bisnis'),
            'bank_info' => $get('company.bank_info', "Bank BCA\nNo. Rekening: -\nAtas Nama: Danova Digital"),
            'signer_name' => $get('company.signer_name', 'Founder Danova Digital'),
            'signer_role' => $get('company.signer_role', 'Project Lead'),
            'signature_data' => $get('company.signature_data', ''),
        ];
    }

    private function persistCompanyDefaults(array $data): void
    {
        $map = [
            'company.name' => $data['company_name'] ?? '',
            'company.tagline' => $data['company_tagline'] ?? '',
            'company.address' => $data['company_address'] ?? '',
            'company.bank_info' => $data['bank_info'] ?? '',
            'company.signer_name' => $data['signer_name'] ?? '',
            'company.signer_role' => $data['signer_role'] ?? '',
            'company.signature_data' => $data['signature_data'] ?? '',
        ];

        foreach ($map as $key => $value) {
            SiteSetting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => (string) $value, 'group' => 'company']
            );
        }
    }

    private function defaultPaymentTerms(string $type): string
    {
        return match ($type) {
            'dp_request' => "Pembayaran Down Payment (DP) sebesar 50% dibayarkan sebelum proses desain & development dimulai.\nKonfirmasi bukti transfer melalui WhatsApp resmi Danova Digital.",
            'final_invoice_request' => "Pembayaran termin pelunasan dilakukan setelah staging/preview website disetujui dan sebelum serah terima akses final / deploy ke domain utama.",
            'paid_invoice' => "Seluruh pembayaran proyek telah diterima LUNAS.\nDokumen ini berlaku sebagai bukti pembayaran sah.",
            'spk' => "1. Termin 1 (DP 50%) dibayarkan saat SPK disepakati.\n2. Termin 2 (Pelunasan 50%) dibayarkan sebelum serah terima final.\n3. Hak milik penuh source code, aset, dan database diserahkan 100% kepada klien setelah pelunasan.",
            'bast' => "Seluruh hasil pekerjaan (source code, akses hosting/domain, dan panduan penggunaan) telah diserahkan dan diterima dengan baik oleh Pihak Klien.",
            default => "1. Penawaran berlaku selama 14 hari kalender sejak tanggal terbit.\n2. Skema pembayaran: 50% DP di awal, 50% pelunasan sebelum launch.",
        };
    }

    private function defaultNotes(string $type): string
    {
        return match ($type) {
            'bast' => 'Garansi bug-fix & pendampingan teknis berlaku selama 30 hari kalender setelah tanggal serah terima.',
            'paid_invoice' => 'Terima kasih atas kepercayaan Anda bekerja sama dengan Danova Digital.',
            default => 'Sudah termasuk optimasi mobile responsive, SEO teknis dasar, dan serah terima 100% kepemilikan aset.',
        };
    }
}
