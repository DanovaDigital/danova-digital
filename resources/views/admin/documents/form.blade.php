@extends('admin.layout')

@section('title', ($isEdit ? 'Edit ' . $document->document_number : 'Buat Dokumen Baru') . ' · Admin Danova')
@section('header-title', $isEdit ? $document->document_number : 'Buat Dokumen Bisnis')
@section('header-subtitle', $isEdit ? ($document->type_meta['label'] . ' · ' . $document->title) : 'Isi data sekali, langsung preview atau unduh PDF resmi ber-KOP Danova & E-Signature.')

@section('header-actions')
@if($isEdit)
<a href="{{ route('admin.documents.preview', $document) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm">Preview</a>
<a href="{{ route('admin.documents.pdf', $document) }}" class="btn btn-primary btn-sm">Download PDF</a>
@endif
<a href="{{ route('admin.documents.index') }}" class="btn btn-sm">Kembali</a>
@endsection

@section('content')
@if(session('success'))
<div style="padding: 12px 16px; margin-bottom: 16px; border-radius: var(--radius-sm); background: #ECFDF5; border: 1px solid #A7F3D0; color: #065F46; font-size: 13px; font-weight: 600;">
    {{ session('success') }}
</div>
@endif

@include('admin.partials.errors')

@if($isEdit)
<!-- Quick Workflow Conversion Bar -->
<div class="card" style="padding: 16px 20px; margin-bottom: 20px; background: var(--surface);">
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px;">
        <div>
            <div style="font-weight: 700; font-size: 14px; color: var(--black);">Lanjutkan Siklus Dokumen</div>
            <div class="muted" style="font-size: 12px;">Salin data klien & item pekerjaan dari dokumen ini ke tahap berikutnya secara otomatis.</div>
        </div>
        <form method="POST" action="{{ route('admin.documents.convert', $document) }}" style="display: flex; flex-wrap: wrap; gap: 8px; align-items: center;">
            @csrf
            <select name="target_type" style="width: auto; min-width: 220px;">
                @foreach($types as $typeKey => $meta)
                    @if($typeKey !== $document->document_type)
                        <option value="{{ $typeKey }}">Buat {{ $meta['short'] }}</option>
                    @endif
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary btn-sm">Konversi Dokumen</button>
        </form>
    </div>
</div>
@endif

