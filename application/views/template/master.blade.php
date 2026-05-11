<?php $isDarkTheme = Cookie::get('theme', 'light') === 'dark'; ?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth{{ $isDarkTheme ? ' dark' : '' }}">

@include('template.head')

<body class="bg-slate-50 font-sans text-slate-900 antialiased transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100">

    @include('template.navbar')

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-slate-200 bg-white py-7 text-sm text-slate-500 dark:border-white/10 dark:bg-slate-950 dark:text-slate-400">
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <p>{!! Helper::setting('site-footer-text') ?: '&copy; ' . date('Y') . ' PT BPR Karawang Jabar (Perseroda). All rights reserved.' !!}</p>
            <p>{{ Helper::setting('app-name') ?: 'SISTEM COMPANY PROFILE' }}</p>
        </div>
    </footer>

    @include('template.script')

    @yield('script')

</body>

</html>
