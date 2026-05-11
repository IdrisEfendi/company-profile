<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ trim(strip_tags(Helper::setting('app-deskripsi') ?: 'Sistem company profile untuk mengelola informasi perusahaan.')) }}">
    <link rel="shortcut icon" href="{{ icon() }}">
    <title><?php echo yield_content('title') ?> | {{ Helper::setting('app-name') ?: 'SISTEM COMPANY PROFILE' }}</title>
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
