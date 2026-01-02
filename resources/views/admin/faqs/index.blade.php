@extends('admin.layout')

@section('title', 'FAQ — Admin')

@section('header-title', 'FAQ')
@section('header-subtitle', 'Kelola frequently asked questions')

@section('header-actions')
<a class="btn btn-primary" href="{{ route('admin.faqs.create') }}">
    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
    Tambah FAQ
</a>
@endsection

@section('content')
<div class="card">
    <table>
        <thead>
            <tr>
                <th>Order</th>
                <th>Question</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($faqs as $faq)
            <tr>
                <td>{{ $faq->sort_order }}</td>
                <td>
                    <div style="font-weight: 700;">{{ $faq->question }}</div>
                    <div class="muted" style="font-size: 12px;">{{ \Illuminate\Support\Str::limit($faq->answer, 140) }}</div>
                </td>
                <td>
                    @if ($faq->is_published)
                    <span class="pill" style="background: rgba(34, 197, 94, 0.1); color: #15803d;">Published</span>
                    @else
                    <span class="pill" style="background: rgba(107,107,107,0.1); color: #2A2A2A;">Draft</span>
                    @endif
                </td>
                <td>
                    <div class="row-actions" style="justify-content: flex-end;">
                        <a class="btn btn-sm" href="{{ route('admin.faqs.edit', $faq) }}" title="Edit">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </a>
                        <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" onsubmit="return confirm('Hapus FAQ ini?')" style="display: inline;">
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
                <td colspan="4" class="muted" style="text-align: center; padding: 40px 24px;">
                    <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin: 0 auto 12px; opacity: 0.3;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div style="font-weight: 500;">Belum ada FAQ</div>
                    <div style="font-size: 12px; margin-top: 4px;">Klik tombol "Tambah FAQ" untuk membuat yang pertama</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection