@layout('template.master')

@section('title', 'Company Profile')

@section('content')
    @php
        $site = site_content();
        $companyName = $site['company_name'];
        $appDescription = $site['app_description'];
        $heroImage = $site['hero_image'];
        $heroTitle = $site['hero_title'];
        $heroSubtitle = $site['hero_subtitle'];
        $aboutTitle = $site['about_title'];
        $aboutBody = $site['about_body'];
        $services = $site['services'];
        $serviceTitles = array_map(function ($service) {
            return $service['title'];
        }, array_slice($services, 0, 3));
        $serviceFocus = implode(', ', $serviceTitles);
        $vision = $site['vision'];
        $missions = $site['missions'];
        $contactAddress = $site['contact_address'];
        $contactPhone = $site['contact_phone'];
        $contactEmail = $site['contact_email'];
        $contactHours = $site['contact_hours'];
        $socials = $site['socials'];
        $articles = $articles ?? [];
    @endphp

    <section id="beranda" class="relative isolate min-h-[calc(100vh-5rem)] overflow-hidden bg-brand-950 text-white">
        <img src="{{ $heroImage }}" alt="" class="absolute inset-0 -z-20 h-full w-full object-cover">
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-brand-950 via-brand-950/85 to-brand-950/35"></div>
        <div class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-gold-500 via-brand-500 to-emerald-500"></div>

        <div class="mx-auto flex min-h-[calc(100vh-5rem)] max-w-7xl items-center px-4 py-20 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                <p
                    class="mb-6 flex items-center gap-3 text-xs font-black uppercase tracking-[0.22em] text-gold-100 before:h-px before:w-10 before:bg-gold-100">
                    Company Profile</p>
                <h1 class="max-w-5xl text-5xl font-black leading-[0.98] tracking-tight sm:text-6xl lg:text-7xl">
                    {{ $heroTitle }}</h1>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-white/85 sm:text-xl">{{ $heroSubtitle }}</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="#tentang"
                        class="inline-flex h-12 items-center justify-center rounded-app bg-white px-5 text-sm font-black text-brand-950 shadow-xl transition hover:bg-brand-50">Lihat
                        Profil</a>
                    <a href="#layanan"
                        class="inline-flex h-12 items-center justify-center rounded-app border border-white/30 bg-white/10 px-5 text-sm font-black text-white transition hover:bg-white/15">Produk
                        Layanan</a>
                </div>

                <div
                    class="mt-14 grid overflow-hidden rounded-app border border-white/20 bg-white/10 backdrop-blur-xl sm:grid-cols-3">
                    <div class="border-b border-white/15 p-5 sm:border-b-0 sm:border-r">
                        <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Fokus</p>
                        <p class="mt-2 text-sm leading-6 text-white/85">
                            {{ $serviceFocus ?: 'Produk dan layanan perbankan.' }}</p>
                    </div>
                    <div class="border-b border-white/15 p-5 sm:border-b-0 sm:border-r">
                        <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Wilayah</p>
                        <p class="mt-2 text-sm leading-6 text-white/85">Melayani masyarakat dan pelaku usaha di Karawang.
                        </p>
                    </div>
                    <div class="p-5">
                        <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Komitmen</p>
                        <p class="mt-2 text-sm leading-6 text-white/85">Pelayanan terpercaya dengan tata kelola yang baik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1fr_0.55fr] lg:items-end">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.22em] text-brand-700 dark:text-brand-100">Tentang
                        Perusahaan</p>
                    <h2
                        class="mt-4 max-w-4xl text-4xl font-black tracking-tight text-slate-950 sm:text-5xl dark:text-white">
                        {{ $aboutTitle }}</h2>
                </div>
                <p class="text-base leading-8 text-slate-600 dark:text-slate-300">{{ $appDescription }}</p>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-[1fr_0.8fr]">
                <article
                    class="rounded-app border border-slate-200 bg-white p-7 shadow-sm dark:border-white/10 dark:bg-slate-900">
                    <div class="prose max-w-none prose-slate dark:prose-invert">{!! nl2br(e($aboutBody)) !!}</div>
                </article>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-app bg-brand-50 p-6 dark:bg-white/5">
                        <p class="text-4xl font-black text-brand-700 dark:text-brand-100">01</p>
                        <p class="mt-3 font-bold leading-6 text-slate-700 dark:text-slate-200">Layanan dekat dengan
                            masyarakat daerah.</p>
                    </div>
                    <div class="rounded-app bg-gold-50 p-6 dark:bg-white/5">
                        <p class="text-4xl font-black text-gold-600">02</p>
                        <p class="mt-3 font-bold leading-6 text-slate-700 dark:text-slate-200">Produk simpanan dan
                            pembiayaan produktif.</p>
                    </div>
                    <div class="rounded-app bg-emerald-50 p-6 dark:bg-white/5">
                        <p class="text-4xl font-black text-emerald-700 dark:text-emerald-300">03</p>
                        <p class="mt-3 font-bold leading-6 text-slate-700 dark:text-slate-200">Tata kelola berbasis
                            kepatuhan.</p>
                    </div>
                    <div class="rounded-app bg-slate-100 p-6 dark:bg-white/5">
                        <p class="text-4xl font-black text-slate-800 dark:text-white">04</p>
                        <p class="mt-3 font-bold leading-6 text-slate-700 dark:text-slate-200">Dukungan untuk ekonomi lokal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan"
        class="border-y border-slate-200 bg-white py-20 dark:border-white/10 dark:bg-slate-900 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1fr_0.55fr] lg:items-end">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.22em] text-brand-700 dark:text-brand-100">Produk dan
                        Layanan</p>
                    <h2
                        class="mt-4 max-w-4xl text-4xl font-black tracking-tight text-slate-950 sm:text-5xl dark:text-white">
                        Solusi perbankan yang sederhana, aman, dan tepat guna.</h2>
                </div>
                <p class="text-base leading-8 text-slate-600 dark:text-slate-300">Produk disusun untuk membantu nasabah
                    mengelola simpanan, merencanakan kebutuhan, dan mengembangkan usaha secara berkelanjutan.</p>
            </div>

            <div class="mt-10 grid gap-5 lg:grid-cols-3">
                @foreach ($services as $index => $service)
                    <article
                        class="{{ $index == 1 ? 'border-brand-900 bg-brand-950 text-white shadow-soft' : 'border-slate-200 bg-white shadow-sm dark:border-white/10 dark:bg-slate-950' }} rounded-app border p-7 transition hover:-translate-y-1 hover:shadow-soft">
                        <span
                            class="{{ $index == 1 ? 'bg-white/10 text-gold-100' : ($index == 2 ? 'bg-emerald-50 text-emerald-700' : 'bg-gold-50 text-gold-600') }} grid size-10 place-items-center rounded-app text-sm font-black">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="mt-8 text-2xl font-black {{ $index == 1 ? '' : 'text-slate-950 dark:text-white' }}">
                            {{ $service['title'] }}</h3>
                        <p
                            class="mt-3 leading-7 {{ $index == 1 ? 'text-white/75' : 'text-slate-600 dark:text-slate-300' }}">
                            {{ $service['desc'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl overflow-hidden rounded-app bg-brand-950 shadow-soft sm:grid sm:grid-cols-2">
            <div class="bg-gradient-to-br from-brand-700 to-brand-950 p-8 text-white sm:p-10 lg:p-12">
                <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Visi</p>
                <h2 class="mt-5 text-3xl font-black leading-tight tracking-tight sm:text-4xl">{{ $vision }}</h2>
            </div>
            <div class="p-8 text-white sm:p-10 lg:p-12">
                <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Misi</p>
                <div class="mt-6 grid gap-3">
                    @foreach ($missions as $index => $mission)
                        <div class="grid grid-cols-[2.5rem_1fr] gap-3 rounded-app border border-white/10 bg-white/5 p-4">
                            <span class="font-black text-gold-100">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <p class="text-white/80">{{ $mission }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="nilai" class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1fr_0.55fr] lg:items-end">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.22em] text-brand-700 dark:text-brand-100">Nilai
                        Perusahaan</p>
                    <h2
                        class="mt-4 max-w-4xl text-4xl font-black tracking-tight text-slate-950 sm:text-5xl dark:text-white">
                        Fondasi kerja yang menjaga kepercayaan nasabah.</h2>
                </div>
                <p class="text-base leading-8 text-slate-600 dark:text-slate-300">Kepercayaan dibangun melalui konsistensi
                    layanan, pengambilan keputusan yang hati-hati, dan tanggung jawab kepada pemangku kepentingan.</p>
            </div>

            <div class="mt-10 grid gap-5 lg:grid-cols-3">
                <article
                    class="rounded-app border border-slate-200 bg-white p-7 shadow-sm dark:border-white/10 dark:bg-slate-900">
                    <span
                        class="grid size-10 place-items-center rounded-app bg-brand-50 text-sm font-black text-brand-700 dark:bg-white/10 dark:text-brand-100">A</span>
                    <h3 class="mt-8 text-2xl font-black text-slate-950 dark:text-white">Amanah</h3>
                    <p class="mt-3 leading-7 text-slate-600 dark:text-slate-300">Menjaga dana dan kepercayaan nasabah dengan
                        integritas dalam setiap proses layanan.</p>
                </article>
                <article
                    class="rounded-app border border-slate-200 bg-white p-7 shadow-sm dark:border-white/10 dark:bg-slate-900">
                    <span
                        class="grid size-10 place-items-center rounded-app bg-gold-50 text-sm font-black text-gold-600">P</span>
                    <h3 class="mt-8 text-2xl font-black text-slate-950 dark:text-white">Profesional</h3>
                    <p class="mt-3 leading-7 text-slate-600 dark:text-slate-300">Bekerja dengan kompetensi, disiplin, dan
                        standar pelayanan yang jelas.</p>
                </article>
                <article
                    class="rounded-app border border-slate-200 bg-white p-7 shadow-sm dark:border-white/10 dark:bg-slate-900">
                    <span
                        class="grid size-10 place-items-center rounded-app bg-emerald-50 text-sm font-black text-emerald-700">T</span>
                    <h3 class="mt-8 text-2xl font-black text-slate-950 dark:text-white">Tumbuh Bersama</h3>
                    <p class="mt-3 leading-7 text-slate-600 dark:text-slate-300">Mendorong kemajuan nasabah, pelaku usaha,
                        dan ekonomi daerah secara berkelanjutan.</p>
                </article>
            </div>
        </div>
    </section>

    @if ($articles)
        <section id="artikel"
            class="border-y border-slate-200 bg-slate-50 py-20 dark:border-white/10 dark:bg-slate-900 sm:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-[1fr_0.55fr] lg:items-end">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.22em] text-brand-700 dark:text-brand-100">
                            Artikel</p>
                        <h2
                            class="mt-4 max-w-4xl text-4xl font-black tracking-tight text-slate-950 sm:text-5xl dark:text-white">
                            Informasi terbaru seputar layanan dan kegiatan perusahaan.</h2>
                    </div>
                    <div>
                        <p class="text-base leading-8 text-slate-600 dark:text-slate-300">Baca ringkasan informasi terbaru
                            dari {{ $companyName }} yang mendukung kebutuhan nasabah dan masyarakat.</p>
                        <a href="{{ url('artikel') }}"
                            class="mt-5 inline-flex h-11 items-center rounded-app bg-brand-700 px-4 text-sm font-black text-white transition hover:bg-brand-800">
                            Lihat semua artikel
                        </a>
                    </div>
                </div>

                <div class="mt-10 grid gap-5 lg:grid-cols-3">
                    @foreach ($articles as $article)
                        @php
                            $articleImage = !empty($article->image_id) ? url_media($article->image_id) : asset('img/default-image.jpg');
                            $articleDate = $article->published_at ? date('d M Y', strtotime($article->published_at)) : date('d M Y', strtotime($article->created_at));
                            $articleUrl = url('artikel/' . $article->slug);
                        @endphp
                        <article
                            class="overflow-hidden rounded-app border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-soft dark:border-white/10 dark:bg-slate-950">
                            <a href="{{ $articleUrl }}" class="block">
                                <div class="aspect-[16/10] overflow-hidden bg-slate-100 dark:bg-white/5">
                                    <img src="{{ $articleImage }}" alt="{{ $article->title }}"
                                        class="h-full w-full object-cover text-transparent transition duration-300 hover:scale-105">
                                </div>
                            </a>
                            <div class="p-6">
                                <p class="text-xs font-black uppercase tracking-[0.16em] text-brand-700 dark:text-brand-100">
                                    {{ $articleDate }}</p>
                                <h3 class="mt-3 line-clamp-2 text-xl font-black leading-tight text-slate-950 dark:text-white">
                                    <a href="{{ $articleUrl }}" class="transition hover:text-brand-700 dark:hover:text-brand-100">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <p class="mt-3 line-clamp-3 leading-7 text-slate-600 dark:text-slate-300">
                                    {{ $article->excerpt }}</p>
                                <a href="{{ $articleUrl }}"
                                    class="mt-5 inline-flex text-sm font-black text-brand-700 underline decoration-brand-200 underline-offset-4 transition hover:text-brand-900 dark:text-brand-100 dark:decoration-white/20">
                                    Baca artikel
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section id="kontak" class="pt-10">
        <div class="mx-auto max-w-7xl rounded-t-app bg-brand-950 px-4 py-12 text-white shadow-soft sm:px-8 lg:px-12">
            <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Kontak</p>
            <h2 class="mt-4 max-w-3xl text-4xl font-black tracking-tight sm:text-5xl">Siap melayani kebutuhan perbankan
                Anda.</h2>
            <p class="mt-5 max-w-2xl leading-8 text-white/75">Hubungi kantor {{ $companyName }} untuk informasi produk,
                layanan, dan kebutuhan kerja sama.</p>

            <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Alamat</p>
                    <p class="mt-2 font-bold">{{ $contactAddress }}</p>
                </div>
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Telepon</p>
                    <p class="mt-2 font-bold">{{ $contactPhone }}</p>
                </div>
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Email</p>
                    <p class="mt-2 font-bold">{{ $contactEmail }}</p>
                </div>
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Jam Layanan</p>
                    <p class="mt-2 font-bold">{{ $contactHours }}</p>
                </div>
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Panel Admin</p><a
                        class="mt-2 inline-flex font-bold underline decoration-white/30 underline-offset-4"
                        href="{{ url('admin/signin') }}">Masuk dashboard administrator</a>
                </div>
                <div class="rounded-app border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-gold-100">Sosial Media</p>
                    <div class="mt-2 flex flex-wrap gap-3 font-bold">
                        @foreach ($socials as $name => $url)
                            @if ($url)
                                <a href="{{ $url }}" target="_blank"
                                    class="underline decoration-white/30 underline-offset-4">{{ $name }}</a>
                            @endif
                        @endforeach
                        @if (!array_filter($socials))
                            <span>Belum tersedia</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
