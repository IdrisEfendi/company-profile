<?php $isDarkTheme = Cookie::get('theme', 'light') === 'dark'; ?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth{{ $isDarkTheme ? ' dark' : '' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Company Profile | PT BPR Karawang Jabar (Perseroda)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#0f172a'
                        },
                        gold: '#f59e0b'
                    },
                    boxShadow: {
                        soft: '0 24px 80px rgba(15, 23, 42, 0.12)'
                    }
                }
            }
        }
    </script>
</head>

<body
    class="bg-slate-50 text-slate-800 antialiased transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100">
    <!-- Navigation -->
    <header
        class="fixed inset-x-0 top-0 z-50 border-b border-white/20 bg-white/90 backdrop-blur-xl transition-colors duration-300 dark:border-slate-800 dark:bg-slate-950/90">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
            <a href="#hero" class="flex items-center gap-3">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand-700 text-lg font-black text-white shadow-lg">
                    BPR</div>
                <div>
                    <p class="text-sm font-bold leading-tight text-slate-900 dark:text-white">PT BPR Karawang Jabar</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Perseroda</p>
                </div>
            </a>
            <nav class="hidden items-center gap-8 text-sm font-medium text-slate-600 md:flex dark:text-slate-300">
                <a href="#tentang" class="hover:text-brand-700">Tentang</a>
                <a href="#layanan" class="hover:text-brand-700">Layanan</a>
                <a href="#pengurus" class="hover:text-brand-700">Pengurus</a>
                <a href="#kontak" class="hover:text-brand-700">Kontak</a>
            </nav>
            <div class="flex items-center gap-3">
                <button id="themeToggle" type="button" data-light-url="{{ url('theme/light') }}"
                    data-dark-url="{{ url('theme/dark') }}" aria-label="Toggle dark mode"
                    class="rounded-full border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800">
                    <span id="themeIcon">{{ $isDarkTheme ? '☀️' : '🌙' }}</span>
                </button>
                <a href="#kontak"
                    class="rounded-full bg-brand-700 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-900/20 transition hover:bg-brand-600">Hubungi
                    Kami</a>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section id="hero" class="relative isolate overflow-hidden bg-slate-950 pt-32 text-white">
        <div
            class="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_top_left,_rgba(37,99,235,.45),_transparent_35%),radial-gradient(circle_at_bottom_right,_rgba(245,158,11,.24),_transparent_30%)]">
        </div>
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 pb-24 pt-10 lg:grid-cols-2 lg:px-8">
            <div>
                <span
                    class="inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-medium text-blue-100 backdrop-blur">Bank
                    Perkreditan Rakyat Milik Daerah</span>
                <h1 class="mt-7 text-4xl font-black tracking-tight sm:text-5xl lg:text-6xl">PT BPR Karawang Jabar <span
                        class="text-gold">(Perseroda)</span></h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-300">Mitra keuangan daerah yang berkomitmen
                    menyediakan layanan perbankan yang aman, terpercaya, dan mudah diakses untuk masyarakat serta pelaku
                    usaha lokal di Kabupaten Karawang.</p>
                <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                    <a href="#tentang"
                        class="rounded-full bg-white px-7 py-3 text-center text-sm font-bold text-slate-950 shadow-xl transition hover:bg-blue-50 dark:bg-slate-900 dark:text-white dark:hover:bg-slate-800">Lihat
                        Profil</a>
                    <a href="#layanan"
                        class="rounded-full border border-white/20 px-7 py-3 text-center text-sm font-bold text-white transition hover:bg-white/10 dark:border-slate-700 dark:hover:bg-slate-800">Produk
                        & Layanan</a>
                </div>
            </div>
            <div class="relative">
                <div
                    class="rounded-[2rem] border border-white/10 bg-white/10 p-6 shadow-soft backdrop-blur-xl transition-colors duration-300">
                    <div
                        class="rounded-[1.5rem] bg-white p-8 text-slate-900 transition-colors duration-300 dark:bg-slate-900 dark:text-white">
                        <p class="text-sm font-bold uppercase tracking-[0.3em] text-brand-700 dark:text-blue-300">Company
                            Profile</p>
                        <h2 class="mt-4 text-3xl font-black text-slate-900 dark:text-white">Layanan Keuangan untuk
                            Pertumbuhan Ekonomi Daerah</h2>
                        <div class="mt-8 grid gap-4">
                            <div
                                class="rounded-2xl bg-slate-50 p-5 transition-colors duration-300 dark:bg-slate-800">
                                <p class="text-sm text-slate-500 dark:text-slate-400">Alamat Kantor</p>
                                <p class="mt-1 font-semibold text-slate-900 dark:text-slate-100">Jln Raya Cilamaya,
                                    Komplek Kantor Kecamatan Cilamaya Wetan
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div
                                    class="rounded-2xl bg-brand-50 p-5 transition-colors duration-300 dark:bg-brand-900/30 dark:ring-1 dark:ring-brand-100/10">
                                    <p class="text-sm text-slate-500 dark:text-slate-400">Jam Layanan</p>
                                    <p class="mt-1 font-semibold text-slate-900 dark:text-slate-100">Senin - Jumat<br />08.00
                                        - 14.00</p>
                                </div>
                                <div
                                    class="rounded-2xl bg-amber-50 p-5 transition-colors duration-300 dark:bg-amber-900/20 dark:ring-1 dark:ring-amber-100/10">
                                    <p class="text-sm text-slate-500 dark:text-slate-400">Telepon</p>
                                    <p class="mt-1 font-semibold text-slate-900 dark:text-slate-100">(0264) 8380203</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Overview -->
    <section id="tentang" class="py-24 transition-colors duration-300 dark:bg-slate-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.3em] text-brand-700">Tentang Perusahaan</p>
                    <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl dark:text-white">
                        Membangun Kepercayaan, Menggerakkan Perekonomian Lokal</h2>
                </div>
                <div class="space-y-6 text-base leading-8 text-slate-600 dark:text-slate-300">
                    <p><strong class="text-slate-900 dark:text-white">PT BPR Karawang Jabar (Perseroda)</strong>
                        merupakan lembaga perbankan daerah yang hadir untuk memberikan solusi keuangan bagi masyarakat,
                        pelaku usaha, dan sektor ekonomi produktif di wilayah Karawang dan sekitarnya.</p>
                    <p>Dengan semangat pelayanan publik dan tata kelola yang baik, perusahaan berupaya menjadi mitra
                        strategis dalam memperluas akses keuangan, meningkatkan budaya menabung, serta mendukung
                        pembiayaan yang sehat bagi pertumbuhan usaha lokal.</p>
                </div>
            </div>

            <div class="mt-16 grid gap-6 md:grid-cols-3">
                <div class="rounded-3xl bg-white p-8 shadow-soft transition-colors duration-300 dark:bg-slate-900">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-brand-100 text-xl">🏦</div>
                    <h3 class="mt-6 text-xl font-black text-slate-950 dark:text-white">Terpercaya</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">Mengutamakan keamanan,
                        kepatuhan, dan profesionalisme dalam setiap layanan perbankan.</p>
                </div>
                <div class="rounded-3xl bg-white p-8 shadow-soft transition-colors duration-300 dark:bg-slate-900">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-100 text-xl">🤝</div>
                    <h3 class="mt-6 text-xl font-black text-slate-950 dark:text-white">Dekat dengan Masyarakat</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">Hadir sebagai mitra keuangan
                        yang memahami kebutuhan masyarakat dan pelaku usaha daerah.</p>
                </div>
                <div class="rounded-3xl bg-white p-8 shadow-soft transition-colors duration-300 dark:bg-slate-900">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl">📈</div>
                    <h3 class="mt-6 text-xl font-black text-slate-950 dark:text-white">Mendukung UMKM</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">Mendorong pertumbuhan ekonomi
                        lokal melalui layanan simpanan dan pembiayaan yang produktif.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission -->
    <section class="bg-white py-24 transition-colors duration-300 dark:bg-slate-900">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="text-sm font-bold uppercase tracking-[0.3em] text-brand-700">Visi & Misi</p>
                <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl dark:text-white">Arah
                    Strategis Perusahaan</h2>
            </div>
            <div class="mt-14 grid gap-6 lg:grid-cols-2">
                <div class="rounded-[2rem] bg-slate-950 p-10 text-white shadow-soft">
                    <p class="text-sm font-bold uppercase tracking-[0.3em] text-gold">Visi</p>
                    <h3 class="mt-5 text-2xl font-black leading-snug">Menjadi BPR daerah yang profesional, sehat,
                        terpercaya, dan berperan aktif dalam peningkatan kesejahteraan masyarakat serta perekonomian
                        daerah.</h3>
                </div>
                <div
                    class="rounded-[2rem] border border-slate-200 bg-slate-50 p-10 transition-colors duration-300 dark:border-slate-700 dark:bg-slate-950">
                    <p class="text-sm font-bold uppercase tracking-[0.3em] text-brand-700">Misi</p>
                    <ul class="mt-6 space-y-4 text-slate-700 dark:text-slate-300">
                        <li class="flex gap-3"><span class="font-black text-brand-700">01</span><span>Menyediakan
                                layanan keuangan yang aman, mudah, cepat, dan berorientasi pada kebutuhan
                                nasabah.</span></li>
                        <li class="flex gap-3"><span class="font-black text-brand-700">02</span><span>Mendukung
                                pembiayaan sektor produktif, khususnya UMKM dan masyarakat daerah.</span></li>
                        <li class="flex gap-3"><span class="font-black text-brand-700">03</span><span>Menerapkan tata
                                kelola perusahaan yang baik, transparan, dan akuntabel.</span></li>
                        <li class="flex gap-3"><span class="font-black text-brand-700">04</span><span>Meningkatkan
                                kualitas sumber daya manusia untuk pelayanan yang profesional.</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="layanan" class="py-24 transition-colors duration-300 dark:bg-slate-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.3em] text-brand-700">Produk & Layanan</p>
                <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl dark:text-white">Solusi
                    Perbankan untuk Kebutuhan Nasabah</h2>
                <p class="mt-5 text-slate-600 dark:text-slate-300">Perusahaan menyediakan layanan keuangan yang
                    dirancang untuk membantu masyarakat mengelola simpanan, merencanakan kebutuhan, dan mengembangkan
                    aktivitas ekonomi produktif.</p>
            </div>
            <div class="mt-12 grid gap-6 md:grid-cols-3">
                <article class="rounded-3xl bg-white p-8 shadow-soft transition-colors duration-300 dark:bg-slate-900">
                    <span
                        class="rounded-full bg-brand-50 px-4 py-2 text-xs font-bold uppercase tracking-wider text-brand-700">Simpanan</span>
                    <h3 class="mt-6 text-2xl font-black text-slate-950 dark:text-white">Tabungan</h3>
                    <p class="mt-4 leading-7 text-slate-600 dark:text-slate-300">Produk simpanan yang membantu nasabah
                        membangun kebiasaan menabung secara aman dan terencana.</p>
                </article>
                <article class="rounded-3xl bg-white p-8 shadow-soft transition-colors duration-300 dark:bg-slate-900">
                    <span
                        class="rounded-full bg-amber-50 px-4 py-2 text-xs font-bold uppercase tracking-wider text-amber-700">Perencanaan</span>
                    <h3 class="mt-6 text-2xl font-black text-slate-950 dark:text-white">TAHARA</h3>
                    <p class="mt-4 leading-7 text-slate-600 dark:text-slate-300">Tabungan Hari Raya untuk membantu
                        nasabah mempersiapkan kebutuhan hari raya secara lebih disiplin dan nyaman.</p>
                </article>
                <article class="rounded-3xl bg-white p-8 shadow-soft transition-colors duration-300 dark:bg-slate-900">
                    <span
                        class="rounded-full bg-emerald-50 px-4 py-2 text-xs font-bold uppercase tracking-wider text-emerald-700">Pembiayaan</span>
                    <h3 class="mt-6 text-2xl font-black text-slate-950 dark:text-white">Kredit Produktif</h3>
                    <p class="mt-4 leading-7 text-slate-600 dark:text-slate-300">Dukungan pembiayaan bagi masyarakat
                        dan pelaku usaha untuk menunjang aktivitas ekonomi yang sehat dan berkelanjutan.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Governance -->
    <section class="bg-slate-950 py-24 text-white">
        <div class="mx-auto grid max-w-7xl gap-12 px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.3em] text-gold">Tata Kelola</p>
                <h2 class="mt-4 text-3xl font-black tracking-tight sm:text-4xl">Komitmen pada Good Corporate Governance
                </h2>
            </div>
            <div class="space-y-5 text-slate-300">
                <p>PT BPR Karawang Jabar (Perseroda) berkomitmen menjalankan kegiatan usaha secara prudent, transparan,
                    akuntabel, dan berorientasi pada kepentingan nasabah serta pemangku kepentingan daerah.</p>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">Transparansi</div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">Akuntabilitas</div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">Profesionalisme</div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5">Kepatuhan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership -->
    <section id="pengurus" class="py-24 transition-colors duration-300 dark:bg-slate-950">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="text-sm font-bold uppercase tracking-[0.3em] text-brand-700">Pengurus</p>
                <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl dark:text-white">Dipimpin
                    oleh Profesional Berpengalaman</h2>
            </div>
            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div
                    class="rounded-3xl bg-white p-7 text-center shadow-soft transition-colors duration-300 dark:bg-slate-900">
                    <div
                        class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-brand-100 text-2xl font-black text-brand-700">
                        HH</div>
                    <h3 class="mt-5 font-black text-slate-950 dark:text-white">HERI HERYANTO SH, MM</h3>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Direktur Utama</p>
                </div>
                <div
                    class="rounded-3xl bg-white p-7 text-center shadow-soft transition-colors duration-300 dark:bg-slate-900">
                    <div
                        class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-brand-100 text-2xl font-black text-brand-700">
                        AH</div>
                    <h3 class="mt-5 font-black text-slate-950 dark:text-white">ATJENG HADIS SUSANTO SE</h3>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Direktur</p>
                </div>
                <div
                    class="rounded-3xl bg-white p-7 text-center shadow-soft transition-colors duration-300 dark:bg-slate-900">
                    <div
                        class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-brand-100 text-2xl font-black text-brand-700">
                        JS</div>
                    <h3 class="mt-5 font-black text-slate-950 dark:text-white">JAJA SUMARNA SE</h3>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Komisaris Utama</p>
                </div>
                <div
                    class="rounded-3xl bg-white p-7 text-center shadow-soft transition-colors duration-300 dark:bg-slate-900">
                    <div
                        class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-brand-100 text-2xl font-black text-brand-700">
                        DK</div>
                    <h3 class="mt-5 font-black text-slate-950 dark:text-white">DIKDIK KUSTIADI</h3>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Komisaris</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA / Contact -->
    <section id="kontak" class="pb-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-brand-700 to-slate-950 shadow-soft">
                <div class="grid gap-10 p-8 text-white md:grid-cols-2 md:p-12 lg:p-16">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.3em] text-blue-100">Kontak</p>
                        <h2 class="mt-4 text-3xl font-black sm:text-4xl">Siap Menjadi Mitra Keuangan Anda</h2>
                        <p class="mt-5 max-w-xl text-blue-100">Hubungi kantor PT BPR Karawang Jabar (Perseroda) untuk
                            informasi produk, layanan, dan kebutuhan perbankan lainnya.</p>
                    </div>
                    <div
                        class="rounded-3xl bg-white p-8 text-slate-900 transition-colors duration-300 dark:bg-slate-900 dark:text-white">
                        <div class="space-y-5">
                            <div>
                                <p class="text-sm font-bold text-slate-500 dark:text-slate-400">Alamat</p>
                                <p class="mt-1 font-semibold">Jln Raya Cilamaya, Komplek Kantor Kecamatan Cilamaya
                                    Wetan</p>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-500 dark:text-slate-400">Telepon</p>
                                <p class="mt-1 font-semibold">(0264) 8380203</p>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-500 dark:text-slate-400">Email</p>
                                <p class="mt-1 font-semibold">ptbptkarawang@gmail.com</p>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-500 dark:text-slate-400">Jam Buka</p>
                                <p class="mt-1 font-semibold">Senin - Jumat, 08.00 - 14.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer
        class="border-t border-slate-200 bg-white py-8 transition-colors duration-300 dark:border-slate-800 dark:bg-slate-950">
        <div
            class="mx-auto flex max-w-7xl flex-col gap-3 px-6 text-sm text-slate-500 md:flex-row md:items-center md:justify-between lg:px-8 dark:text-slate-400">
            <p>© 2026 PT BPR Karawang Jabar (Perseroda). All rights reserved.</p>
            <p>Company Profile Website Template with Tailwind CSS.</p>
        </div>
    </footer>
    <script>
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');

        function updateThemeIcon() {
            themeIcon.textContent = document.documentElement.classList.contains('dark') ? '☀️' : '🌙';
        }

        updateThemeIcon();

        themeToggle.addEventListener('click', function() {
            const isDark = document.documentElement.classList.contains('dark');
            window.location.href = isDark ? themeToggle.dataset.lightUrl : themeToggle.dataset.darkUrl;
        });
    </script>
</body>

</html>
