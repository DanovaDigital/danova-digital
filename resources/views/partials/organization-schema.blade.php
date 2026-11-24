@php
    $siteUrl = route('landing');
    $organization = [
        '@type' => 'Organization',
        '@id' => $siteUrl . '#organization',
        'name' => 'Danova Digital',
        'url' => $siteUrl,
        'logo' => asset('images/DanovaFavicon.png'),
    ];
    if (!empty($organizationEmail)) {
        $organization['email'] = $organizationEmail;
    }
    $schema = [
        '@context' => 'https://schema.org',
        '@graph' => [
            $organization,
            [
                '@type' => 'WebSite',
                '@id' => $siteUrl . '#website',
                'name' => 'Danova Digital',
                'url' => $siteUrl,
                'publisher' => ['@id' => $organization['@id']],
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($schema, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
