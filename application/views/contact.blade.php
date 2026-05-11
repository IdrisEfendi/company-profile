@layout('template.master')

@section('title', 'Kontak')

@section('content')
    <?php $site = site_content(); ?>

    <section class="bg-brand-950 py-20 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Kontak</p>
            <h1 class="mt-5 max-w-4xl text-4xl font-black tracking-tight sm:text-6xl">Siap melayani kebutuhan perbankan Anda.</h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-white/75">Hubungi kantor {{ $site['company_name'] }} untuk informasi produk, layanan, dan kebutuhan kerja sama.</p>
        </div>
    </section>

    <section class="py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-5 px-4 sm:px-6 md:grid-cols-2 lg:grid-cols-3 lg:px-8">
            <div class="rounded-app border border-slate-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-slate-900">
                <p class="text-xs font-black uppercase tracking-[0.16em] text-brand-700 dark:text-brand-100">Alamat</p>
                <p class="mt-3 font-bold leading-7">{{ $site['contact_address'] }}</p>
            </div>
            <div class="rounded-app border border-slate-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-slate-900">
                <p class="text-xs font-black uppercase tracking-[0.16em] text-brand-700 dark:text-brand-100">Telepon</p>
                <p class="mt-3 font-bold leading-7">{{ $site['contact_phone'] }}</p>
            </div>
            <div class="rounded-app border border-slate-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-slate-900">
                <p class="text-xs font-black uppercase tracking-[0.16em] text-brand-700 dark:text-brand-100">Email</p>
                <p class="mt-3 font-bold leading-7">{{ $site['contact_email'] }}</p>
            </div>
            <div class="rounded-app border border-slate-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-slate-900">
                <p class="text-xs font-black uppercase tracking-[0.16em] text-brand-700 dark:text-brand-100">Jam Layanan</p>
                <p class="mt-3 font-bold leading-7">{{ $site['contact_hours'] }}</p>
            </div>
            <div class="rounded-app border border-slate-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-slate-900 md:col-span-2">
                <p class="text-xs font-black uppercase tracking-[0.16em] text-brand-700 dark:text-brand-100">Sosial Media</p>
                <div class="mt-3 flex flex-wrap gap-3 font-bold">
                    @foreach ($site['socials'] as $name => $url)
                        @if ($url)
                            <a href="{{ $url }}" target="_blank" class="rounded-app bg-brand-50 px-4 py-2 text-brand-700 dark:bg-white/10 dark:text-brand-100">{{ $name }}</a>
                        @endif
                    @endforeach
                    @if (!array_filter($site['socials']))
                        <span class="text-slate-500 dark:text-slate-400">Belum tersedia</span>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
