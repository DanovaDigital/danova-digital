@extends('admin.layout')

@section('title', 'Upload Media — Admin')

@section('content')
<div class="card">
    <div class="header">
        <div>
            <h1>Upload Media</h1>
            <div class="muted">Upload gambar (max 10MB)</div>
        </div>
        <a class="btn" href="{{ route('admin.media.index') }}">Kembali</a>
    </div>

    @include('admin.partials.errors')

    <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label>File</label>
            <input type="file" name="file" />
        </div>

        <div class="form-grid">
            <div class="field">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}" />
            </div>

            <div class="field">
                <label>Alt Text</label>
                <input type="text" name="alt_text" value="{{ old('alt_text') }}" />
            </div>
        </div>

        <div class="row-actions">
            <button class="btn btn-primary" type="submit">Upload</button>
            <a class="btn" href="{{ route('admin.media.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection