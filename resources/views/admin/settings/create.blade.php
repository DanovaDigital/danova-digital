@extends('admin.layout')

@section('title', 'Tambah Setting — Admin')

@section('content')
<div class="card">
    <div class="header">
        <div>
            <h1>Tambah Setting</h1>
            <div class="muted">Key-value untuk landing page</div>
        </div>
        <a class="btn" href="{{ route('admin.settings.index') }}">Kembali</a>
    </div>

    @include('admin.partials.errors')

    <form method="POST" action="{{ route('admin.settings.store') }}">
        @csrf

        <div class="form-grid">
            <div class="field">
                <label>Group</label>
                <input type="text" name="group" value="{{ old('group', 'contact') }}" />
            </div>

            <div class="field">
                <label>Type</label>
                <select name="type">
                    @php($type = old('type', 'string'))
                    <option value="string" {{ $type === 'string' ? 'selected' : '' }}>string</option>
                    <option value="number" {{ $type === 'number' ? 'selected' : '' }}>number</option>
                    <option value="json" {{ $type === 'json' ? 'selected' : '' }}>json</option>
                </select>
            </div>
        </div>

        <div class="field">
            <label>Key</label>
            <input type="text" name="key" value="{{ old('key') }}" />
        </div>

        <div class="field">
            <label>Value</label>
            <textarea name="value">{{ old('value') }}</textarea>
        </div>

        <div class="row-actions">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a class="btn" href="{{ route('admin.settings.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection