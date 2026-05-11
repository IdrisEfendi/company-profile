@layout('template.master')

@section('title', 'Layanan')

@section('content')
    <?php $site = site_content(); ?>

    <section class="bg-brand-950 py-20 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Produk dan Layanan</p>
            <h1 class="mt-5 max-w-4xl text-4xl font-black tracking-tight sm:text-6xl">Solusi perbankan yang sederhana, aman, dan tepat guna.</h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-white/75">Produk disusun untuk membantu nasabah mengelola simpanan, merencanakan kebutuhan, dan mengembangkan usaha secara berkelanjutan.</p>
        </div>
    </section>

    <section class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 lg:grid-cols-3">
                @foreach ($site['services'] as $index => $service)
                    <article class="{{ $index == 1 ? 'border-brand-900 bg-brand-950 text-white shadow-soft' : 'border-slate-200 bg-white shadow-sm dark:border-white/10 dark:bg-slate-900' }} rounded-app border p-7">
                        <span class="{{ $index == 1 ? 'bg-white/10 text-gold-100' : ($index == 2 ? 'bg-emerald-50 text-emerald-700' : 'bg-gold-50 text-gold-600') }} grid size-10 place-items-center rounded-app text-sm font-black">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h2 class="mt-8 text-2xl font-black {{ $index == 1 ? '' : 'text-slate-950 dark:text-white' }}">{{ $service['title'] }}</h2>
                        <p class="mt-3 leading-7 {{ $index == 1 ? 'text-white/75' : 'text-slate-600 dark:text-slate-300' }}">{{ $service['desc'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-y border-slate-200 bg-white py-20 dark:border-white/10 dark:bg-slate-900">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.8fr_1fr] lg:px-8">
            <div>
                <p class="text-xs font-black uppercase tracking-[0.22em] text-brand-700 dark:text-brand-100">Pendekatan Layanan</p>
                <h2 class="mt-4 text-4xl font-black tracking-tight text-slate-950 dark:text-white">Dekat dengan kebutuhan nasabah.</h2>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-app bg-slate-50 p-6 dark:bg-white/5"><h3 class="font-black">Aman</h3><p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">Mengutamakan prinsip kehati-hatian dalam setiap layanan.</p></div>
                <div class="rounded-app bg-slate-50 p-6 dark:bg-white/5"><h3 class="font-black">Mudah</h3><p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">Proses layanan dirancang agar mudah dipahami nasabah.</p></div>
                <div class="rounded-app bg-slate-50 p-6 dark:bg-white/5"><h3 class="font-black">Produktif</h3><p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">Mendukung aktivitas usaha dan ekonomi lokal.</p></div>
                <div class="rounded-app bg-slate-50 p-6 dark:bg-white/5"><h3 class="font-black">Terpercaya</h3><p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">Dikelola dengan tata kelola yang transparan dan akuntabel.</p></div>
            </div>
        </div>
    </section>
@endsection
