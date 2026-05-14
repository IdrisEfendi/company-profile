<?php
$isDarkTheme = Cookie::get('theme', 'light') === 'dark';
$logoId = Helper::setting('app-logo');
$logoUrl = $logoId ? url_media($logoId) : null;
?>
<header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur-xl dark:border-white/10 dark:bg-slate-950/90">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-5 px-4 sm:px-6 lg:px-8">
        <a href="{{ url('/') }}" class="flex min-w-0 items-center gap-3" aria-label="PT BPR Karawang Jabar">
            @if ($logoUrl)
                <img src="{{ $logoUrl }}" alt="Logo PT BPR Karawang Jabar" class="size-12 shrink-0 rounded-app object-cover shadow-lg shadow-brand-900/20">
            @else
                <span class="grid size-12 shrink-0 place-items-center rounded-app bg-gradient-to-br from-brand-600 to-brand-950 text-sm font-black text-white shadow-lg shadow-brand-900/20">BPR</span>
            @endif
            <span class="min-w-0">
                <span class="block truncate text-sm font-black leading-tight text-slate-950 dark:text-white sm:text-base">PT BPR Karawang Jabar</span>
                <span class="block text-xs font-bold uppercase tracking-[0.18em] text-brand-700 dark:text-brand-100">Perseroda</span>
            </span>
        </a>

        <nav class="hidden items-center gap-1 text-sm font-bold text-slate-600 lg:flex dark:text-slate-300" aria-label="Navigasi utama">
            <a class="rounded-app px-3 py-2 hover:bg-slate-100 hover:text-brand-700 dark:hover:bg-white/10 dark:hover:text-white" href="{{ url('/') }}">Beranda</a>
            <a class="rounded-app px-3 py-2 hover:bg-slate-100 hover:text-brand-700 dark:hover:bg-white/10 dark:hover:text-white" href="{{ url('profil') }}">Profil</a>
            <a class="rounded-app px-3 py-2 hover:bg-slate-100 hover:text-brand-700 dark:hover:bg-white/10 dark:hover:text-white" href="{{ url('layanan') }}">Layanan</a>
            <a class="rounded-app px-3 py-2 hover:bg-slate-100 hover:text-brand-700 dark:hover:bg-white/10 dark:hover:text-white" href="{{ url('artikel') }}">Artikel</a>
            <a class="rounded-app px-3 py-2 hover:bg-slate-100 hover:text-brand-700 dark:hover:bg-white/10 dark:hover:text-white" href="{{ url('kontak') }}">Kontak</a>
        </nav>

        <div class="flex items-center gap-2">
            <button id="themeToggle" type="button" class="grid size-11 place-items-center rounded-app border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-brand-200 hover:text-brand-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200" aria-label="Ganti tema">
                <svg id="themeIconMoon" class="size-5 {{ $isDarkTheme ? 'hidden' : '' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M21 12.8A8.5 8.5 0 1 1 11.2 3 6.5 6.5 0 0 0 21 12.8Z"></path>
                </svg>
                <svg id="themeIconSun" class="size-5 {{ $isDarkTheme ? '' : 'hidden' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"></path>
                </svg>
            </button>
            <a href="{{ url('admin/signin') }}" class="hidden rounded-app bg-brand-700 px-4 py-3 text-sm font-black text-white shadow-lg shadow-brand-900/15 transition hover:bg-brand-800 sm:inline-flex">Admin</a>
        </div>
    </div>
</header>
