@php($defaultLogo = asset('images/DanovaBlue.png'))
<img
    class="danova-logo"
    src="{{ $customLogo ? asset('storage/' . $customLogo) : $defaultLogo }}"
    alt="Danova Digital"
    @if ($customLogo)
        data-fallback="{{ $defaultLogo }}"
        onerror="this.onerror = null; this.src = this.dataset.fallback;"
    @else
        width="2816" height="569"
    @endif
>
