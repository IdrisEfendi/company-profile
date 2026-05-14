@layout('template.master')

@section('title', 'Artikel')
@section('seo_title', 'Artikel | ' . (Helper::setting('app-name') ?: 'SISTEM COMPANY PROFILE'))
@section('seo_description', 'Daftar artikel dan informasi terbaru dari company profile.')

@section('content')
    @php
        $site = site_content();
        $search = $search ?? '';
    @endphp

    <section class="bg-brand-950 py-16 text-white sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-xs font-black uppercase tracking-[0.22em] text-gold-100">Artikel</p>
            <h1 class="mt-5 max-w-4xl text-4xl font-black tracking-tight sm:text-6xl">Informasi terbaru dari {{ $site['company_name'] }}.</h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-white/75">Baca artikel terbaru seputar layanan, kegiatan, dan informasi perusahaan.</p>
        </div>
    </section>

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 rounded-app border border-slate-200 bg-white p-4 shadow-sm dark:border-white/10 dark:bg-slate-900">
                <form action="{{ url('artikel') }}" method="GET" class="flex flex-col gap-3 sm:flex-row">
                    <input type="search" name="s" value="{{ $search }}" placeholder="Cari artikel"
                        class="block w-full rounded-app border-slate-200 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-white/10 dark:bg-slate-950 dark:text-white sm:text-sm">
                    <button type="submit"
                        class="inline-flex h-11 shrink-0 items-center justify-center rounded-app bg-brand-700 px-5 text-sm font-black text-white transition hover:bg-brand-800">
                        Cari
                    </button>
                    @if ($search)
                        <a href="{{ url('artikel') }}"
                            class="inline-flex h-11 shrink-0 items-center justify-center rounded-app border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:border-brand-200 hover:text-brand-700 dark:border-white/10 dark:text-slate-200 dark:hover:text-white">
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <div class="grid gap-5 lg:grid-cols-3">
                @forelse ($results as $article)
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
                            <h2 class="mt-3 line-clamp-2 text-xl font-black leading-tight text-slate-950 dark:text-white">
                                <a href="{{ $articleUrl }}" class="transition hover:text-brand-700 dark:hover:text-brand-100">
                                    {{ $article->title }}
                                </a>
                            </h2>
                            <p class="mt-3 line-clamp-3 leading-7 text-slate-600 dark:text-slate-300">
                                {{ $article->excerpt }}</p>
                            <a href="{{ $articleUrl }}"
                                class="mt-5 inline-flex text-sm font-black text-brand-700 underline decoration-brand-200 underline-offset-4 transition hover:text-brand-900 dark:text-brand-100 dark:decoration-white/20">
                                Baca artikel
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="lg:col-span-3 rounded-app border border-slate-200 bg-white p-10 text-center text-slate-600 dark:border-white/10 dark:bg-slate-900 dark:text-slate-300">
                        {{ $search ? 'Artikel yang dicari belum ditemukan.' : 'Belum ada artikel yang dipublikasikan.' }}
                    </div>
                @endforelse
            </div>

            @if (ceil($total_rows / $per_page) > 1)
                <div class="mt-10 flex flex-col gap-4 border-t border-slate-200 pt-6 sm:flex-row sm:items-center sm:justify-between dark:border-white/10">
                    <p class="text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Menampilkan {{ ($page - 1) * $per_page + 1 }} sampai {{ min($page * $per_page, $total_rows) }} dari {{ $total_rows }} artikel
                    </p>
                    <div class="flex flex-wrap gap-2">
                        @if ($page > 1)
                            <a href="{{ replace_url_get_params(URL::full(), 'page', ($page - 1)) }}"
                                class="inline-flex h-10 items-center rounded-app border border-slate-200 px-4 text-sm font-black text-slate-700 transition hover:border-brand-200 hover:text-brand-700 dark:border-white/10 dark:text-slate-200 dark:hover:text-white">
                                Prev
                            </a>
                        @endif
                        @for ($i = 1; $i <= ceil($total_rows / $per_page); $i++)
                            <a href="{{ replace_url_get_params(URL::full(), 'page', $i) }}"
                                class="{{ $i == $page ? 'border-brand-700 bg-brand-700 text-white' : 'border-slate-200 text-slate-700 hover:border-brand-200 hover:text-brand-700 dark:border-white/10 dark:text-slate-200 dark:hover:text-white' }} inline-flex h-10 min-w-10 items-center justify-center rounded-app border px-3 text-sm font-black transition">
                                {{ $i }}
                            </a>
                        @endfor
                        @if ($page < ceil($total_rows / $per_page))
                            <a href="{{ replace_url_get_params(URL::full(), 'page', ($page + 1)) }}"
                                class="inline-flex h-10 items-center rounded-app border border-slate-200 px-4 text-sm font-black text-slate-700 transition hover:border-brand-200 hover:text-brand-700 dark:border-white/10 dark:text-slate-200 dark:hover:text-white">
                                Next
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
