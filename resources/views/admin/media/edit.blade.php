@extends('admin.layout')

@section('title', 'Edit Media — Admin')

@section('content')
<div class="card">
    <div class="header">
        <div>
            <h1>Edit Media</h1>
            <div class="muted">#{{ $medium->id }} · {{ $medium->original_name }}</div>
        </div>
        <a class="btn" href="{{ route('admin.media.index') }}">Kembali</a>
    </div>

    @include('admin.partials.errors')

    @php($url = $medium->disk === 'public' ? asset('storage/' . $medium->path) : null)
    @if ($url)
    <div style="margin-bottom: 12px;">
        <img src="{{ $url }}" alt="{{ $medium->alt_text }}" style="max-width: 320px; width: 100%; border-radius: 12px; border: 1px solid #E8E8E8;" />
    </div>
    @endif

    <form method="POST" action="{{ route('admin.media.update', $medium) }}">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="field">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title', $medium->title) }}" />
            </div>

            <div class="field">
                <label>Alt Text</label>
                <input type="text" name="alt_text" value="{{ old('alt_text', $medium->alt_text) }}" />
            </div>
        </div>

        <div class="row-actions">
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn" href="{{ route('admin.media.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection