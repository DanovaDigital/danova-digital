@extends('admin.layout')

@section('title', 'Dokumen PDF · Admin Danova')
@section('header-title', 'Dokumen Bisnis & PDF')
@section('header-subtitle', 'Quotation, Pengajuan DP, Invoice Pelunasan, SPK, dan BAST dengan KOP Surat & E-Signature.')

@section('header-actions')
<a href="{{ route('admin.documents.create') }}" class="btn btn-primary btn-sm">
    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
    Buat Dokumen
</a>
@endsection

@section('content')
@if(session('success'))
<div style="padding: 12px 16px; margin-bottom: 16px; border-radius: var(--radius-sm); background: #ECFDF5; border: 1px solid #A7F3D0; color: #065F46; font-size: 13px; font-weight: 600;">
    {{ session('success') }}
</div>
@endif

<!-- Quick Create Type Shortcuts -->
<div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 16px;">
    @foreach($types as $typeKey => $meta)
        <a href="{{ route('admin.documents.create', ['type' => $typeKey]) }}" class="btn btn-sm">
            + {{ $meta['short'] }}
        </a>
    @endforeach
</div>

<!-- Search & Filter -->
<form method="GET" action="{{ route('admin.documents.index') }}" class="card" style="padding: 18px; margin-bottom: 20px;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px; align-items: end;">
        <div>
            <label for="q" style="margin-bottom: 4px;">Cari Dokumen</label>
            <input type="text" id="q" name="q" value="{{ $filters['q'] }}" placeholder="Nomor, judul, nama klien..." />
        </div>
        <div>
            <label for="type" style="margin-bottom: 4px;">Jenis Dokumen</label>
            <select id="type" name="type">
                <option value="">Semua Jenis</option>
                @foreach($types as $typeKey => $meta)
                    <option value="{{ $typeKey }}" @selected($filters['type'] === $typeKey)>{{ $meta['label'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="status" style="margin-bottom: 4px;">Status</label>
            <select id="status" name="status">
                <option value="">Semua Status</option>
                @foreach($statuses as $statusKey => $label)
                    <option value="{{ $statusKey }}" @selected($filters['status'] === $statusKey)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: flex; gap: 8px;">
            <button type="submit" class="btn btn-primary btn-sm" style="flex: 1;">Filter</button>
            @if(array_filter($filters))
                <a href="{{ route('admin.documents.index') }}" class="btn btn-sm">Reset</a>
            @endif
        </div>
    </div>
</form>

<!-- Documents Table -->
<div class="card">
    @if($documents->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th>Nomor & Judul</th>
                <th>Jenis</th>
                <th>Klien</th>
                <th>Total / Tagihan</th>
                <th>Status</th>
                <th style="text-align: right;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $doc)
            @php
                $statusStyles = [
                    'draft' => 'background: #F1F5F9; color: #475569;',
                    'sent' => 'background: #EAF3FF; color: #2454A5;',
                    'signed' => 'background: #E0E7FF; color: #3730A3;',
                    'paid' => 'background: #D1FAE5; color: #065F46;',
                ];
                $badgeStyle = $statusStyles[$doc->status] ?? $statusStyles['draft'];
            @endphp
            <tr>
                <td>
                    <div style="font-weight: 700; color: var(--primary); font-size: 13px;">{{ $doc->document_number }}</div>
                    <div style="font-weight: 600; color: var(--black);">{{ $doc->title }}</div>
                    <div class="muted" style="font-size: 12px;">{{ $doc->issue_date?->format('d/m/Y') }}</div>
                </td>
                <td>
                    <span class="pill">{{ $doc->type_meta['short'] }}</span>
                </td>
                <td>
                    <div style="font-weight: 600;">{{ $doc->client_name }}</div>
                    @if($doc->client_company)
                    <div class="muted" style="font-size: 12px;">{{ $doc->client_company }}</div>
                    @endif
                </td>
                <td>
                    <div style="font-weight: 700; color: var(--black);">Rp {{ number_format($doc->grand_total, 0, ',', '.') }}</div>
                    @if($doc->document_type === 'dp_request')
                        <div class="muted" style="font-size: 12px;">DP {{ $doc->dp_percent }}%: Rp {{ number_format($doc->dp_amount, 0, ',', '.') }}</div>
                    @elseif($doc->balance_due > 0 && $doc->paid_amount > 0)
                        <div class="muted" style="font-size: 12px;">Sisa: Rp {{ number_format($doc->balance_due, 0, ',', '.') }}</div>
                    @endif
                </td>
                <td>
                    <span class="pill" style="{{ $badgeStyle }}">{{ $doc->status_label }}</span>
                </td>
                <td>
                    <div class="row-actions" style="justify-content: flex-end;">
                        <a href="{{ route('admin.documents.preview', $doc) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm">Preview</a>
                        <a href="{{ route('admin.documents.pdf', $doc) }}" class="btn btn-primary btn-sm">PDF</a>
                        <a href="{{ route('admin.documents.edit', $doc) }}" class="btn btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.documents.destroy', $doc) }}" onsubmit="return confirm('Hapus dokumen {{ $doc->document_number }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        @include('admin.partials.empty-state', [
            'title' => array_filter($filters) ? 'Dokumen tidak ditemukan' : 'Belum ada dokumen bisnis',
            'description' => array_filter($filters)
                ? 'Coba ubah filter pencarian untuk melihat dokumen lainnya.'
                : 'Buat Quotation, Pengajuan DP, Invoice Pelunasan, SPK, atau BAST dengan KOP surat & tanda tangan elektronik.',
            'actionUrl' => array_filter($filters) ? route('admin.documents.index') : route('admin.documents.create'),
            'actionLabel' => array_filter($filters) ? 'Reset Filter' : 'Buat Dokumen Pertama',
        ])
    @endif
</div>

@if($documents->hasPages())
<div style="margin-top: 16px; display: flex; flex-wrap: wrap; align-items: center; gap: 12px;">
    @if($documents->previousPageUrl()) <a href="{{ $documents->previousPageUrl() }}" class="btn btn-sm">Sebelumnya</a> @endif
    <span class="muted">Halaman {{ $documents->currentPage() }} dari {{ $documents->lastPage() }}</span>
    @if($documents->nextPageUrl()) <a href="{{ $documents->nextPageUrl() }}" class="btn btn-sm">Berikutnya</a> @endif
</div>
@endif
@endsection
