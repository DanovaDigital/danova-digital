@extends('admin.layout')

@section('title', 'Edit Testimonial — Admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h1>Edit Testimonial</h1>
            <div class="muted">{{ $testimonial->name }}</div>
        </div>
        <a class="btn" href="{{ route('admin.testimonials.index') }}">Kembali</a>
    </div>

    @include('admin.partials.errors')

    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="field">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" />
            </div>

            <div class="field">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" />
            </div>

            <div class="field">
                <label>Title (Role/Company)</label>
                <input type="text" name="title" value="{{ old('title', $testimonial->title) }}" />
            </div>
        </div>

        @php
        $existingImage = $testimonial->avatar_image ? asset('storage/' . $testimonial->avatar_image) : null;
        @endphp

        <div class="field">
            <label>Avatar Image</label>
            <div class="upload-zone" id="avatarImageZone">
                <input type="file" name="avatar_image" id="avatarImageInput" accept="image/*" style="display: none;" />
                <div class="upload-placeholder" style="{{ $existingImage ? 'display: none;' : '' }}">
                    <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <div class="upload-text">
                        <strong>Click to upload</strong> or drag and drop
                    </div>
                    <div class="upload-hint">PNG, JPG up to 5MB (Square image recommended)</div>
                </div>
                <div class="upload-preview" style="{{ $existingImage ? '' : 'display: none;' }}">
                    <img src="{{ $existingImage }}" alt="Preview" />
                    <button type="button" class="upload-remove">×</button>
                </div>
            </div>
            <div class="help">Avatar foto untuk testimonial card. Ukuran rekomendasi: 200x200px. Upload baru akan replace yang lama.</div>
        </div>

        <div class="field">
            <label>Avatar URL</label>
            <input type="text" name="avatar_url" value="{{ old('avatar_url', $testimonial->avatar_url) }}" />
            <div class="help">Fallback jika tidak upload gambar. URL eksternal (contoh: https://...)</div>
        </div>

        <div class="field">
            <label>Quote</label>
            <textarea name="quote">{{ old('quote', $testimonial->quote) }}</textarea>
        </div>

        <div class="field">
            <label class="checkbox">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }} />
                Featured
            </label>
        </div>

        <div class="field">
            <label class="checkbox">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $testimonial->is_published) ? 'checked' : '' }} />
                Published
            </label>
        </div>

        <div class="row-actions">
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn" href="{{ route('admin.testimonials.index') }}">Batal</a>
        </div>
    </form>
</div>

<style>
    .upload-zone {
        border: 2px dashed #e5e7eb;
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #ffffff;
        position: relative;
        min-height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .upload-zone:hover {
        border-color: #2563eb;
        background: #f0f4ff;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.08);
    }

    .upload-zone.dragover {
        border-color: #2563eb;
        background: #e0edff;
        transform: scale(1.02);
        box-shadow: 0 8px 30px rgba(37, 99, 235, 0.15);
    }

    .upload-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        width: 100%;
    }

    .upload-placeholder svg {
        color: #6b7280;
        opacity: 0.6;
        transition: all 0.3s ease;
    }

    .upload-zone:hover .upload-placeholder svg {
        color: #2563eb;
        opacity: 0.8;
        transform: translateY(-2px);
    }

    .upload-text {
        font-size: 16px;
        color: #1f2937;
        margin: 0;
    }

    .upload-text strong {
        color: #2563eb;
        font-weight: 600;
    }

    .upload-hint {
        font-size: 14px;
        color: #6b7280;
        margin-top: 0.25rem;
    }

    .upload-preview {
        position: relative;
        max-width: 200px;
        margin: 0 auto;
    }

    .upload-preview img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        display: block;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border: 4px solid #ffffff;
    }

    .upload-remove {
        position: absolute;
        top: 8px;
        right: 8px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(239, 68, 68, 0.9);
        color: white;
        border: none;
        font-size: 20px;
        font-weight: bold;
        line-height: 1;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        backdrop-filter: blur(8px);
    }

    .upload-remove:hover {
        background: #dc2626;
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const zone = document.getElementById('avatarImageZone');
        const input = document.getElementById('avatarImageInput');
        const placeholder = zone.querySelector('.upload-placeholder');
        const preview = zone.querySelector('.upload-preview');
        const removeBtn = zone.querySelector('.upload-remove');
        const previewImg = preview.querySelector('img');

        // Click to upload
        zone.addEventListener('click', function(e) {
            if (e.target !== removeBtn && !removeBtn.contains(e.target)) {
                input.click();
            }
        });

        // File input change
        input.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                showPreview(this.files[0]);
            }
        });

        // Drag and drop
        zone.addEventListener('dragover', function(e) {
            e.preventDefault();
            zone.classList.add('dragover');
        });

        zone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            zone.classList.remove('dragover');
        });

        zone.addEventListener('drop', function(e) {
            e.preventDefault();
            zone.classList.remove('dragover');

            const files = e.dataTransfer.files;
            if (files.length > 0 && files[0].type.startsWith('image/')) {
                input.files = files;
                showPreview(files[0]);
            }
        });

        // Remove image
        removeBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            input.value = '';
            placeholder.style.display = 'flex';
            preview.style.display = 'none';
            previewImg.src = '';
        });

        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                placeholder.style.display = 'none';
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection