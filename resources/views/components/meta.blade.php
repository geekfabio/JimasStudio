@php
    $title = $title ?? 'JIMAS Studio & Media — Tabela de Preços e Produção Audiovisual 2026';
    $description = $description ?? 'Tabela de preços 2026 do JIMAS Studio & Media em Luanda, Angola. Serviços profissionais de produção de podcasts, gravação de conteúdos, sessões fotográficas, cobertura de eventos sociais e casamentos.';
    $canonical = $canonical ?? config('app.url');
    $logo = asset('images/logo.png');

    $structuredData = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'JIMAS Studio & Media',
        'image' => $logo,
        '@id' => $canonical . '#website',
        'url' => $canonical,
        'telephone' => '+244972465386',
        'priceRange' => '15000Kz - 2000000Kz',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Luanda, Angola',
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
            'https://www.instagram.com/jimas_lda/',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}" />
<meta name="keywords" content="JIMAS Studio, Jimas Studio & Media, podcast Luanda, gravação de podcast Angola, produção audiovisual Luanda, fotografia de casamento Angola, cobertura de eventos Luanda, sessão fotográfica maternidade, fotografia corporativa Luanda, estúdio de gravação Angola" />
<meta name="robots" content="index, follow" />
<meta name="author" content="JIMAS Studio & Media" />
<link rel="canonical" href="{{ $canonical }}" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ $canonical }}" />
<meta property="og:title" content="JIMAS Studio & Media — Produção Audiovisual e Fotografia em Luanda" />
<meta property="og:description" content="{{ $description }}" />
<meta property="og:image" content="{{ $logo }}" />
<meta property="og:locale" content="pt_AO" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="{{ $canonical }}" />
<meta property="twitter:title" content="JIMAS Studio & Media — Produção Audiovisual e Fotografia" />
<meta property="twitter:description" content="{{ $description }}" />
<meta property="twitter:image" content="{{ $logo }}" />

<!-- Structured Data (JSON-LD) -->
<script type="application/ld+json">
{!! $structuredData !!}
</script>