<form method="POST" action="{{ $isEdit ? route('admin.documents.update', $document) : route('admin.documents.store') }}" id="documentForm">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <!-- 1. Informasi Dokumen -->
    <div class="card" style="margin-bottom: 20px;">
        <div class="card-header" style="border-bottom: 1px solid var(--light-gray);">
            <div>
                <div class="card-title">1. Informasi Dokumen</div>
                <div class="muted">Pilih jenis dokumen, nomor surat, tanggal terbit, dan status.</div>
            </div>
        </div>
        <div style="padding: 24px;">
            <div class="form-grid">
                <div class="field">
                    <label for="document_type">Jenis Dokumen *</label>
                    <select id="document_type" name="document_type" required>
                        @foreach($types as $typeKey => $meta)
                            <option value="{{ $typeKey }}" data-prefix="{{ $meta['prefix'] }}" @selected(old('document_type', $document->document_type) === $typeKey)>
                                {{ $meta['label'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label for="document_number">Nomor Dokumen *</label>
                    <input type="text" id="document_number" name="document_number" value="{{ old('document_number', $document->document_number) }}" required />
                </div>
                <div class="field">
                    <label for="title">Judul / Perihal Proyek *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $document->title) }}" placeholder="Contoh: Pembuatan Website Company Profile PT ..." required />
                </div>
                <div class="field">
                    <label for="status">Status Dokumen *</label>
                    <select id="status" name="status" required>
                        @foreach($statuses as $statusKey => $label)
                            <option value="{{ $statusKey }}" @selected(old('status', $document->status) === $statusKey)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label for="issue_date">Tanggal Terbit *</label>
                    <input type="date" id="issue_date" name="issue_date" value="{{ old('issue_date', optional($document->issue_date)->format('Y-m-d') ?? now()->toDateString()) }}" required style="width: 100%; padding: 10px 14px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); font-family: inherit; font-size: 14px;" />
                </div>
                <div class="field">
                    <label for="due_date">Berlaku Hingga / Jatuh Tempo</label>
                    <input type="date" id="due_date" name="due_date" value="{{ old('due_date', optional($document->due_date)->format('Y-m-d')) }}" style="width: 100%; padding: 10px 14px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); font-family: inherit; font-size: 14px;" />
                </div>
                <div class="field" style="grid-column: 1 / -1; margin-bottom: 0;">
                    <label for="lead_id">Tautkan ke Brief Masuk (Opsional)</label>
                    <select id="lead_id" name="lead_id">
                        <option value="">— Tidak ditautkan —</option>
                        @foreach($leads as $leadOption)
                            <option value="{{ $leadOption->id }}" @selected((string) old('lead_id', $document->lead_id) === (string) $leadOption->id)>
                                {{ $leadOption->brand }} ({{ $leadOption->service }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Data Klien -->
    <div class="card" style="margin-bottom: 20px;">
        <div class="card-header" style="border-bottom: 1px solid var(--light-gray);">
            <div>
                <div class="card-title">2. Data Klien / Penerima</div>
                <div class="muted">Akan ditampilkan pada bagian "Kepada Yth." di surat PDF.</div>
            </div>
        </div>
        <div style="padding: 24px;">
            <div class="form-grid">
                <div class="field">
                    <label for="client_name">Nama PIC / Klien *</label>
                    <input type="text" id="client_name" name="client_name" value="{{ old('client_name', $document->client_name) }}" required />
                </div>
                <div class="field">
                    <label for="client_company">Nama Perusahaan / Usaha</label>
                    <input type="text" id="client_company" name="client_company" value="{{ old('client_company', $document->client_company) }}" />
                </div>
                <div class="field">
                    <label for="client_phone">Nomor WhatsApp / Telepon</label>
                    <input type="text" id="client_phone" name="client_phone" value="{{ old('client_phone', $document->client_phone) }}" placeholder="+628..." />
                </div>
                <div class="field">
                    <label for="client_email">Email Klien</label>
                    <input type="email" id="client_email" name="client_email" value="{{ old('client_email', $document->client_email) }}" />
                </div>
                <div class="field" style="grid-column: 1 / -1; margin-bottom: 0;">
                    <label for="client_address">Alamat Klien</label>
                    <textarea id="client_address" name="client_address" style="min-height: 74px;">{{ old('client_address', $document->client_address) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Rincian Pekerjaan & Kalkulasi -->
    <div class="card" style="margin-bottom: 20px;">
        <div class="card-header" style="border-bottom: 1px solid var(--light-gray);">
            <div>
                <div class="card-title">3. Rincian Pekerjaan & Biaya</div>
                <div class="muted">Tambahkan item layanan/pekerjaan, diskon, pajak, DP, atau nominal yang sudah dibayar.</div>
            </div>
            <button type="button" id="addItemBtn" class="btn btn-primary btn-sm">+ Tambah Item</button>
        </div>
        <div style="padding: 24px;">
            <div id="itemsContainer" style="display: grid; gap: 14px; margin-bottom: 20px;">
                @php
                    $items = old('items', $document->items ?? [['name' => '', 'description' => '', 'qty' => 1, 'unit_price' => 0]]);
                @endphp
                @foreach($items as $idx => $item)
                <div class="doc-item-row" style="padding: 16px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); background: var(--surface);">
                    <div class="doc-item-grid">
                        <div>
                            <label style="margin-bottom: 4px;">Nama Layanan / Item *</label>
                            <input type="text" name="items[{{ $idx }}][name]" value="{{ $item['name'] ?? '' }}" required />
                        </div>
                        <div>
                            <label style="margin-bottom: 4px;">Qty *</label>
                            <input type="number" class="item-qty" name="items[{{ $idx }}][qty]" value="{{ $item['qty'] ?? 1 }}" min="1" required />
                        </div>
                        <div>
                            <label style="margin-bottom: 4px;">Harga Satuan (Rp) *</label>
                            <input type="number" class="item-price" name="items[{{ $idx }}][unit_price]" value="{{ $item['unit_price'] ?? 0 }}" min="0" required />
                        </div>
                        <div style="display: flex; align-items: end;">
                            <button type="button" class="btn btn-danger btn-sm remove-item-btn" style="width: 100%;">Hapus</button>
                        </div>
                    </div>
                    <div style="margin-top: 10px;">
                        <label style="margin-bottom: 4px;">Deskripsi Singkat</label>
                        <textarea name="items[{{ $idx }}][description]" style="min-height: 60px;" placeholder="Detail cakupan fitur/pekerjaan...">{{ $item['description'] ?? '' }}</textarea>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="form-grid">
                <div class="field">
                    <label for="discount">Diskon (Rp)</label>
                    <input type="number" id="discount" name="discount" value="{{ old('discount', $document->discount ?? 0) }}" min="0" />
                </div>
                <div class="field">
                    <label for="tax_percent">Pajak / PPN (%)</label>
                    <input type="number" id="tax_percent" name="tax_percent" value="{{ old('tax_percent', $document->tax_percent ?? 0) }}" min="0" max="100" step="0.5" />
                </div>
                <div class="field">
                    <label for="dp_percent">Persentase DP (%) — untuk Pengajuan DP</label>
                    <input type="number" id="dp_percent" name="dp_percent" value="{{ old('dp_percent', $document->dp_percent ?? 50) }}" min="0" max="100" />
                </div>
                <div class="field">
                    <label for="paid_amount">Sudah Dibayar / DP Masuk (Rp)</label>
                    <input type="number" id="paid_amount" name="paid_amount" value="{{ old('paid_amount', $document->paid_amount ?? 0) }}" min="0" />
                </div>
            </div>

            <div style="padding: 16px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); background: var(--primary-light); display: flex; flex-wrap: wrap; justify-content: space-between; gap: 16px;">
                <div>
                    <div class="muted" style="font-size: 12px;">Subtotal</div>
                    <div id="liveSubtotal" style="font-weight: 700; font-size: 16px;">Rp 0</div>
                </div>
                <div>
                    <div class="muted" style="font-size: 12px;">Total Nilai Proyek</div>
                    <div id="liveGrandTotal" style="font-weight: 700; font-size: 18px; color: var(--primary);">Rp 0</div>
                </div>
                <div>
                    <div class="muted" style="font-size: 12px;">Nilai DP (<span id="liveDpPct">50</span>%)</div>
                    <div id="liveDpAmount" style="font-weight: 700; font-size: 16px;">Rp 0</div>
                </div>
                <div>
                    <div class="muted" style="font-size: 12px;">Sisa Tagihan</div>
                    <div id="liveBalance" style="font-weight: 700; font-size: 18px; color: var(--black);">Rp 0</div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. KOP Surat, Rekening & Ketentuan -->
    <div class="card" style="margin-bottom: 20px;">
        <div class="card-header" style="border-bottom: 1px solid var(--light-gray);">
            <div>
                <div class="card-title">4. KOP Surat, Rekening & Ketentuan</div>
                <div class="muted">Mengatur header KOP surat Danova, informasi bank, serta ketentuan pembayaran.</div>
            </div>
        </div>
        <div style="padding: 24px;">
            <div class="form-grid">
                <div class="field">
                    <label for="company_name">Nama Perusahaan di KOP *</label>
                    <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $document->company_name) }}" required />
                </div>
                <div class="field">
                    <label for="company_tagline">Tagline KOP</label>
                    <input type="text" id="company_tagline" name="company_tagline" value="{{ old('company_tagline', $document->company_tagline) }}" />
                </div>
                <div class="field">
                    <label for="company_address">Alamat di KOP</label>
                    <textarea id="company_address" name="company_address" style="min-height: 80px;">{{ old('company_address', $document->company_address) }}</textarea>
                </div>
                <div class="field">
                    <label for="bank_info">Informasi Rekening Tujuan</label>
                    <textarea id="bank_info" name="bank_info" style="min-height: 80px;">{{ old('bank_info', $document->bank_info) }}</textarea>
                </div>
                <div class="field">
                    <label for="payment_terms">Ketentuan Pembayaran / Kesepakatan</label>
                    <textarea id="payment_terms" name="payment_terms" style="min-height: 100px;">{{ old('payment_terms', $document->payment_terms) }}</textarea>
                </div>
                <div class="field">
                    <label for="notes">Catatan Tambahan</label>
                    <textarea id="notes" name="notes" style="min-height: 100px;">{{ old('notes', $document->notes) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- 5. Electronic Signature -->
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-header" style="border-bottom: 1px solid var(--light-gray);">
            <div>
                <div class="card-title">5. Electronic Signature (Tanda Tangan Elektronik)</div>
                <div class="muted">Goreskan tanda tangan langsung pada kanvas atau unggah gambar PNG transparan.</div>
            </div>
        </div>
        <div style="padding: 24px;">
            <div class="form-grid">
                <!-- Pihak Danova -->
                <div style="padding: 16px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); background: var(--surface);">
                    <div style="font-weight: 700; margin-bottom: 12px;">Tanda Tangan Pihak Danova</div>
                    <div class="field">
                        <label for="signer_name">Nama Penandatangan *</label>
                        <input type="text" id="signer_name" name="signer_name" value="{{ old('signer_name', $document->signer_name) }}" required />
                    </div>
                    <div class="field">
                        <label for="signer_role">Jabatan *</label>
                        <input type="text" id="signer_role" name="signer_role" value="{{ old('signer_role', $document->signer_role) }}" required />
                    </div>
                    <div class="field" style="margin-bottom: 8px;">
                        <label>Kanvas Tanda Tangan Elektronik</label>
                        <canvas id="danovaSigCanvas" width="420" height="150" class="sig-canvas"></canvas>
                        <input type="hidden" id="signature_data" name="signature_data" value="{{ old('signature_data', $document->signature_data) }}" />
                    </div>
                    <div style="display: flex; flex-wrap: wrap; gap: 8px; align-items: center;">
                        <button type="button" class="btn btn-sm" data-clear-sig="danova">Hapus TTD</button>
                        <label class="btn btn-sm" style="margin-bottom: 0; cursor: pointer;">
                            Upload PNG
                            <input type="file" accept="image/png,image/jpeg,image/webp" class="sig-upload" data-target="danova" hidden />
                        </label>
                    </div>
                </div>

                <!-- Pihak Klien (Opsional) -->
                <div style="padding: 16px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); background: var(--surface);">
                    <div style="font-weight: 700; margin-bottom: 12px;">Tanda Tangan Pihak Klien (Opsional, untuk SPK / BAST)</div>
                    <div class="field">
                        <label for="client_signer_name">Nama Penandatangan Klien</label>
                        <input type="text" id="client_signer_name" name="client_signer_name" value="{{ old('client_signer_name', $document->client_signer_name) }}" placeholder="Kosongkan untuk pakai nama PIC klien" />
                    </div>
                    <div class="field" style="margin-bottom: 8px;">
                        <label>Kanvas Tanda Tangan Klien</label>
                        <canvas id="clientSigCanvas" width="420" height="150" class="sig-canvas"></canvas>
                        <input type="hidden" id="client_signature_data" name="client_signature_data" value="{{ old('client_signature_data', $document->client_signature_data) }}" />
                    </div>
                    <div style="display: flex; flex-wrap: wrap; gap: 8px; align-items: center;">
                        <button type="button" class="btn btn-sm" data-clear-sig="client">Hapus TTD</button>
                        <label class="btn btn-sm" style="margin-bottom: 0; cursor: pointer;">
                            Upload PNG
                            <input type="file" accept="image/png,image/jpeg,image/webp" class="sig-upload" data-target="client" hidden />
                        </label>
                    </div>
                </div>
            </div>

            <label class="checkbox" style="margin-top: 16px; cursor: pointer;">
                <input type="checkbox" name="save_defaults" value="1" checked />
                <span>Simpan KOP Surat, Rekening Bank, Nama Penandatangan, dan Tanda Tangan Danova sebagai default untuk dokumen berikutnya</span>
            </label>
        </div>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 12px; justify-content: flex-end;">
        <a href="{{ route('admin.documents.index') }}" class="btn">Batal</a>
        <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Simpan Perubahan Dokumen' : 'Simpan & Generate Dokumen' }}</button>
    </div>
</form>

<style>
    .doc-item-grid {
        display: grid;
        grid-template-columns: 2fr 90px 170px 90px;
        gap: 10px;
    }

    .sig-canvas {
        width: 100%;
        max-width: 420px;
        height: 150px;
        background: #FFFFFF;
        border: 1px dashed #94A3B8;
        border-radius: 10px;
        touch-action: none;
        cursor: crosshair;
        display: block;
    }

    @media (max-width: 768px) {
        .doc-item-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Auto-update document number prefix on create
    var isEdit = @json($isEdit);
    var typeSelect = document.getElementById('document_type');
    var numberInput = document.getElementById('document_number');
    if (!isEdit && typeSelect && numberInput) {
        typeSelect.addEventListener('change', function () {
            var opt = typeSelect.selectedOptions[0];
            var prefix = opt ? opt.dataset.prefix : 'DOC';
            var current = numberInput.value;
            var parts = current.split('/');
            if (parts.length >= 3) {
                parts[0] = prefix;
                numberInput.value = parts.join('/');
            }
            recalcTotals();
        });
    }

    // 2. Dynamic Items Builder & Live Calculation
    var container = document.getElementById('itemsContainer');
    var addBtn = document.getElementById('addItemBtn');
    var itemIndex = container ? container.querySelectorAll('.doc-item-row').length : 1;

    function formatIdr(val) {
        return 'Rp ' + Number(Math.max(0, Math.round(val))).toLocaleString('id-ID');
    }

    function recalcTotals() {
        var subtotal = 0;
        container.querySelectorAll('.doc-item-row').forEach(function (row) {
            var qty = parseInt(row.querySelector('.item-qty')?.value || '1', 10) || 1;
            var price = parseInt(row.querySelector('.item-price')?.value || '0', 10) || 0;
            subtotal += Math.max(1, qty) * Math.max(0, price);
        });
        var discount = parseInt(document.getElementById('discount')?.value || '0', 10) || 0;
        var taxPct = parseFloat(document.getElementById('tax_percent')?.value || '0') || 0;
        var dpPct = Math.min(100, Math.max(0, parseInt(document.getElementById('dp_percent')?.value || '50', 10) || 0));
        var paid = parseInt(document.getElementById('paid_amount')?.value || '0', 10) || 0;

        var taxable = Math.max(0, subtotal - discount);
        var tax = Math.round(taxable * (taxPct / 100));
        var grand = taxable + tax;
        var dpAmt = Math.round(grand * (dpPct / 100));
        var type = typeSelect ? typeSelect.value : 'quotation';
        var balance = type === 'dp_request'
            ? Math.max(0, dpAmt - paid)
            : (type === 'paid_invoice' ? 0 : Math.max(0, grand - paid));

        document.getElementById('liveSubtotal').textContent = formatIdr(subtotal);
        document.getElementById('liveGrandTotal').textContent = formatIdr(grand);
        document.getElementById('liveDpPct').textContent = dpPct;
        document.getElementById('liveDpAmount').textContent = formatIdr(dpAmt);
        document.getElementById('liveBalance').textContent = formatIdr(balance);
    }

    if (addBtn && container) {
        addBtn.addEventListener('click', function () {
            var idx = itemIndex++;
            var row = document.createElement('div');
            row.className = 'doc-item-row';
            row.style.cssText = 'padding: 16px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); background: var(--surface);';
            row.innerHTML =
                '<div class="doc-item-grid">' +
                    '<div><label style="margin-bottom: 4px;">Nama Layanan / Item *</label><input type="text" name="items[' + idx + '][name]" required /></div>' +
                    '<div><label style="margin-bottom: 4px;">Qty *</label><input type="number" class="item-qty" name="items[' + idx + '][qty]" value="1" min="1" required /></div>' +
                    '<div><label style="margin-bottom: 4px;">Harga Satuan (Rp) *</label><input type="number" class="item-price" name="items[' + idx + '][unit_price]" value="0" min="0" required /></div>' +
                    '<div style="display: flex; align-items: end;"><button type="button" class="btn btn-danger btn-sm remove-item-btn" style="width: 100%;">Hapus</button></div>' +
                '</div>' +
                '<div style="margin-top: 10px;"><label style="margin-bottom: 4px;">Deskripsi Singkat</label><textarea name="items[' + idx + '][description]" style="min-height: 60px;" placeholder="Detail cakupan fitur/pekerjaan..."></textarea></div>';
            container.appendChild(row);
            recalcTotals();
        });

        container.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-item-btn')) {
                var rows = container.querySelectorAll('.doc-item-row');
                if (rows.length > 1) {
                    e.target.closest('.doc-item-row').remove();
                    recalcTotals();
                }
            }
        });

        document.getElementById('documentForm').addEventListener('input', function (e) {
            if (e.target.matches('.item-qty, .item-price, #discount, #tax_percent, #dp_percent, #paid_amount')) {
                recalcTotals();
            }
        });
        recalcTotals();
    }

    // 3. Electronic Signature Canvas Pads
    function initSignaturePad(canvasId, inputId) {
        var canvas = document.getElementById(canvasId);
        var hidden = document.getElementById(inputId);
        if (!canvas || !hidden) return null;

        var ctx = canvas.getContext('2d');
        ctx.strokeStyle = '#142746';
        ctx.lineWidth = 2.4;
        ctx.lineCap = 'round';
        ctx.lineJoin = 'round';

        if (hidden.value && hidden.value.indexOf('data:image') === 0) {
            var img = new Image();
            img.onload = function () {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
            };
            img.src = hidden.value;
        }

        var drawing = false;
        function getPos(ev) {
            var rect = canvas.getBoundingClientRect();
            return {
                x: (ev.clientX - rect.left) * (canvas.width / rect.width),
                y: (ev.clientY - rect.top) * (canvas.height / rect.height)
            };
        }

        canvas.addEventListener('pointerdown', function (ev) {
            drawing = true;
            canvas.setPointerCapture(ev.pointerId);
            var p = getPos(ev);
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
        });

        canvas.addEventListener('pointermove', function (ev) {
            if (!drawing) return;
            var p = getPos(ev);
            ctx.lineTo(p.x, p.y);
            ctx.stroke();
        });

        function endDraw() {
            if (!drawing) return;
            drawing = false;
            hidden.value = canvas.toDataURL('image/png');
        }

        canvas.addEventListener('pointerup', endDraw);
        canvas.addEventListener('pointercancel', endDraw);

        return {
            clear: function () {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                hidden.value = '';
            },
            loadDataUrl: function (url) {
                var img = new Image();
                img.onload = function () {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    var ratio = Math.min(canvas.width / img.width, canvas.height / img.height);
                    var w = img.width * ratio;
                    var h = img.height * ratio;
                    ctx.drawImage(img, (canvas.width - w) / 2, (canvas.height - h) / 2, w, h);
                    hidden.value = canvas.toDataURL('image/png');
                };
                img.src = url;
            }
        };
    }

    var pads = {
        danova: initSignaturePad('danovaSigCanvas', 'signature_data'),
        client: initSignaturePad('clientSigCanvas', 'client_signature_data')
    };

    document.querySelectorAll('[data-clear-sig]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = btn.getAttribute('data-clear-sig');
            pads[target]?.clear();
        });
    });

    document.querySelectorAll('.sig-upload').forEach(function (input) {
        input.addEventListener('change', function () {
            var file = input.files && input.files[0];
            var target = input.getAttribute('data-target');
            if (!file || !pads[target]) return;
            var reader = new FileReader();
            reader.onload = function (ev) {
                pads[target].loadDataUrl(ev.target.result);
            };
            reader.readAsDataURL(file);
        });
    });
});
</script>
@endsection
