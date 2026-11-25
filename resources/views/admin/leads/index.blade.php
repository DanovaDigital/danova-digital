@extends('admin.layout')

@section('title', 'Brief masuk · Admin Danova')
@section('header-title', 'Brief masuk')
@section('header-subtitle', 'Tinjau kebutuhan calon klien dan lanjutkan percakapan di WhatsApp.')

@section('content')
<div style="display: grid; gap: 1rem;">
    @forelse ($leads as $lead)
        <article class="card" style="padding: 1.25rem; overflow-wrap: anywhere;">
            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: .75rem;">
                <div>
                    <h2>{{ $lead->brand }}</h2>
                    <p>{{ $lead->service }} · {{ $lead->updated_at->timezone(config('app.timezone'))->format('d/m/Y H:i') }}</p>
                </div>
                <a class="btn btn-primary" href="https://wa.me/{{ $lead->phone }}" target="_blank" rel="noopener noreferrer">Hubungi +{{ $lead->phone }}</a>
            </div>
            <details style="margin-top: .85rem;">
                <summary>Lihat rincian brief</summary>
                <dl style="display: grid; gap: .7rem; padding-top: .75rem;">
                    @foreach ([
                        'Paket' => $lead->plan,
                        'Fitur' => implode(', ', $lead->addons),
                        'Estimasi kalkulator' => $lead->estimate,
                        'Anggaran' => $lead->budget,
                        'Target peluncuran' => $lead->timeline,
                        'Tujuan proyek' => $lead->notes,
                    ] as $label => $value)
                        @if (filled($value))
                        <div><dt><strong>{{ $label }}</strong></dt><dd style="white-space: pre-wrap;">{{ $value }}</dd></div>
                        @endif
                    @endforeach
                </dl>
            </details>
        </article>
    @empty
        <div class="card">
            @include('admin.partials.empty-state', [
                'title' => 'Belum ada brief yang masuk',
                'description' => 'Brief dari kalkulator proyek di halaman utama akan otomatis tercatat di sini sebelum calon klien diarahkan ke WhatsApp.',
            ])
        </div>
    @endforelse
    @if ($leads->hasPages())
        <nav aria-label="Halaman brief masuk" style="display: flex; flex-wrap: wrap; gap: 1rem;">
            @if ($leads->previousPageUrl()) <a href="{{ $leads->previousPageUrl() }}">Sebelumnya</a> @endif
            <span>Halaman {{ $leads->currentPage() }} dari {{ $leads->lastPage() }}</span>
            @if ($leads->nextPageUrl()) <a href="{{ $leads->nextPageUrl() }}">Berikutnya</a> @endif
        </nav>
    @endif
</div>
@endsection
