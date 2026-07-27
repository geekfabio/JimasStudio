@php
    $title = $title ?? setting('seo_title', 'JIMAS Studio & Media — Tabela de Preços e Produção Audiovisual 2026');
    $description = $description ?? setting('seo_description', 'JIMAS Studio & Media em Luanda, Angola. Marketing, comunicação e produção audiovisual para marcas que querem crescer.');
    $canonical = $canonical ?? config('app.url');
    $logoPath = setting('seo_image') ?: setting('site_logo');
    $logo = $logoPath ? asset('storage/'.$logoPath) : asset('images/logo.png');

    $structuredData = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'JIMAS Studio & Media',
        'image' => $logo,
        '@id' => $canonical . '#website',
        'url' => $canonical,
        'telephone' => setting('site_phone', '+244972465386'),
        'priceRange' => '15000Kz - 2000000Kz',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => setting('site_address', 'Luanda, Angola'),
            'addressLocality' => 'Luanda',
            'addressCountry' => 'AO',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => '-8.83833',
            'longitude' => '13.23444',
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
            ],
            'opens' => '08:00',
            'closes' => '18:00',
        ],
        'sameAs' => [
            setting('instagram_url', 'https://www.instagram.com/jimas_lda/'),
            setting('facebook_url'), setting('linkedin_url'), setting('tiktok_url'),
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}" />
<meta name="keywords" content="{{ setting('seo_keywords', 'marketing Angola, comunicação Luanda, produção audiovisual Luanda, JIMAS Studio') }}" />
<meta name="robots" content="index, follow" />
<meta name="author" content="JIMAS Studio & Media" />
<link rel="canonical" href="{{ $canonical }}" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ $canonical }}" />
<meta property="og:title" content="{{ $title }}" />
<meta property="og:description" content="{{ $description }}" />
<meta property="og:image" content="{{ $logo }}" />
<meta property="og:locale" content="pt_AO" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="{{ $canonical }}" />
<meta property="twitter:title" content="{{ $title }}" />
<meta property="twitter:description" content="{{ $description }}" />
<meta property="twitter:image" content="{{ $logo }}" />

<!-- Structured Data (JSON-LD) -->
<script type="application/ld+json">
{!! $structuredData !!}
</script>
