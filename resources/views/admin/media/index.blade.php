@extends('admin.layout')

@section('title', 'Media — Admin')

@section('header-title', 'Media')
@section('header-subtitle', 'Kelola file dan gambar untuk landing page')

@section('header-actions')
<a class="btn btn-primary" href="{{ route('admin.media.create') }}">
    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
    </svg>
    Upload Media
</a>
@endsection

@section('content')
<div class="card">
    <div style="background: rgba(245, 158, 11, 0.05); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 8px; padding: 16px 20px; margin-bottom: 0;">
        <div style="font-weight: 600; font-size: 13px; margin-bottom: 6px; color: #d97706;">⚠️ Catatan Penting</div>
        <div class="muted" style="font-size: 13px;">
            Untuk preview file lokal, pastikan sudah menjalankan <code style="background: var(--white); padding: 2px 8px; border-radius: 4px; font-family: monospace; font-size: 12px;">php artisan storage:link</code>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Preview</th>
                <th>Path</th>
                <th>Meta</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($media as $m)
            <tr>
                <td style="font-weight: 600; color: var(--primary);">{{ $m->id }}</td>
                <td>
                    @php($url = $m->disk === 'public' ? asset('storage/' . $m->path) : null)
                    @if ($url)
                    <a href="{{ $url }}" target="_blank" rel="noreferrer noopener">
                        <img src="{{ $url }}" alt="{{ $m->alt_text }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 1px solid var(--light-gray);" />
                    </a>
                    @else
                    <span class="muted">(no preview)</span>
                    @endif
                </td>
                <td class="muted" style="font-size: 13px;">
                    <div style="margin-bottom: 4px;"><span class="pill">{{ $m->disk }}</span></div>
                    <div style="font-family: monospace; font-size: 11px;">{{ $m->path }}</div>
                </td>
                <td class="muted" style="font-size: 12px;">
                    <div style="font-weight: 600; color: var(--dark-gray); margin-bottom: 4px;">{{ $m->original_name }}</div>
                    <div>{{ $m->mime_type }} · {{ number_format($m->size / 1024, 1) }} KB</div>
                    @if ($m->title)
                    <div style="margin-top: 4px;">Title: {{ $m->title }}</div>
                    @endif
                    @if ($m->alt_text)
                    <div>Alt: {{ $m->alt_text }}</div>
                    @endif
                </td>
                <td>
                    <div class="row-actions" style="justify-content: flex-end;">
                        <a class="btn btn-sm" href="{{ route('admin.media.edit', $m) }}">Edit</a>
                        <form method="POST" action="{{ route('admin.media.destroy', $m) }}" onsubmit="return confirm('Hapus file ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="muted" style="text-align: center; padding: 40px 24px;">
                    <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin: 0 auto 12px; opacity: 0.3;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <div style="font-weight: 500;">Belum ada file media</div>
                    <div style="font-size: 12px; margin-top: 4px;">Klik tombol "Upload Media" untuk menambahkan file pertama</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection