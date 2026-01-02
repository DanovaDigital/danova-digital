@extends('admin.layout')

@section('title', 'Tambah Project — Admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h1>Tambah Project</h1>
            <div class="muted">Data untuk kartu Work dan halaman detail</div>
        </div>
        <a class="btn" href="{{ route('admin.projects.index') }}">Kembali</a>
    </div>

    @include('admin.partials.errors')

    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-grid">
            <div class="field">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" />
            </div>

            <div class="field">
                <label>Slug</label>
                <input type="text" name="slug" value="{{ old('slug') }}" />
                <div class="help">Contoh: ecommerce-brand-redesign</div>
            </div>

            <div class="field">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}" />
            </div>

            <div class="field">
                <label>Subtitle</label>
                <input type="text" name="subtitle" value="{{ old('subtitle') }}" />
            </div>

            <div class="field">
                <label>Client</label>
                <input type="text" name="client" value="{{ old('client') }}" />
            </div>

            <div class="field">
                <label>Industry</label>
                <input type="text" name="industry" value="{{ old('industry') }}" />
            </div>

            <div class="field">
                <label>Year</label>
                <input type="text" name="year" value="{{ old('year') }}" />
            </div>

            <div class="field">
                <label>Duration</label>
                <input type="text" name="duration" value="{{ old('duration') }}" />
            </div>
        </div>

        <div class="field">
            <label>Hero Image</label>
            <div class="upload-zone" id="heroImageZone">
                <input type="file" name="hero_image" id="heroImageInput" accept="image/*" style="display: none;" />
                <div class="upload-placeholder">
                    <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <div class="upload-text">
                        <strong>Click to upload</strong> or drag and drop
                    </div>
                    <div class="upload-hint">PNG, JPG, GIF up to 10MB</div>
                </div>
                <div class="upload-preview" style="display: none;">
                    <img src="" alt="Preview" />
                    <button type="button" class="upload-remove">×</button>
                </div>
            </div>
            <div class="help">Gambar untuk kartu Work showcase. Ukuran rekomendasi: 1200x800px</div>
        </div>

        <div class="field">
            <label>Hero Image URL</label>
            <input type="text" name="hero_image_url" value="{{ old('hero_image_url') }}" />
            <div class="help">Fallback jika tidak upload gambar. URL eksternal (contoh: https://...)</div>
        </div>

        <div class="field">
            <label>Challenge</label>
            <textarea name="challenge">{{ old('challenge') }}</textarea>
        </div>

        <div class="field">
            <label>Solution</label>
            <textarea name="solution">{{ old('solution') }}</textarea>
        </div>

        <div class="form-grid">
            <div class="field">
                <label>Results JSON</label>
                <textarea name="results_json">{{ old('results_json') }}</textarea>
                <div class="help">Format: [{"metric":"78% → 42%","label":"Bounce Rate"}]</div>
            </div>

            <div class="field">
                <label>Features JSON</label>
                <textarea name="features_json">{{ old('features_json') }}</textarea>
                <div class="help">Format: ["Feature 1","Feature 2"]</div>
            </div>

            <div class="field">
                <label>Tech JSON</label>
                <textarea name="tech_json">{{ old('tech_json') }}</textarea>
                <div class="help">Format: ["Laravel","Tailwind"]</div>
            </div>

            <div class="field">
                <label>Testimonial JSON</label>
                <textarea name="testimonial_json">{{ old('testimonial_json') }}</textarea>
                <div class="help">Format: {"text":"...","author":"...","role":"..."}</div>
            </div>
        </div>

        <div class="field">
            <label class="checkbox">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }} />
                Published
            </label>
        </div>

        <div class="row-actions">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a class="btn" href="{{ route('admin.projects.index') }}">Batal</a>
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
        min-height: 200px;
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
        max-width: 300px;
        margin: 0 auto;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .upload-preview img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
    }

    .upload-remove {
        position: absolute;
        top: 12px;
        right: 12px;
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
        const zone = document.getElementById('heroImageZone');
        const input = document.getElementById('heroImageInput');
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

<div class="field">
    <label>Challenge</label>
    <textarea name="challenge">{{ old('challenge') }}</textarea>
</div>

<div class="field">
    <label>Solution</label>
    <textarea name="solution">{{ old('solution') }}</textarea>
</div>

<div class="form-grid">
    <div class="field">
        <label>Results JSON</label>
        <textarea name="results_json">{{ old('results_json') }}</textarea>
        <div class="help">Format: [{"metric":"78% → 42%","label":"Bounce Rate"}]</div>
    </div>

    <div class="field">
        <label>Features JSON</label>
        <textarea name="features_json">{{ old('features_json') }}</textarea>
        <div class="help">Format: ["Feature 1","Feature 2"]</div>
    </div>

    <div class="field">
        <label>Tech JSON</label>
        <textarea name="tech_json">{{ old('tech_json') }}</textarea>
        <div class="help">Format: ["Laravel","Tailwind"]</div>
    </div>

    <div class="field">
        <label>Testimonial JSON</label>
        <textarea name="testimonial_json">{{ old('testimonial_json') }}</textarea>
        <div class="help">Format: {"text":"...","author":"...","role":"..."}</div>
    </div>
</div>

<div class="field">
    <label class="checkbox">
        <input type="checkbox" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }} />
        Published
    </label>
</div>

<div class="row-actions">
    <button class="btn btn-primary" type="submit">Simpan</button>
    <a class="btn" href="{{ route('admin.projects.index') }}">Batal</a>
</div>
</form>
</div>
@endsection