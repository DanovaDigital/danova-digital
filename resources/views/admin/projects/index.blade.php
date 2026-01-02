@extends('admin.layout')

@section('title', 'Work — Admin')

@section('header-title', 'Projects')
@section('header-subtitle', 'Kelola portfolio project Anda')

@section('header-actions')
<a class="btn btn-primary" href="{{ route('admin.projects.create') }}">
    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
    Tambah Project
</a>
@endsection

@section('content')
<div class="card">
    <table>
        <thead>
            <tr>
                <th>Order</th>
                <th>Slug</th>
                <th>Title</th>
                <th>Hero</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <td>{{ $project->sort_order }}</td>
                <td><span class="pill">{{ $project->slug }}</span></td>
                <td>
                    <div style="font-weight: 700;">{{ $project->title }}</div>
                    <div class="muted" style="font-size: 12px;">{{ $project->subtitle }}</div>
                </td>
                <td>
                    @if ($project->hero_media_id)
                    <span class="pill">Media</span>
                    @elseif ($project->hero_image_url)
                    <span class="pill" style="background: rgba(107,107,107,0.1); color: #2A2A2A;">URL</span>
                    @else
                    <span class="muted">—</span>
                    @endif
                </td>
                <td>
                    @if ($project->is_published)
                    <span class="pill" style="background: rgba(34, 197, 94, 0.1); color: #15803d;">Published</span>
                    @else
                    <span class="pill" style="background: rgba(107,107,107,0.1); color: #2A2A2A;">Draft</span>
                    @endif
                </td>
                <td>
                    <div class="row-actions" style="justify-content: flex-end;">
                        <a class="btn btn-sm" href="{{ route('work.detail', $project->slug) }}" target="_blank" rel="noreferrer noopener" title="Preview">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </a>
                        <a class="btn btn-sm" href="{{ route('admin.projects.edit', $project) }}" title="Edit">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Hapus project ini?')" style="display: inline;">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <div style="font-weight: 500;">Belum ada project</div>
                    <div style="font-size: 12px; margin-top: 4px;">Klik tombol "Tambah Project" untuk membuat yang pertama</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection