@layout('template.master')

@section('title', 'Profil Perusahaan')

@section('content')
    <?php $site = site_content(); ?>

    <section class="bg-brand-950 py-20 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Profil Perusahaan</p>
            <h1 class="mt-5 max-w-4xl text-4xl font-black tracking-tight sm:text-6xl">{{ $site['about_title'] }}</h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-white/75">{{ $site['app_description'] }}</p>
        </div>
    </section>

    <section class="py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_0.55fr] lg:px-8">
            <article class="rounded-app border border-slate-200 bg-white p-7 shadow-sm dark:border-white/10 dark:bg-slate-900">
                <div class="prose max-w-none prose-slate dark:prose-invert">
                    {!! nl2br(e($site['about_body'])) !!}
                </div>
            </article>

            <aside class="space-y-4">
                <div class="rounded-app bg-brand-50 p-6 dark:bg-white/5">
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-brand-700 dark:text-brand-100">Nama Perusahaan</p>
                    <p class="mt-3 text-xl font-black text-slate-950 dark:text-white">{{ $site['company_name'] }}</p>
                </div>
                <div class="rounded-app bg-gold-50 p-6 dark:bg-white/5">
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-gold-600">Fokus Layanan</p>
                    <p class="mt-3 font-bold text-slate-700 dark:text-slate-200">{{ $site['services'][0]['title'] }}, {{ $site['services'][1]['title'] }}, dan {{ $site['services'][2]['title'] }}</p>
                </div>
                <div class="rounded-app bg-emerald-50 p-6 dark:bg-white/5">
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-emerald-700 dark:text-emerald-300">Wilayah</p>
                    <p class="mt-3 font-bold text-slate-700 dark:text-slate-200">Karawang dan sekitarnya</p>
                </div>
            </aside>
        </div>
    </section>

    <section class="border-y border-slate-200 bg-white py-20 dark:border-white/10 dark:bg-slate-900 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="rounded-app bg-brand-950 p-8 text-white">
                    <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Visi</p>
                    <h2 class="mt-5 text-3xl font-black leading-tight">{{ $site['vision'] }}</h2>
                </div>
                <div class="rounded-app border border-slate-200 bg-white p-8 dark:border-white/10 dark:bg-slate-950">
                    <p class="text-xs font-black uppercase tracking-[0.22em] text-brand-700 dark:text-brand-100">Misi</p>
                    <div class="mt-6 grid gap-3">
                        @foreach ($site['missions'] as $index => $mission)
                            <div class="grid grid-cols-[2.5rem_1fr] gap-3 rounded-app bg-slate-50 p-4 dark:bg-white/5">
                                <span class="font-black text-brand-700 dark:text-brand-100">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <p class="text-slate-700 dark:text-slate-300">{{ $mission }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
