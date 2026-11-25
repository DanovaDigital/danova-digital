@extends('admin.layout')

@section('title', 'Brief masuk · Admin Danova')
@section('header-title', 'Brief masuk')
@section('header-subtitle', 'Cari, filter, perbarui status follow-up, atau export Excel brief calon klien.')

@section('header-actions')
<a href="{{ route('admin.leads.export', request()->query()) }}" class="btn btn-primary btn-sm">
    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
    </svg>
    Export Excel
</a>
@endsection

@section('content')
@if(session('success'))
<div style="padding: 12px 16px; margin-bottom: 16px; border-radius: var(--radius-sm); background: #ECFDF5; border: 1px solid #A7F3D0; color: #065F46; font-size: 13px; font-weight: 600;">
    {{ session('success') }}
</div>
@endif

<!-- Status Summary Pills -->
<div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 16px;">
    <a href="{{ route('admin.leads.index', array_filter(['q' => $filters['q'], 'service' => $filters['service'], 'date_from' => $filters['date_from'], 'date_to' => $filters['date_to']])) }}"
       class="btn btn-sm {{ $filters['status'] === '' ? 'btn-primary' : '' }}">
        Semua ({{ number_format($totalAllLeads) }})
    </a>
    @foreach($statuses as $key => $label)
        <a href="{{ route('admin.leads.index', array_filter(['status' => $key, 'q' => $filters['q'], 'service' => $filters['service'], 'date_from' => $filters['date_from'], 'date_to' => $filters['date_to']])) }}"
           class="btn btn-sm {{ $filters['status'] === $key ? 'btn-primary' : '' }}">
            {{ $label }} ({{ number_format($statusCounts[$key] ?? 0) }})
        </a>
    @endforeach
</div>

