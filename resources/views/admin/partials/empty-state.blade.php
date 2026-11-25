<div class="empty-state">
    <div class="empty-state-icon" aria-hidden="true">
        @if(!empty($icon))
            {!! $icon !!}
        @else
            <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
        @endif
    </div>
    <h3 class="empty-state-title">{{ $title ?? 'Belum ada data' }}</h3>
    @if(!empty($description))
        <p class="empty-state-desc">{{ $description }}</p>
    @endif
    @if(!empty($actionUrl) && !empty($actionLabel))
        <a href="{{ $actionUrl }}" class="btn btn-primary btn-sm" style="margin-top: 16px;">{{ $actionLabel }}</a>
    @endif
</div>
