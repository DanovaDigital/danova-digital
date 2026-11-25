<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $document->document_number }} — {{ $document->type_meta['short'] }}</title>
    <style>
        @page {
            margin: 20mm 22mm 20mm 22mm;
        }
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Times New Roman', 'DejaVu Serif', Times, serif;
            color: #111111;
            font-size: 11.5pt;
            line-height: 1.5;
            margin: 0;
            padding: {{ $isPdf ? '0' : '24px' }};
            background: {{ $isPdf ? '#FFFFFF' : '#F3F4F6' }};
        }
        .sheet {
            background: #FFFFFF;
            max-width: {{ $isPdf ? '100%' : '794px' }};
            margin: 0 auto;
            padding: {{ $isPdf ? '0' : '48px 56px' }};
            border: {{ $isPdf ? 'none' : '1px solid #D1D5DB' }};
        }
        .preview-toolbar {
            max-width: 794px;
            margin: 0 auto 16px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            font-family: Arial, sans-serif;
        }
        .preview-btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid #D1D5DB;
            background: #FFFFFF;
            color: #111111;
        }
        .preview-btn-primary {
            background: #111827;
            border-color: #111827;
            color: #FFFFFF;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        /* KOP SURAT RESMI */
        .kop-wrap {
            border-bottom: 3px solid #111111;
            padding-bottom: 2px;
            margin-bottom: 18px;
        }
        .kop-inner {
            border-bottom: 1px solid #111111;
            padding-bottom: 10px;
        }
        .kop-table td {
            vertical-align: middle;
        }
        .company-name {
            font-size: 16pt;
            font-weight: bold;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin: 0 0 2px 0;
            color: #111111;
        }
        .company-tagline {
            font-size: 10.5pt;
            font-style: italic;
            margin: 0 0 3px 0;
            color: #222222;
        }
        .company-meta {
            font-size: 9.5pt;
            color: #333333;
            line-height: 1.35;
        }
        .doc-title-center {
            text-align: center;
            margin: 14px 0 16px 0;
        }
        .doc-title-center h2 {
            font-size: 13pt;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
            margin: 0 0 2px 0;
            letter-spacing: 0.4px;
        }
        .doc-title-center .doc-no {
            font-size: 10.5pt;
            margin: 0;
        }
        .letter-meta {
            margin-bottom: 16px;
            font-size: 11pt;
        }
        .letter-meta td {
            vertical-align: top;
            padding: 1px 0;
        }
        .recipient {
            margin-bottom: 14px;
            font-size: 11pt;
        }
        .paragraph {
            text-align: justify;
            margin: 0 0 12px 0;
        }
        .items-table {
            margin: 12px 0 14px 0;
            border: 1px solid #111111;
            font-size: 10.5pt;
        }
        .items-table th {
            border: 1px solid #111111;
            background: #F3F4F6;
            padding: 7px 8px;
            text-align: left;
            font-weight: bold;
        }
        .items-table td {
            border: 1px solid #111111;
            padding: 7px 8px;
            vertical-align: top;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .totals-table {
            width: 52%;
            margin-left: auto;
            margin-bottom: 14px;
            font-size: 10.5pt;
        }
        .totals-table td {
            padding: 4px 6px;
            border-bottom: 1px solid #D1D5DB;
        }
        .totals-grand td {
            font-weight: bold;
            border-top: 1.5px solid #111111;
            border-bottom: 1.5px solid #111111;
            padding: 6px;
        }
        .section-block {
            margin-bottom: 10px;
            font-size: 10.5pt;
        }
        .section-block strong {
            display: block;
            margin-bottom: 2px;
        }
        .lunas-stamp {
            display: inline-block;
            border: 2px solid #047857;
            color: #047857;
            font-weight: bold;
            font-size: 11pt;
            padding: 2px 10px;
            letter-spacing: 1.5px;
            margin-top: 4px;
        }
        .sig-table {
            margin-top: 22px;
            page-break-inside: avoid;
            font-size: 10.5pt;
        }
        .sig-table td {
            width: 50%;
            vertical-align: top;
            text-align: center;
            padding: 4px 12px;
        }
        .sig-box {
            height: 70px;
            margin: 6px auto;
        }
        .sig-box img {
            max-height: 66px;
            max-width: 180px;
        }
        .sig-name {
            font-weight: bold;
            text-decoration: underline;
            margin-top: 2px;
        }
        .esign-note {
            font-size: 8.5pt;
            color: #4B5563;
            margin-top: 2px;
        }
        .doc-footer {
            margin-top: 20px;
            padding-top: 6px;
            border-top: 1px solid #D1D5DB;
            font-size: 8.5pt;
            color: #4B5563;
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

@php
    $openingParagraph = match ($document->document_type) {
        'dp_request' => 'Dengan hormat, sehubungan dengan disepakatinya ruang lingkup pekerjaan "' . $document->title . '", bersama surat ini kami mengajukan permohonan pembayaran Uang Muka (Down Payment) sebesar ' . $document->dp_percent . '% sebagai tanda dimulainya pengerjaan proyek dengan rincian sebagai berikut:',
        'final_invoice_request' => 'Dengan hormat, sehubungan dengan telah selesainya pengerjaan "' . $document->title . '" dan telah dilakukannya peninjauan pratinjau, bersama surat ini kami mengajukan permohonan pembayaran pelunasan dengan rincian sebagai berikut:',
        'paid_invoice' => 'Dengan hormat, bersama surat ini kami menyatakan bahwa seluruh kewajiban pembayaran atas pekerjaan "' . $document->title . '" telah kami terima dengan LUNAS. Dokumen ini berlaku sebagai bukti pembayaran dan pelunasan yang sah:',
        'spk' => 'Dengan hormat, melalui surat perjanjian ini kedua belah pihak sepakat untuk melaksanakan pekerjaan "' . $document->title . '" sesuai dengan ruang lingkup, nilai kontrak, dan ketentuan pembayaran sebagai berikut:',
        'bast' => 'Dengan hormat, bersama berita acara ini kami menyatakan bahwa seluruh hasil pekerjaan "' . $document->title . '" beserta akses domain, hosting, dan source code telah diserahkan dan diterima dengan baik sesuai rincian berikut:',
        default => 'Dengan hormat, bersama surat ini kami sampaikan penawaran harga resmi untuk pelaksanaan pekerjaan "' . $document->title . '". Adapun rincian lingkup pekerjaan dan estimasi biaya yang kami ajukan adalah sebagai berikut:',
    };

    $closingParagraph = match ($document->document_type) {
        'paid_invoice' => 'Demikian surat bukti pelunasan ini kami terbitkan untuk dipergunakan sebagaimana mestinya. Atas kepercayaan dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.',
        'bast' => 'Demikian Berita Acara Serah Terima ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.',
        default => 'Demikian surat ini kami sampaikan. Atas perhatian dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.',
    };
@endphp

<div class="sheet">
    <!-- KOP SURAT RESMI -->
    <div class="kop-wrap">
        <div class="kop-inner">
            <table class="kop-table">
                <tr>
                    <td style="width: 70px; padding-right: 12px;">
                        @if($logoDataUri)
                            <img src="{{ $logoDataUri }}" alt="Logo" style="max-height: 54px; max-width: 66px;" />
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <h1 class="company-name">{{ $document->company_name ?: 'DANOVA DIGITAL' }}</h1>
                        @if($document->company_tagline)
                            <div class="company-tagline">{{ $document->company_tagline }}</div>
                        @endif
                        <div class="company-meta">
                            @if($document->company_address){{ $document->company_address }}<br>@endif
                            Email: {{ $companyEmail }} | WhatsApp: {{ $companyWhatsapp }}@if($companyWebsite) | {{ $companyWebsite }}@endif
                        </div>
                    </td>
                    <td style="width: 70px;"></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- JUDUL & NOMOR SURAT -->
    <div class="doc-title-center">
        <h2>{{ $document->type_meta['heading'] }}</h2>
        <p class="doc-no">Nomor: {{ $document->document_number }}</p>
        @if($document->document_type === 'paid_invoice' || $document->status === 'paid')
            <div class="lunas-stamp">LUNAS</div>
        @endif
    </div>

    <!-- TANGGAL & PERIHAL -->
    <table class="letter-meta">
        <tr>
            <td style="width: 62%;">
                <table>
                    <tr>
                        <td style="width: 75px;">Perihal</td>
                        <td>: <strong>{{ $document->title }}</strong></td>
                    </tr>
                    @if($document->due_date)
                    <tr>
                        <td>{{ $document->document_type === 'quotation' ? 'Berlaku s/d' : 'Jatuh Tempo' }}</td>
                        <td>: {{ $document->due_date->translatedFormat('d F Y') }}</td>
                    </tr>
                    @endif
                </table>
            </td>
            <td style="width: 38%; text-align: right;">
                {{ $document->issue_date?->translatedFormat('d F Y') ?? $document->issue_date?->format('d/m/Y') }}
            </td>
        </tr>
    </table>

    <!-- TUJUAN SURAT -->
    <div class="recipient">
        Kepada Yth.<br>
        <strong>{{ $document->client_name }}</strong><br>
        @if($document->client_company){{ $document->client_company }}<br>@endif
        @if($document->client_address){!! nl2br(e($document->client_address)) !!}<br>@endif
        @if($document->client_phone || $document->client_email)
            @if($document->client_phone)Telp/WA: {{ $document->client_phone }}@endif
            @if($document->client_phone && $document->client_email) | @endif
            @if($document->client_email){{ $document->client_email }}@endif
        @endif
    </div>

    <!-- PARAGRAF PEMBUKA -->
    <p class="paragraph">{{ $openingParagraph }}</p>

    <!-- TABEL RINCIAN -->
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 32px;" class="text-center">No</th>
                <th>Uraian Pekerjaan / Layanan</th>
                <th style="width: 48px;" class="text-center">Qty</th>
                <th style="width: 115px;" class="text-right">Harga Satuan</th>
                <th style="width: 120px;" class="text-right">Jumlah</th>
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
                    <strong>{{ $item['name'] ?? '' }}</strong>
                    @if(!empty($item['description']))
                        <br><span style="font-size: 9.5pt; color: #333333;">{!! nl2br(e($item['description'])) !!}</span>
                    @endif
                </td>
                <td class="text-center">{{ $qty }}</td>
                <td class="text-right">Rp {{ number_format($unit, 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($lineTotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- RINGKASAN BIAYA -->
    <table class="totals-table">
        <tr>
            <td>Subtotal</td>
            <td class="text-right">Rp {{ number_format($document->subtotal, 0, ',', '.') }}</td>
        </tr>
        @if($document->discount > 0)
        <tr>
            <td>Diskon</td>
            <td class="text-right">- Rp {{ number_format($document->discount, 0, ',', '.') }}</td>
        </tr>
        @endif
        @if($document->tax_percent > 0)
        <tr>
            <td>Pajak ({{ rtrim(rtrim(number_format($document->tax_percent, 2, ',', '.'), '0'), ',') }}%)</td>
            <td class="text-right">Rp {{ number_format($document->tax_amount, 0, ',', '.') }}</td>
        </tr>
        @endif
        <tr class="totals-grand">
            <td>Total Nilai Pekerjaan</td>
            <td class="text-right">Rp {{ number_format($document->grand_total, 0, ',', '.') }}</td>
        </tr>
        @if($document->document_type === 'dp_request')
        <tr>
            <td><strong>Tagihan DP ({{ $document->dp_percent }}%)</strong></td>
            <td class="text-right"><strong>Rp {{ number_format($document->dp_amount, 0, ',', '.') }}</strong></td>
        </tr>
        @elseif($document->paid_amount > 0)
        <tr>
            <td>Sudah Dibayar / DP Masuk</td>
            <td class="text-right">Rp {{ number_format($document->paid_amount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>{{ $document->document_type === 'paid_invoice' ? 'Sisa Tagihan' : 'Sisa Pelunasan' }}</strong></td>
            <td class="text-right"><strong>Rp {{ number_format($document->balance_due, 0, ',', '.') }}</strong></td>
        </tr>
        @endif
    </table>

    @if($document->bank_info)
    <div class="section-block">
        <strong>Informasi Pembayaran / Rekening Tujuan:</strong>
        <div>{!! nl2br(e($document->bank_info)) !!}</div>
    </div>
    @endif

    @if($document->payment_terms)
    <div class="section-block">
        <strong>Ketentuan:</strong>
        <div>{!! nl2br(e($document->payment_terms)) !!}</div>
    </div>
    @endif

    @if($document->notes)
    <div class="section-block">
        <strong>Catatan:</strong>
        <div>{!! nl2br(e($document->notes)) !!}</div>
    </div>
    @endif

    <!-- PARAGRAF PENUTUP -->
    <p class="paragraph" style="margin-top: 12px;">{{ $closingParagraph }}</p>

    <!-- TANDA TANGAN -->
    <table class="sig-table">
        <tr>
            <td>
                @if(in_array($document->document_type, ['spk', 'bast', 'quotation']) || $document->client_signature_data || $document->client_signer_name)
                    <div>Pihak Klien / Penerima,</div>
                    <div class="sig-box">
                        @if($document->client_signature_data)
                            <img src="{{ $document->client_signature_data }}" alt="Tanda Tangan Klien" />
                        @endif
                    </div>
                    <div class="sig-name">{{ $document->client_signer_name ?: $document->client_name }}</div>
                    <div>{{ $document->client_company ?: 'Klien' }}</div>
                @endif
            </td>
            <td>
                <div>Hormat kami,<br>{{ $document->company_name ?: 'Danova Digital' }}</div>
                <div class="sig-box">
                    @if($document->signature_data)
                        <img src="{{ $document->signature_data }}" alt="Tanda Tangan Elektronik" />
                    @endif
                </div>
                <div class="sig-name">{{ $document->signer_name }}</div>
                <div>{{ $document->signer_role }}</div>
                @if($document->signature_data)
                    <div class="esign-note">E-Signed · Verified {{ $document->verification_code }}</div>
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