<!-- Search & Filter Bar -->
<form method="GET" action="{{ route('admin.leads.index') }}" class="card" style="padding: 18px; margin-bottom: 20px;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(170px, 1fr)); gap: 12px; align-items: end;">
        <div>
            <label for="q" style="margin-bottom: 4px;">Cari Brief</label>
            <input type="text" id="q" name="q" value="{{ $filters['q'] }}" placeholder="Nama brand, WA, layanan..." />
        </div>
        <div>
            <label for="status" style="margin-bottom: 4px;">Status</label>
            <select id="status" name="status">
                <option value="">Semua Status</option>
                @foreach($statuses as $key => $label)
                    <option value="{{ $key }}" @selected($filters['status'] === $key)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="service" style="margin-bottom: 4px;">Layanan</label>
            <select id="service" name="service">
                <option value="">Semua Layanan</option>
                @foreach($services as $svc)
                    <option value="{{ $svc }}" @selected($filters['service'] === $svc)>{{ $svc }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date_from" style="margin-bottom: 4px;">Dari Tanggal</label>
            <input type="date" id="date_from" name="date_from" value="{{ $filters['date_from'] }}" style="width: 100%; padding: 10px 14px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); font-family: inherit; font-size: 14px;" />
        </div>
        <div>
            <label for="date_to" style="margin-bottom: 4px;">Sampai Tanggal</label>
            <input type="date" id="date_to" name="date_to" value="{{ $filters['date_to'] }}" style="width: 100%; padding: 10px 14px; border: 1px solid var(--light-gray); border-radius: var(--radius-sm); font-family: inherit; font-size: 14px;" />
        </div>
        <div style="display: flex; gap: 8px;">
            <button type="submit" class="btn btn-primary btn-sm" style="flex: 1;">Filter</button>
            @if(array_filter($filters))
                <a href="{{ route('admin.leads.index') }}" class="btn btn-sm">Reset</a>
            @endif
        </div>
    </div>
</form>

<!-- Leads List -->
<div style="display: grid; gap: 1rem;">
    @forelse ($leads as $lead)
        @php
            $statusStyles = [
                'baru' => 'background: #EAF3FF; color: #2454A5;',
                'dihubungi' => 'background: #FEF3C7; color: #92400E;',
                'negosiasi' => 'background: #E0E7FF; color: #3730A3;',
                'deal' => 'background: #D1FAE5; color: #065F46;',
                'batal' => 'background: #FEE2E2; color: #991B1B;',
            ];
            $badgeStyle = $statusStyles[$lead->status ?? 'baru'] ?? $statusStyles['baru'];
        @endphp
        <article class="card" style="padding: 1.25rem; overflow-wrap: anywhere;">
            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: .75rem;">
                <div>
                    <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap; margin-bottom: 4px;">
                        <h2 style="font-size: 18px;">{{ $lead->brand }}</h2>
                        <span class="pill" style="{{ $badgeStyle }}">{{ $lead->status_label }}</span>
                    </div>
                    <p class="muted">{{ $lead->service }}@if($lead->plan) · Paket {{ $lead->plan }}@endif · {{ $lead->updated_at->timezone(config('app.timezone'))->format('d/m/Y H:i') }}</p>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                    <a class="btn btn-sm" href="{{ route('admin.documents.create', ['lead_id' => $lead->id]) }}">Buat Dokumen</a>
                    <a class="btn btn-primary btn-sm" href="https://wa.me/{{ $lead->phone }}" target="_blank" rel="noopener noreferrer">Hubungi +{{ $lead->phone }}</a>
                </div>
            </div>

            <details style="margin-top: .85rem;">
                <summary style="cursor: pointer; font-weight: 600; font-size: 14px; color: var(--primary);">Lihat rincian brief & catatan follow-up</summary>
                <div style="padding-top: 1rem; display: grid; gap: 1rem;">
                    <dl style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: .85rem;">
                        @foreach ([
                            'Paket' => $lead->plan,
                            'Fitur' => implode(', ', $lead->addons ?? []),
                            'Estimasi kalkulator' => $lead->estimate,
                            'Anggaran' => $lead->budget,
                            'Target peluncuran' => $lead->timeline,
                            'Tujuan proyek' => $lead->notes,
                        ] as $label => $value)
                            @if (filled($value))
                            <div><dt class="muted" style="font-size: 12px;"><strong>{{ $label }}</strong></dt><dd style="white-space: pre-wrap; font-size: 14px; margin-top: 2px;">{{ $value }}</dd></div>
                            @endif
                        @endforeach
                    </dl>

                    <form method="POST" action="{{ route('admin.leads.update', $lead) }}" style="padding-top: .85rem; border-top: 1px solid var(--light-gray); display: grid; gap: 10px;">
                        @csrf
                        @method('PATCH')
                        <div style="display: grid; grid-template-columns: minmax(180px, 240px) 1fr auto; gap: 10px; align-items: end;" class="lead-status-grid">
                            <div>
                                <label style="margin-bottom: 4px;">Status Follow-up</label>
                                <select name="status">
                                    @foreach($statuses as $key => $label)
                                        <option value="{{ $key }}" @selected(($lead->status ?? 'baru') === $key)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label style="margin-bottom: 4px;">Catatan Internal</label>
                                <input type="text" name="admin_notes" value="{{ $lead->admin_notes }}" placeholder="Catatan progres follow-up..." />
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </details>
        </article>
    @empty
        <div class="card">
            @include('admin.partials.empty-state', [
                'title' => array_filter($filters) ? 'Brief tidak ditemukan' : 'Belum ada brief yang masuk',
                'description' => array_filter($filters)
                    ? 'Coba ubah kata kunci pencarian atau reset filter untuk melihat semua data brief.'
                    : 'Brief dari kalkulator proyek di halaman utama akan otomatis tercatat di sini sebelum calon klien diarahkan ke WhatsApp.',
                'actionUrl' => array_filter($filters) ? route('admin.leads.index') : null,
                'actionLabel' => array_filter($filters) ? 'Reset Filter' : null,
            ])
        </div>
    @endforelse
    @if ($leads->hasPages())
        <nav aria-label="Halaman brief masuk" style="display: flex; flex-wrap: wrap; align-items: center; gap: 1rem;">
            @if ($leads->previousPageUrl()) <a href="{{ $leads->previousPageUrl() }}" class="btn btn-sm">Sebelumnya</a> @endif
            <span class="muted">Halaman {{ $leads->currentPage() }} dari {{ $leads->lastPage() }}</span>
            @if ($leads->nextPageUrl()) <a href="{{ $leads->nextPageUrl() }}" class="btn btn-sm">Berikutnya</a> @endif
        </nav>
    @endif
</div>

<style>
    @media (max-width: 768px) {
        .lead-status-grid {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endsection
