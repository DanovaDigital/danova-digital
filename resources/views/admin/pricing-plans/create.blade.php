@extends('admin.layout')

@section('title', 'Tambah Pricing — Admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h1>Tambah Pricing Plan</h1>
            <div class="muted">Buat paket pricing baru</div>
        </div>
        <a class="btn" href="{{ route('admin.pricing-plans.index') }}">Kembali</a>
    </div>

    @include('admin.partials.errors')

    <form method="POST" action="{{ route('admin.pricing-plans.store') }}">
        @csrf

        <div class="form-grid">
            <div class="field">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" />
            </div>

            <div class="field">
                <label>CTA Label</label>
                <input type="text" name="cta_label" value="{{ old('cta_label', 'Choose') }}" />
            </div>

            <div class="field">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" />
            </div>

            <div class="field">
                <label>Harga</label>
                <input type="text" name="price" value="{{ old('price') }}" />
            </div>
        </div>

        <div class="field">
            <label>Subtitle</label>
            <input type="text" name="subtitle" value="{{ old('subtitle') }}" />
        </div>

        <div class="field">
            <label>Features (1 baris = 1 item)</label>
            <textarea name="features_text">{{ old('features_text') }}</textarea>
        </div>

        <div class="form-grid">
            <div class="field">
                <label>CTA Package Name</label>
                <input type="text" name="cta_package_name" value="{{ old('cta_package_name') }}" />
                <div class="help">Dipakai untuk isi pesan WhatsApp (dataset).</div>
            </div>

            <div class="field">
                <label>CTA Package Price</label>
                <input type="text" name="cta_package_price" value="{{ old('cta_package_price') }}" />
                <div class="help">Dipakai untuk isi pesan WhatsApp (dataset).</div>
            </div>
        </div>

        <div class="field">
            <label class="checkbox">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} />
                Featured
            </label>
        </div>

        <div class="field">
            <label class="checkbox">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }} />
                Published
            </label>
        </div>

        <div class="row-actions">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a class="btn" href="{{ route('admin.pricing-plans.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection