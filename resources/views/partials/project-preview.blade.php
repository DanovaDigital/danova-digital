@if ($image)
    <img class="project-preview-image" src="{{ $image }}" alt="Tampilan {{ $title }}" loading="{{ $loading }}" decoding="async"
        onerror="this.hidden = true; this.nextElementSibling.hidden = false;">
@endif
<div class="project-preview-empty" @if ($image) hidden @endif>
    Pratinjau proyek belum tersedia
</div>
