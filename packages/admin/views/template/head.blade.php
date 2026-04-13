<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ icon() }}">
    <title>@yield('title') - ADMIN</title>
    <meta content="noindex, nofollow, max-image-preview:large" name="robots" />
    <link rel="stylesheet" href="{{ asset('packages/admin/css/style.css') }}?{{ time() }}">

    @yield('trumbowyg-style')

    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                display: ["group-hover"],
                screens: {
                    'xs': '400px',
                    'sm': '640px',
                    'md': '768px',
                    'lg': '1024px',
                    'xl': '1280px',
                    '2xl': '1536px',
                },
                extend: {
                    fontFamily: {
                        sans: [
                            'Archivo',
                        ],
                    },
                },
                colors: ({
                    colors
                }) => ({
                    transparent: colors.transparent,
                    black: colors.black,
                    white: colors.white,
                    indigo: colors.indigo,
                    violet: colors.violet,
                    orange: colors.orange,
                    green: colors.green,
                    blue: colors.blue,
                    purple: colors.purple,
                    gray: colors.gray,
                    rose: colors.rose,
                    amber: colors.amber,
                    green: colors.green,
                    fuchsia: colors.fuchsia,
                    cyan: colors.cyan,
                    sky: colors.sky,
                    gray: colors.gray,
                    stone: colors.stone,
                    neutral: colors.neutral,
                    zinc: colors.zinc,
                    red: colors.red,
                    'c0': colors.gray,
                    'c1': {
                        '50': '#f0fdf5',
                        '100': '#dcfcea',
                        '200': '#bbf7d6',
                        '300': '#85f0b7',
                        '400': '#49df90',
                        '500': '#20bf6b',
                        '600': '#15a459',
                        '700': '#148148',
                        '800': '#16653c',
                        '900': '#145334',
                        '950': '#052e1a',
                    },

                }),
                boxShadow: {
                    'sm': '0 1px 2px 0 rgb(0 0 0 / 0.05)',
                    'base': '0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)',
                    'md': '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)',
                    'lg': '0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)',
                    'xl': '0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)',
                    '2xl': '0 25px 50px -12px rgb(0 0 0 / 0.25)',
                    'inner': 'inset 0 2px 4px 0 rgb(0 0 0 / 0.05)',
                    'none': '0 0 #0000',
                    'solid-xs': '2.5px 3px',
                    'solid-sm': '5px 5px',
                    'solid-md': '7.5px 7.5px',
                    'solid-lg': '10px 10px',
                },
                fontSize: {
                    'xxs': '.7rem',
                    'xs': '.75rem',
                    'sm': '.875rem',
                    'base': '.950rem',
                    'md': '1rem',
                    'lg': '1.125rem',
                    'xl': '1.25rem',
                    '2xl': '1.5rem',
                    '3xl': '1.875rem',
                    '4xl': '2.25rem',
                    '5xl': '3rem',
                    '6xl': '4rem',
                    '7xl': '5rem',
                },
            },
        }
    </script>
</head>
