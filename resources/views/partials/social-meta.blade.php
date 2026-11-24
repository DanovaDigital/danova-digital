@php
    $previewImage = $socialImage ?: asset('images/DanovaFavicon.png');
@endphp
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Danova Digital" />
<meta property="og:title" content="{{ $socialTitle }}" />
<meta property="og:description" content="{{ $socialDescription }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ $previewImage }}" />
<meta property="og:locale" content="id_ID" />
<meta name="twitter:card" content="{{ $socialImage ? 'summary_large_image' : 'summary' }}" />
<meta name="twitter:title" content="{{ $socialTitle }}" />
<meta name="twitter:description" content="{{ $socialDescription }}" />
<meta name="twitter:image" content="{{ $previewImage }}" />
