@extends('admin.layout')

@section('title', 'Testimonials — Admin')

@section('header-title', 'Testimonials')
@section('header-subtitle', 'Kelola testimoni dari klien Anda')

@section('header-actions')
<a class="btn btn-primary" href="{{ route('admin.testimonials.create') }}">
    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
    Tambah Testimonial
</a>
@endsection

@section('content')
<div class="card">
    <table>
        <thead>
            <tr>
                <th>Order</th>
                <th>Nama</th>
                <th>Quote</th>
                <th>Avatar</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($testimonials as $t)
            <tr>
                <td>{{ $t->sort_order }}</td>
                <td>
                    <div style="font-weight: 700;">{{ $t->name }}</div>
                    <div class="muted" style="font-size: 12px;">{{ $t->title }}</div>
                    @if ($t->is_featured)
                    <span class="pill" style="margin-top: 4px;">Featured</span>
                    @endif
                </td>
                <td class="muted" style="font-size: 13px;">{{ \Illuminate\Support\Str::limit($t->quote, 120) }}</td>
                <td>
                    @if ($t->avatar_media_id)
                    <span class="pill">Media</span>
                    @elseif ($t->avatar_url)
                    <span class="pill" style="background: rgba(107,107,107,0.1); color: #2A2A2A;">URL</span>
                    @else
                    <span class="muted">—</span>
                    @endif
                </td>
                <td>
                    @if ($t->is_published)
                    <span class="pill" style="background: rgba(34, 197, 94, 0.1); color: #15803d;">Published</span>
                    @else
                    <span class="pill" style="background: rgba(107,107,107,0.1); color: #2A2A2A;">Draft</span>
                    @endif
                </td>
                <td>
                    <div class="row-actions" style="justify-content: flex-end;">
                        <a class="btn btn-sm" href="{{ route('admin.testimonials.edit', $t) }}" title="Edit">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </a>
                        <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Hapus testimonial ini?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" title="Hapus">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="muted" style="text-align: center; padding: 40px 24px;">
                    <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin: 0 auto 12px; opacity: 0.3;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <div style="font-weight: 500;">Belum ada testimonial</div>
                    <div style="font-size: 12px; margin-top: 4px;">Klik tombol "Tambah Testimonial" untuk membuat yang pertama</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection