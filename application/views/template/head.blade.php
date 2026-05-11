<head>
    <?php
    $pageTitle = trim(strip_tags(yield_content('title')));
    $appName = Helper::setting('app-name') ?: 'SISTEM COMPANY PROFILE';
    $defaultDescription = 'Sistem company profile untuk mengelola informasi perusahaan.';
    $seoTitle = trim(strip_tags(Helper::setting('seo-title') ?: (($pageTitle ? $pageTitle . ' | ' : '') . $appName)));
    $seoDescription = trim(strip_tags(Helper::setting('seo-description') ?: Helper::setting('app-deskripsi') ?: $defaultDescription));
    $seoKeywords = trim(strip_tags(Helper::setting('seo-keywords') ?: ''));
    $seoImageId = Helper::setting('seo-og-image') ?: Helper::setting('site-hero-image');
    $seoImage = $seoImageId ? url_media($seoImageId) : asset('img/bpr-hero.svg');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $seoDescription }}">
    @if ($seoKeywords)
        <meta name="keywords" content="{{ $seoKeywords }}">
    @endif
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $appName }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:image" content="{{ $seoImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">
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
