@extends('admin.layout')

@section('title', 'Settings — Admin')

@section('header-title', 'Settings')
@section('header-subtitle', 'Kelola semua konten dinamis landing page')

@section('header-actions')
<button class="btn btn-primary" type="submit" form="settings-form">
    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
    </svg>
    Simpan Semua
</button>
@endsection

@section('content')
@php
$getValue = function($key, $default = '') use ($settings) {
return optional($settings->firstWhere('key', $key))->value ?? $default;
};
@endphp

<form id="settings-form" method="POST" action="{{ route('admin.settings.bulk-update') }}" enctype="multipart/form-data">
    @csrf

    <!-- Hero Stats Section -->
    <div class="card" style="margin-bottom: 24px;">
        <div style="padding: 24px; border-bottom: 1px solid var(--light-gray);">
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">📊 Hero Statistics</h3>
            <p class="muted" style="font-size: 13px;">Stats yang ditampilkan di hero section</p>
        </div>
        <div style="padding: 24px; display: grid; gap: 20px;">
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
                <div class="form-group">
                    <label>Projects</label>
                    <input type="text" name="settings[stats.projects]" value="{{ $getValue('stats.projects', '100+') }}" placeholder="100+" />
                </div>
                <div class="form-group">
                    <label>Average Rating</label>
                    <input type="text" name="settings[stats.rating]" value="{{ $getValue('stats.rating', '4.9') }}" placeholder="4.9" />
                </div>
                <div class="form-group">
                    <label>On-time Delivery</label>
                    <input type="text" name="settings[stats.on_time]" value="{{ $getValue('stats.on_time', '95%') }}" placeholder="95%" />
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Features Section -->
    <div class="card" style="margin-bottom: 24px;">
        <div style="padding: 24px; border-bottom: 1px solid var(--light-gray);">
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">✨ Hero Feature Boxes</h3>
            <p class="muted" style="font-size: 13px;">Dua feature box di hero visual</p>
        </div>
        <div style="padding: 24px; display: grid; gap: 20px;">
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                <div style="display: grid; gap: 12px;">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label>Feature 1 Title</label>
                        <input type="text" name="settings[hero.feature1_title]" value="{{ $getValue('hero.feature1_title', 'UI/UX Design') }}" placeholder="UI/UX Design" />
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label>Feature 1 Description</label>
                        <textarea name="settings[hero.feature1_description]" rows="2" placeholder="Interface yang clean, jelas, dan premium.">{{ $getValue('hero.feature1_description', 'Interface yang clean, jelas, dan premium.') }}</textarea>
                    </div>
                </div>
                <div style="display: grid; gap: 12px;">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label>Feature 2 Title</label>
                        <input type="text" name="settings[hero.feature2_title]" value="{{ $getValue('hero.feature2_title', 'Web Development') }}" placeholder="Web Development" />
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label>Feature 2 Description</label>
                        <textarea name="settings[hero.feature2_description]" rows="2" placeholder="Blade SSR + performa yang ringan.">{{ $getValue('hero.feature2_description', 'Blade SSR + performa yang ringan.') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Images Section -->
    <div class="card" style="margin-bottom: 24px;">
        <div style="padding: 24px; border-bottom: 1px solid var(--light-gray);">
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">🖼️ Images & Assets</h3>
            <p class="muted" style="font-size: 13px;">Upload images untuk hero, badge, dan branding</p>
        </div>
        <div style="padding: 24px; display: grid; gap: 24px;">
            <!-- Hero Main Image -->
            <div class="form-group" style="margin-bottom: 0;">
                <label>Hero Main Image</label>
                <small class="muted" style="font-size: 12px; display: block; margin-bottom: 8px;">Gambar utama card hero (recommended: portrait, min 800px)</small>

                <div class="upload-zone" id="heroMainImageZone">
                    <input type="file" name="hero_main_image" id="heroMainImageInput" accept="image/*" style="display: none;" />
                    <div class="upload-placeholder" @if($getValue('hero.main_image')) style="display: none;" @endif>
                        <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <div class="upload-text">
                            <strong>Click to upload</strong> or drag and drop
                        </div>
                        <div class="upload-hint">PNG, JPG up to 10MB</div>
                    </div>
                    <div class="upload-preview" @if($getValue('hero.main_image')) style="display: block;" @else style="display: none;" @endif>
                        <img src="@if($getValue('hero.main_image')){{ asset('storage/' . $getValue('hero.main_image')) }}@endif" alt="Preview" />
                        <button type="button" class="upload-remove">×</button>
                    </div>
                </div>
            </div>

            <!-- Hero Mobile Image -->
            <div class="form-group" style="margin-bottom: 0;">
                <label>Hero Mobile Image</label>
                <small class="muted" style="font-size: 12px; display: block; margin-bottom: 8px;">Gambar kecil mockup mobile di hero (recommended: portrait 9:16, min 600px)</small>

                <div class="upload-zone" id="heroMobileImageZone">
                    <input type="file" name="hero_mobile_image" id="heroMobileImageInput" accept="image/*" style="display: none;" />
                    <div class="upload-placeholder" @if($getValue('hero.mobile_image')) style="display: none;" @endif>
                        <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <div class="upload-text">
                            <strong>Click to upload</strong> or drag and drop
                        </div>
                        <div class="upload-hint">PNG, JPG up to 10MB</div>
                    </div>
                    <div class="upload-preview" @if($getValue('hero.mobile_image')) style="display: block;" @else style="display: none;" @endif>
                        <img src="@if($getValue('hero.mobile_image')){{ asset('storage/' . $getValue('hero.mobile_image')) }}@endif" alt="Preview" />
                        <button type="button" class="upload-remove">×</button>
                    </div>
                </div>
            </div>

            <!-- Hero Showcase Logo -->
            <div class="form-group" style="margin-bottom: 0;">
                <label>Hero Showcase Logo</label>
                <small class="muted" style="font-size: 12px; display: block; margin-bottom: 8px;">Logo besar di showcase card hero section (recommended: PNG/SVG, min 200x200px)</small>

                <div class="upload-zone" id="heroShowcaseLogoZone">
                    <input type="file" name="hero_showcase_logo" id="heroShowcaseLogoInput" accept="image/*" style="display: none;" />
                    <div class="upload-placeholder" @if($getValue('hero.showcase_logo')) style="display: none;" @endif>
                        <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <div class="upload-text">
                            <strong>Click to upload</strong> or drag and drop
                        </div>
                        <div class="upload-hint">PNG, JPG, SVG up to 10MB</div>
                    </div>
                    <div class="upload-preview" @if($getValue('hero.showcase_logo')) style="display: block;" @else style="display: none;" @endif>
                        <img src="@if($getValue('hero.showcase_logo')){{ asset('storage/' . $getValue('hero.showcase_logo')) }}@endif" alt="Preview" />
                        <button type="button" class="upload-remove">×</button>
                    </div>
                </div>
            </div>

            <!-- Badge Avatars -->
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: var(--dark-gray);">Hero Badge Avatars</label>
                <small class="muted" style="font-size: 12px; display: block; margin-bottom: 12px;">3 avatar untuk badge "200+ Premium Clients" (recommended: square, min 100x100px)</small>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
                    @foreach(['avatar1', 'avatar2', 'avatar3'] as $index => $key)
                    <div class="form-group" style="margin-bottom: 0;">
                        <label style="font-size: 12px;">Avatar {{ $index + 1 }}</label>
                        <div class="upload-zone upload-zone-small" id="badgeAvatar{{ $index + 1 }}Zone">
                            <input type="file" name="hero_badge_{{ $key }}" id="badgeAvatar{{ $index + 1 }}Input" accept="image/*" style="display: none;" />
                            <div class="upload-placeholder" @if($getValue("hero.badge_{$key}")) style="display: none;" @endif>
                                <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <div class="upload-text-small">
                                    <strong>Upload</strong>
                                </div>
                            </div>
                            <div class="upload-preview upload-preview-small" @if($getValue("hero.badge_{$key}")) style="display: block;" @else style="display: none;" @endif>
                                <img src="@if($getValue(" hero.badge_{$key}")){{ asset('storage/' . $getValue("hero.badge_{$key}")) }}@endif" alt="Avatar {{ $index + 1 }}" />
                                <button type="button" class="upload-remove">×</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Header Logo -->
            <div class="form-group" style="margin-bottom: 0;">
                <label>Header Logo (Optional)</label>
                <small class="muted" style="font-size: 12px; display: block; margin-bottom: 8px;">Logo untuk header navigation (default: huruf "D"). Recommended: PNG/SVG dengan background transparan, max height 40px</small>

                <div class="upload-zone" id="headerLogoZone">
                    <input type="file" name="branding_header_logo" id="headerLogoInput" accept="image/*" style="display: none;" />
                    <div class="upload-placeholder" @if($getValue('branding.header_logo')) style="display: none;" @endif>
                        <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <div class="upload-text">
                            <strong>Click to upload</strong> or drag and drop
                        </div>
                        <div class="upload-hint">PNG, SVG with transparent background</div>
                    </div>
                    <div class="upload-preview" @if($getValue('branding.header_logo')) style="display: block;" @else style="display: none;" @endif>
                        <img src="@if($getValue('branding.header_logo')){{ asset('storage/' . $getValue('branding.header_logo')) }}@endif" alt="Preview" />
                        <button type="button" class="upload-remove">×</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact CTA Section -->
    <div class="card" style="margin-bottom: 24px;">
        <div style="padding: 24px; border-bottom: 1px solid var(--light-gray);">
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">💬 Contact CTA Buttons</h3>
            <p class="muted" style="font-size: 13px;">Label tombol WhatsApp dan Email di contact section</p>
        </div>
        <div style="padding: 24px; display: grid; gap: 20px;">
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
                <div class="form-group">
                    <label>WhatsApp Button Label</label>
                    <input type="text" name="settings[contact.whatsapp_label]" value="{{ $getValue('contact.whatsapp_label', 'WhatsApp Kami') }}" placeholder="WhatsApp Kami" />
                </div>
                <div class="form-group">
                    <label>Email Button Label</label>
                    <input type="text" name="settings[contact.email_label]" value="{{ $getValue('contact.email_label', 'Email Danova') }}" placeholder="Email Danova" />
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>WhatsApp Number</label>
                <input type="text" name="settings[contact.whatsapp]" value="{{ $getValue('contact.whatsapp', '6281234567890') }}" placeholder="6281234567890" />
                <small class="muted" style="font-size: 12px; display: block; margin-top: 4px;">Format: 62xxx (tanpa tanda +)</small>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>WhatsApp Prefill Message</label>
                <textarea name="settings[contact.whatsapp_prefill]" rows="2" placeholder="Hi Danova, saya tertarik diskusi project website.">{{ $getValue('contact.whatsapp_prefill', 'Hi Danova, saya tertarik diskusi project website.') }}</textarea>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Email Address</label>
                <input type="email" name="settings[contact.email]" value="{{ $getValue('contact.email', 'danovaagency@gmail.com') }}" placeholder="danovaagency@gmail.com" />
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Email Subject</label>
                <input type="text" name="settings[contact.email_subject]" value="{{ $getValue('contact.email_subject', 'Project Inquiry — Danova') }}" placeholder="Project Inquiry — Danova" />
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Email Body Template</label>
                <textarea name="settings[contact.email_body]" rows="5" placeholder="Hi Danova Team,...">{{ $getValue('contact.email_body', "Hi Danova Team,\n\nNama:\nBrand/Usaha:\nWebsite/Sosmed:\nLayanan yang dibutuhkan: (Website / Landing Page / Brand System)\nBudget range:\nTimeline:\nTujuan:\n\nThanks,") }}</textarea>
            </div>
        </div>
    </div>

    <!-- Advanced Settings -->
    <div class="card">
        <div style="padding: 24px; border-bottom: 1px solid var(--light-gray); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">⚙️ Advanced Settings</h3>
                <p class="muted" style="font-size: 13px;">Manage custom key-value pairs</p>
            </div>
            <a class="btn btn-sm" href="{{ route('admin.settings.create') }}">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Custom Setting
            </a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Group</th>
                    <th>Key</th>
                    <th>Value</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                $excludedKeys = ['stats.projects', 'stats.rating', 'stats.on_time', 'hero.feature1_title', 'hero.feature1_description', 'hero.feature2_title', 'hero.feature2_description', 'hero.main_image', 'hero.mobile_image', 'hero.showcase_logo', 'hero.badge_avatar1', 'hero.badge_avatar2', 'hero.badge_avatar3', 'branding.header_logo', 'contact.whatsapp_label', 'contact.email_label', 'contact.whatsapp', 'contact.whatsapp_prefill', 'contact.email', 'contact.email_subject', 'contact.email_body'];
                $customSettings = $settings->whereNotIn('key', $excludedKeys);
                @endphp
                @forelse ($customSettings as $s)
                <tr>
                    <td>{{ $s->group }}</td>
                    <td><span class="pill">{{ $s->key }}</span></td>
                    <td class="muted" style="font-size: 13px;">{{ \Illuminate\Support\Str::limit((string) $s->value, 80) }}</td>
                    <td>
                        <div class="row-actions" style="justify-content: flex-end;">
                            <a class="btn btn-sm" href="{{ route('admin.settings.edit', $s) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.settings.destroy', $s) }}" onsubmit="return confirm('Hapus setting ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="muted" style="text-align: center; padding: 32px 24px; font-size: 13px;">
                        Tidak ada custom settings. Klik "Add Custom Setting" untuk menambahkan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</form>

<style>
    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 6px;
        color: var(--dark-gray);
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid var(--light-gray);
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        transition: border-color 0.2s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary);
    }

    .form-group textarea {
        resize: vertical;
        font-family: inherit;
        line-height: 1.5;
    }

    /* Upload Zone Styles */
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

    .upload-zone.upload-zone-small {
        min-height: 120px;
        padding: 1rem;
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

    .upload-text-small {
        font-size: 14px;
        color: #1f2937;
        margin: 0;
    }

    .upload-text strong,
    .upload-text-small strong {
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

    .upload-preview.upload-preview-small {
        max-width: 120px;
    }

    .upload-preview img {
        width: 100%;
        height: 180px;
        object-fit: contain;
        display: block;
        background: #f9fafb;
    }

    .upload-preview-small img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #ffffff;
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
        // Initialize upload zones
        const uploadZones = [{
                zoneId: 'heroMainImageZone',
                inputId: 'heroMainImageInput'
            },
            {
                zoneId: 'heroMobileImageZone',
                inputId: 'heroMobileImageInput'
            },
            {
                zoneId: 'heroShowcaseLogoZone',
                inputId: 'heroShowcaseLogoInput'
            },
            {
                zoneId: 'badgeAvatar1Zone',
                inputId: 'badgeAvatar1Input'
            },
            {
                zoneId: 'badgeAvatar2Zone',
                inputId: 'badgeAvatar2Input'
            },
            {
                zoneId: 'badgeAvatar3Zone',
                inputId: 'badgeAvatar3Input'
            },
            {
                zoneId: 'headerLogoZone',
                inputId: 'headerLogoInput'
            }
        ];

        uploadZones.forEach(config => {
            const zone = document.getElementById(config.zoneId);
            const input = document.getElementById(config.inputId);

            if (!zone || !input) return;

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
            if (removeBtn) {
                removeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    input.value = '';
                    placeholder.style.display = 'flex';
                    preview.style.display = 'none';
                    previewImg.src = '';
                });
            }

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
    });
</script>
@endsection