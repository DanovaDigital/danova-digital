@extends('admin.layout')

@section('title', 'Pricing — Admin')

@section('header-title', 'Pricing Plans')
@section('header-subtitle', 'Kelola paket harga layanan Anda')

@section('header-actions')
<a class="btn btn-primary" href="{{ route('admin.pricing-plans.create') }}">
    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
    Tambah Pricing
</a>
@endsection

@section('content')
<div class="card">
    <table>
        <thead>
            <tr>
                <th>Order</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($plans as $plan)
            <tr>
                <td>{{ $plan->sort_order }}</td>
                <td>
                    <div style="font-weight: 700;">{{ $plan->name }}</div>
                    @if ($plan->is_featured)
                    <span class="pill" style="margin-top: 4px;">Featured</span>
                    @endif
                </td>
                <td>{{ $plan->price }}</td>
                <td>
                    @if ($plan->is_published)
                    <span class="pill" style="background: rgba(34, 197, 94, 0.1); color: #15803d;">Published</span>
                    @else
                    <span class="pill" style="background: rgba(107,107,107,0.1); color: #2A2A2A;">Draft</span>
                    @endif
                </td>
                <td>
                    <div class="row-actions" style="justify-content: flex-end;">
                        <a class="btn btn-sm" href="{{ route('admin.pricing-plans.edit', $plan) }}" title="Edit">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </a>
                        <form method="POST" action="{{ route('admin.pricing-plans.destroy', $plan) }}" onsubmit="return confirm('Hapus pricing plan ini?')" style="display: inline;">
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
                <td colspan="5" class="muted" style="text-align: center; padding: 40px 24px;">
                    <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin: 0 auto 12px; opacity: 0.3;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <div style="font-weight: 500;">Belum ada pricing plan</div>
                    <div style="font-size: 12px; margin-top: 4px;">Klik tombol "Tambah Pricing" untuk membuat yang pertama</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection