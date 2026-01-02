@extends('admin.layout')

@section('title', 'Edit Setting — Admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h1>Edit Setting</h1>
            <div class="muted"><span class="pill">{{ $setting->key }}</span></div>
        </div>
        <a class="btn" href="{{ route('admin.settings.index') }}">Kembali</a>
    </div>

    @include('admin.partials.errors')

    <form method="POST" action="{{ route('admin.settings.update', $setting) }}">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="field">
                <label>Group</label>
                <input type="text" name="group" value="{{ old('group', $setting->group) }}" />
            </div>

            <div class="field">
                <label>Type</label>
                <select name="type">
                    @php($type = old('type', $setting->type))
                    <option value="string" {{ $type === 'string' ? 'selected' : '' }}>string</option>
                    <option value="number" {{ $type === 'number' ? 'selected' : '' }}>number</option>
                    <option value="json" {{ $type === 'json' ? 'selected' : '' }}>json</option>
                </select>
            </div>
        </div>

        <div class="field">
            <label>Key</label>
            <input type="text" name="key" value="{{ old('key', $setting->key) }}" />
        </div>

        <div class="field">
            <label>Value</label>
            <textarea name="value">{{ old('value', $setting->value) }}</textarea>
        </div>

        <div class="row-actions">
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn" href="{{ route('admin.settings.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection