<head>
    <?php
    $pageTitle = trim(strip_tags(yield_content('title')));
    $appName = Helper::setting('app-name') ?: 'SISTEM COMPANY PROFILE';
    $defaultDescription = 'Sistem company profile untuk mengelola informasi perusahaan.';
    $customSeoTitle = trim(strip_tags(yield_content('seo_title')));
    $customSeoDescription = trim(strip_tags(yield_content('seo_description')));
    $customSeoKeywords = trim(strip_tags(yield_content('seo_keywords')));
    $customSeoImage = trim(strip_tags(yield_content('seo_image')));
    $customSeoType = trim(strip_tags(yield_content('seo_type')));
    $customSeoUrl = trim(strip_tags(yield_content('seo_url')));
    $customSeoRobots = trim(strip_tags(yield_content('seo_robots')));
    $customPublishedTime = trim(strip_tags(yield_content('seo_published_time')));
    $customModifiedTime = trim(strip_tags(yield_content('seo_modified_time')));
    $customJsonLd = yield_content('json_ld');
    $seoTitle = $customSeoTitle ?: trim(strip_tags(Helper::setting('seo-title') ?: (($pageTitle ? $pageTitle . ' | ' : '') . $appName)));
    $seoDescription = $customSeoDescription ?: trim(strip_tags(Helper::setting('seo-description') ?: Helper::setting('app-deskripsi') ?: $defaultDescription));
    $seoKeywords = $customSeoKeywords ?: trim(strip_tags(Helper::setting('seo-keywords') ?: ''));
    $seoImageId = Helper::setting('seo-og-image') ?: Helper::setting('site-hero-image');
    $seoImage = $customSeoImage ?: ($seoImageId ? url_media($seoImageId) : asset('img/bpr-hero.svg'));
    $seoType = $customSeoType ?: 'website';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $seoDescription }}">
    @if ($customSeoRobots)
        <meta name="robots" content="{{ $customSeoRobots }}">
    @endif
    @if ($customSeoUrl)
        <link rel="canonical" href="{{ $customSeoUrl }}">
    @endif
    @if ($seoKeywords)
        <meta name="keywords" content="{{ $seoKeywords }}">
    @endif
    <meta property="og:type" content="{{ $seoType }}">
    <meta property="og:site_name" content="{{ $appName }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:image" content="{{ $seoImage }}">
    @if ($customSeoUrl)
        <meta property="og:url" content="{{ $customSeoUrl }}">
    @endif
    @if ($customPublishedTime)
        <meta property="article:published_time" content="{{ $customPublishedTime }}">
    @endif
    @if ($customModifiedTime)
        <meta property="article:modified_time" content="{{ $customModifiedTime }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">
    @if ($customJsonLd)
        <script type="application/ld+json">
            {!! $customJsonLd !!}
        </script>
    @endif
    <link rel="shortcut icon" href="{{ icon() }}">
    <title>{{ $seoTitle }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?{{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                screens: {
                    xs: '400px',
                    sm: '640px',
                    md: '768px',
                    lg: '1024px',
                    xl: '1280px',
                    '2xl': '1536px',
                },
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                    colors: {
                        brand: {
                            50: '#eef8ff',
                            100: '#d8efff',
                            500: '#2187c8',
                            600: '#106aa2',
                            700: '#0d527f',
                            800: '#0f4165',
                            900: '#0b2d49',
                            950: '#071b2d',
                        },
                        gold: {
                            50: '#fff8e6',
                            100: '#ffedbd',
                            500: '#c9952c',
                            600: '#a87318',
                        },
                    },
                    boxShadow: {
                        soft: '0 24px 70px rgba(15, 23, 42, 0.12)',
                    },
                    borderRadius: {
                        app: '8px',
                    },
                },
            },
        }
    </script>
</head>
