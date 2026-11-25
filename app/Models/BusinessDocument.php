<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class BusinessDocument extends Model
{
    public const TYPES = [
        'quotation' => [
            'label' => 'Quotation (Penawaran Harga)',
            'short' => 'Quotation',
            'prefix' => 'QT',
            'heading' => 'SURAT PENAWARAN HARGA (QUOTATION)',
        ],
        'dp_request' => [
            'label' => 'Pengajuan DP (Termin 1)',
            'short' => 'Pengajuan DP',
            'prefix' => 'DP',
            'heading' => 'INVOICE PENGAJUAN DOWN PAYMENT (DP)',
        ],
        'final_invoice_request' => [
            'label' => 'Invoice Pengajuan Pelunasan',
            'short' => 'Pengajuan Pelunasan',
            'prefix' => 'INV-PEL',
            'heading' => 'INVOICE PENGAJUAN PELUNASAN',
        ],
        'paid_invoice' => [
            'label' => 'Invoice Pelunasan (Lunas)',
            'short' => 'Invoice Pelunasan',
            'prefix' => 'INV-LUNAS',
            'heading' => 'INVOICE PELUNASAN & KWITANSI RESMI',
        ],
        'spk' => [
            'label' => 'Surat Perjanjian Kerjasama (SPK)',
            'short' => 'SPK',
            'prefix' => 'SPK',
            'heading' => 'SURAT PERJANJIAN KERJASAMA PROYEK',
        ],
        'bast' => [
            'label' => 'Berita Acara Serah Terima (BAST)',
            'short' => 'BAST',
            'prefix' => 'BAST',
            'heading' => 'BERITA ACARA SERAH TERIMA PEKERJAAN',
        ],
    ];

    public const STATUSES = [
        'draft' => 'Draft',
        'sent' => 'Terkirim',
        'signed' => 'Ditandatangani',
        'paid' => 'Lunas',
    ];

    protected $fillable = [
        'lead_id',
        'document_type',
        'document_number',
        'title',
        'issue_date',
        'due_date',
        'status',
        'client_name',
        'client_company',
        'client_phone',
        'client_email',
        'client_address',
        'items',
        'discount',
        'tax_percent',
        'dp_percent',
        'paid_amount',
        'payment_terms',
        'notes',
        'company_name',
        'company_tagline',
        'company_address',
        'bank_info',
        'signer_name',
        'signer_role',
        'signature_data',
        'client_signer_name',
        'client_signature_data',
        'verification_code',
    ];

    protected $casts = [
        'items' => 'array',
        'issue_date' => 'date',
        'due_date' => 'date',
        'discount' => 'integer',
        'tax_percent' => 'float',
        'dp_percent' => 'integer',
        'paid_amount' => 'integer',
    ];

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function getTypeMetaAttribute(): array
    {
        return self::TYPES[$this->document_type] ?? self::TYPES['quotation'];
    }

    public function getTypeLabelAttribute(): string
    {
        return $this->type_meta['label'];
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? 'Draft';
    }

    public function getSubtotalAttribute(): int
    {
        $total = 0;
        foreach ($this->items ?? [] as $item) {
            $qty = max(1, (int) ($item['qty'] ?? 1));
            $price = max(0, (int) ($item['unit_price'] ?? 0));
            $total += $qty * $price;
        }
        return $total;
    }

    public function getTaxableAmountAttribute(): int
    {
        return max(0, $this->subtotal - (int) $this->discount);
    }

    public function getTaxAmountAttribute(): int
    {
        if ($this->tax_percent <= 0) {
            return 0;
        }
        return (int) round($this->taxable_amount * ($this->tax_percent / 100));
    }

    public function getGrandTotalAttribute(): int
    {
        return $this->taxable_amount + $this->tax_amount;
    }

    public function getDpAmountAttribute(): int
    {
        $pct = max(0, min(100, (int) ($this->dp_percent ?? 50)));
        return (int) round($this->grand_total * ($pct / 100));
    }

    public function getBalanceDueAttribute(): int
    {
        if ($this->document_type === 'dp_request') {
            return max(0, $this->dp_amount - (int) $this->paid_amount);
        }

        if ($this->document_type === 'paid_invoice') {
            return 0;
        }

        return max(0, $this->grand_total - (int) $this->paid_amount);
    }

    public static function generateDocumentNumber(string $type): string
    {
        $prefix = self::TYPES[$type]['prefix'] ?? 'DOC';
        $ym = now()->format('Ym');
        $base = "{$prefix}/DNV/{$ym}/";

        $last = static::query()
            ->where('document_number', 'like', $base . '%')
            ->orderByDesc('id')
            ->value('document_number');

        $seq = 1;
        if ($last && preg_match('/(\d+)$/', $last, $matches)) {
            $seq = ((int) $matches[1]) + 1;
        }

        return $base . str_pad((string) $seq, 3, '0', STR_PAD_LEFT);
    }

    public static function generateVerificationCode(): string
    {
        return 'DNV-' . strtoupper(Str::random(8));
    }
}
