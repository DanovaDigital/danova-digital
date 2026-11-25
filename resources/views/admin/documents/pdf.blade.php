<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $document->document_number }} — {{ $document->type_meta['short'] }}</title>
    <style>
        @page {
            margin: 16mm 16mm 18mm 16mm;
        }
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif;
            color: #142746;
            font-size: 11px;
            line-height: 1.5;
            margin: 0;
            padding: {{ $isPdf ? '0' : '24px' }};
            background: {{ $isPdf ? '#FFFFFF' : '#F7FAFF' }};
        }
        .sheet {
            background: #FFFFFF;
            max-width: {{ $isPdf ? '100%' : '820px' }};
            margin: 0 auto;
            padding: {{ $isPdf ? '0' : '36px 40px' }};
            border: {{ $isPdf ? 'none' : '1px solid #DBE8F8' }};
            border-radius: {{ $isPdf ? '0' : '12px' }};
        }
        .preview-toolbar {
            max-width: 820px;
            margin: 0 auto 16px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }
        .preview-btn {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            border: 1px solid #DBE8F8;
            background: #FFFFFF;
            color: #142746;
        }
        .preview-btn-primary {
            background: #2454A5;
            border-color: #2454A5;
            color: #FFFFFF;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .kop-table {
            border-bottom: 3px solid #2454A5;
            padding-bottom: 12px;
            margin-bottom: 16px;
        }
        .kop-table td {
            vertical-align: middle;
        }
        .company-name {
            font-size: 18px;
            font-weight: 700;
            color: #142746;
            letter-spacing: 0.5px;
            margin: 0;
        }
        .company-tagline {
            font-size: 10.5px;
            color: #2454A5;
            font-weight: 700;
            margin: 2px 0 4px 0;
        }
        .company-meta {
            font-size: 9.5px;
            color: #475569;
            line-height: 1.45;
        }
        .doc-banner {
            background: #F4F8FE;
            border: 1px solid #DBE8F8;
            border-left: 4px solid #2454A5;
            padding: 10px 14px;
            margin-bottom: 16px;
        }
        .doc-heading {
            font-size: 14px;
            font-weight: 700;
            color: #142746;
            margin: 0 0 2px 0;
        }
        .doc-title {
            font-size: 11px;
            color: #475569;
            margin: 0;
        }
        .info-table {
            margin-bottom: 16px;
        }
        .info-table td {
            vertical-align: top;
            width: 50%;
            padding: 2px 0;
        }
        .box-label {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #475569;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .meta-list td {
            padding: 2px 4px;
            font-size: 10.5px;
        }
        .items-table {
            margin-bottom: 14px;
            border: 1px solid #DBE8F8;
        }
        .items-table th {
            background: #2454A5;
            color: #FFFFFF;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 8px 10px;
            text-align: left;
        }
        .items-table td {
            padding: 9px 10px;
            border-bottom: 1px solid #DBE8F8;
            vertical-align: top;
        }
        .items-table tr:last-child td {
            border-bottom: none;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .summary-wrap td {
            vertical-align: top;
        }
        .totals-table td {
            padding: 5px 8px;
            border-bottom: 1px solid #EAF3FF;
        }
        .totals-grand td {
            background: #EAF3FF;
            color: #142746;
            font-weight: 700;
            font-size: 12px;
            border-top: 2px solid #2454A5;
            border-bottom: 2px solid #2454A5;
            padding: 8px;
        }
        .lunas-badge {
            display: inline-block;
            border: 2px solid #059669;
            color: #059669;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 1.5px;
            padding: 4px 12px;
            border-radius: 4px;
            margin-top: 8px;
        }
        .panel-box {
            border: 1px solid #DBE8F8;
            background: #F7FAFF;
            padding: 10px 12px;
            margin-bottom: 12px;
            font-size: 10px;
            color: #334155;
        }
        .panel-box h4 {
            margin: 0 0 4px 0;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #142746;
        }
        .sig-table {
            margin-top: 20px;
            page-break-inside: avoid;
        }
        .sig-table td {
            width: 50%;
            vertical-align: top;
            text-align: center;
            padding: 8px 16px;
        }
        .sig-box {
            height: 76px;
            margin: 8px auto;
            text-align: center;
        }
        .sig-box img {
            max-height: 72px;
            max-width: 190px;
        }
        .sig-name {
            font-weight: 700;
            color: #142746;
            border-top: 1px solid #94A3B8;
            display: inline-block;
            min-width: 170px;
            padding-top: 4px;
            font-size: 10.5px;
        }
        .sig-role {
            font-size: 9.5px;
            color: #475569;
        }
        .esign-meta {
            margin-top: 4px;
            font-size: 8.5px;
            color: #2454A5;
        }
        .doc-footer {
            margin-top: 22px;
            padding-top: 8px;
            border-top: 1px solid #DBE8F8;
            font-size: 8.5px;
            color: #64748B;
            text-align: center;
        }
    </style>
</head>
<body>
@if(!$isPdf)
<div class="preview-toolbar">
    <a href="{{ route('admin.documents.edit', $document) }}" class="preview-btn">&larr; Kembali Edit</a>
    <div style="display: flex; gap: 8px;">
        <button type="button" onclick="window.print()" class="preview-btn" style="cursor: pointer;">Cetak Browser</button>
        <a href="{{ route('admin.documents.pdf', $document) }}" class="preview-btn preview-btn-primary">Download PDF</a>
    </div>
</div>
@endif

<div class="sheet">
    <!-- KOP SURAT RESMI -->
    <table class="kop-table">
        <tr>
            <td style="width: 72px; padding-right: 12px;">
                @if($logoDataUri)
                    <img src="{{ $logoDataUri }}" alt="Logo Danova" style="max-height: 52px; max-width: 68px;" />
                @else
                    <div style="width: 48px; height: 48px; background: #2454A5; color: #FFFFFF; font-weight: 700; font-size: 22px; text-align: center; line-height: 48px; border-radius: 8px;">D</div>
                @endif
            </td>
            <td>
                <h1 class="company-name">{{ $document->company_name ?: 'DANOVA DIGITAL' }}</h1>
                @if($document->company_tagline)
                    <div class="company-tagline">{{ $document->company_tagline }}</div>
                @endif
                <div class="company-meta">
                    @if($document->company_address){{ $document->company_address }}<br>@endif
                    Email: {{ $companyEmail }} &nbsp;|&nbsp; WhatsApp: {{ $companyWhatsapp }}@if($companyWebsite) &nbsp;|&nbsp; {{ $companyWebsite }}@endif
                </div>
            </td>
            <td style="text-align: right; vertical-align: top; width: 150px;">
                <div style="font-size: 9px; text-transform: uppercase; color: #475569; font-weight: 700;">Nomor Dokumen</div>
                <div style="font-size: 11px; font-weight: 700; color: #2454A5;">{{ $document->document_number }}</div>
                @if($document->document_type === 'paid_invoice' || $document->status === 'paid')
                    <div class="lunas-badge">LUNAS</div>
                @endif
            </td>
        </tr>
    </table>

    <!-- DOCUMENT HEADING -->
    <div class="doc-banner">
        <div class="doc-heading">{{ $document->type_meta['heading'] }}</div>
        <div class="doc-title">Perihal: {{ $document->title }}</div>
    </div>

    <!-- CLIENT & DOCUMENT META -->
    <table class="info-table">
        <tr>
            <td style="padding-right: 18px;">
                <div class="box-label">Kepada Yth.</div>
                <div style="font-weight: 700; font-size: 12px; color: #142746;">{{ $document->client_name }}</div>
                @if($document->client_company)
                    <div style="font-weight: 600; color: #334155;">{{ $document->client_company }}</div>
                @endif
                @if($document->client_address)
                    <div style="color: #475569; margin-top: 2px;">{!! nl2br(e($document->client_address)) !!}</div>
                @endif
                @if($document->client_phone || $document->client_email)
                    <div style="color: #475569; margin-top: 3px;">
                        @if($document->client_phone)Telp/WA: {{ $document->client_phone }}@endif
                        @if($document->client_phone && $document->client_email) · @endif
                        @if($document->client_email){{ $document->client_email }}@endif
                    </div>
                @endif
            </td>
            <td style="padding-left: 18px;">
                <div class="box-label">Detail Dokumen</div>
                <table class="meta-list">
                    <tr>
                        <td style="color: #475569; width: 115px;">Tanggal Terbit</td>
                        <td style="font-weight: 700;">: {{ $document->issue_date?->translatedFormat('d F Y') ?? $document->issue_date?->format('d/m/Y') }}</td>
                    </tr>
                    @if($document->due_date)
                    <tr>
                        <td style="color: #475569;">{{ $document->document_type === 'quotation' ? 'Berlaku Hingga' : 'Jatuh Tempo' }}</td>
                        <td style="font-weight: 700;">: {{ $document->due_date->translatedFormat('d F Y') }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td style="color: #475569;">Status Dokumen</td>
                        <td style="font-weight: 700;">: {{ $document->status_label }}</td>
                    </tr>
                    <tr>
                        <td style="color: #475569;">Kode Verifikasi</td>
                        <td style="font-weight: 700; color: #2454A5;">: {{ $document->verification_code }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- ITEMS TABLE -->
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 34px;" class="text-center">No</th>
                <th>Deskripsi Pekerjaan / Layanan</th>
                <th style="width: 52px;" class="text-center">Qty</th>
                <th style="width: 110px;" class="text-right">Harga Satuan</th>
                <th style="width: 115px;" class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($document->items ?? [] as $i => $item)
            @php
                $qty = max(1, (int) ($item['qty'] ?? 1));
                $unit = max(0, (int) ($item['unit_price'] ?? 0));
                $lineTotal = $qty * $unit;
            @endphp
            <tr>
                <td class="text-center">{{ $i + 1 }}</td>
                <td>
                    <div style="font-weight: 700; color: #142746;">{{ $item['name'] ?? '' }}</div>
                    @if(!empty($item['description']))
                        <div style="font-size: 9.5px; color: #475569; margin-top: 2px;">{!! nl2br(e($item['description'])) !!}</div>
                    @endif
                </td>
                <td class="text-center">{{ $qty }}</td>
                <td class="text-right">Rp {{ number_format($unit, 0, ',', '.') }}</td>
                <td class="text-right" style="font-weight: 700;">Rp {{ number_format($lineTotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- BANK INFO & TOTALS -->
    <table class="summary-wrap" style="margin-bottom: 14px;">
        <tr>
            <td style="width: 52%; padding-right: 16px;">
                @if($document->bank_info)
                <div class="panel-box">
                    <h4>Informasi Pembayaran / Rekening Tujuan</h4>
                    <div>{!! nl2br(e($document->bank_info)) !!}</div>
                </div>
                @endif
            </td>
            <td style="width: 48%;">
                <table class="totals-table">
                    <tr>
                        <td style="color: #475569;">Subtotal</td>
                        <td class="text-right" style="font-weight: 600;">Rp {{ number_format($document->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @if($document->discount > 0)
                    <tr>
                        <td style="color: #475569;">Diskon</td>
                        <td class="text-right" style="color: #059669; font-weight: 600;">- Rp {{ number_format($document->discount, 0, ',', '.') }}</td>
                    </tr>
                    @endif
                    @if($document->tax_percent > 0)
                    <tr>
                        <td style="color: #475569;">Pajak ({{ rtrim(rtrim(number_format($document->tax_percent, 2, ',', '.'), '0'), ',') }}%)</td>
                        <td class="text-right" style="font-weight: 600;">Rp {{ number_format($document->tax_amount, 0, ',', '.') }}</td>
                    </tr>
                    @endif
                    <tr class="totals-grand">
                        <td>Total Nilai Proyek</td>
                        <td class="text-right">Rp {{ number_format($document->grand_total, 0, ',', '.') }}</td>
                    </tr>
                    @if($document->document_type === 'dp_request')
                    <tr>
                        <td style="font-weight: 700; color: #2454A5;">Tagihan DP ({{ $document->dp_percent }}%)</td>
                        <td class="text-right" style="font-weight: 700; color: #2454A5; font-size: 12px;">Rp {{ number_format($document->dp_amount, 0, ',', '.') }}</td>
                    </tr>
                    @elseif($document->paid_amount > 0)
                    <tr>
                        <td style="color: #059669; font-weight: 600;">Sudah Dibayar / DP Masuk</td>
                        <td class="text-right" style="color: #059669; font-weight: 600;">Rp {{ number_format($document->paid_amount, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700; color: #2454A5;">{{ $document->document_type === 'paid_invoice' ? 'Sisa Tagihan' : 'Sisa Pelunasan' }}</td>
                        <td class="text-right" style="font-weight: 700; color: #2454A5; font-size: 12px;">Rp {{ number_format($document->balance_due, 0, ',', '.') }}</td>
                    </tr>
                    @endif
                </table>
            </td>
        </tr>
    </table>

    <!-- TERMS & NOTES -->
    @if($document->payment_terms)
    <div class="panel-box">
        <h4>Ketentuan Pembayaran & Kesepakatan</h4>
        <div>{!! nl2br(e($document->payment_terms)) !!}</div>
    </div>
    @endif

    @if($document->notes)
    <div class="panel-box">
        <h4>Catatan Tambahan</h4>
        <div>{!! nl2br(e($document->notes)) !!}</div>
    </div>
    @endif

    <!-- ELECTRONIC SIGNATURES -->
    <table class="sig-table">
        <tr>
            <td>
                @if(in_array($document->document_type, ['spk', 'bast', 'quotation']) || $document->client_signature_data || $document->client_signer_name)
                    <div style="font-size: 10px; color: #475569;">Pihak Klien / Penerima,</div>
                    <div class="sig-box">
                        @if($document->client_signature_data)
                            <img src="{{ $document->client_signature_data }}" alt="Tanda Tangan Klien" />
                        @endif
                    </div>
                    <div class="sig-name">{{ $document->client_signer_name ?: $document->client_name }}</div>
                    <div class="sig-role">{{ $document->client_company ?: 'Klien' }}</div>
                @endif
            </td>
            <td>
                <div style="font-size: 10px; color: #475569;">Hormat kami, {{ $document->company_name ?: 'Danova Digital' }}</div>
                <div class="sig-box">
                    @if($document->signature_data)
                        <img src="{{ $document->signature_data }}" alt="Electronic Signature Danova" />
                    @endif
                </div>
                <div class="sig-name">{{ $document->signer_name }}</div>
                <div class="sig-role">{{ $document->signer_role }}</div>
                @if($document->signature_data)
                    <div class="esign-meta">E-Signed · Verified {{ $document->verification_code }}</div>
                @endif
            </td>
        </tr>
    </table>

    <div class="doc-footer">
        Dokumen resmi diterbitkan secara elektronik oleh {{ $document->company_name ?: 'Danova Digital' }} · Kode Verifikasi: {{ $document->verification_code }}
    </div>
</div>
</body>
</html>
