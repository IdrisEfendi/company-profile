@layout('template.master')

@section('title', $article->title)

@section('seo_title', $article->title)
@section('seo_description', $article->excerpt ?: trim(strip_tags($article->content)))
@section('seo_image', !empty($article->image_id) ? url_media($article->image_id) : asset('img/default-image.jpg'))
@section('seo_type', 'article')

@section('content')
    @php
        $site = site_content();
        $companyName = $site['company_name'];
        $articleImage = !empty($article->image_id) ? url_media($article->image_id) : asset('img/default-image.jpg');
        $articleDate = $article->published_at ? date('d M Y', strtotime($article->published_at)) : date('d M Y', strtotime($article->created_at));
        $articleUrl = url('artikel/' . $article->slug);
        $shareText = rawurlencode($article->title);
        $shareUrl = rawurlencode($articleUrl);
        $is_preview = $is_preview ?? false;
        $publishedIso = $article->published_at ? date('c', strtotime($article->published_at)) : date('c', strtotime($article->created_at));
        $modifiedIso = $article->updated_at ? date('c', strtotime($article->updated_at)) : $publishedIso;
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $article->title,
            'description' => $article->excerpt ?: trim(strip_tags($article->content)),
            'image' => [$articleImage],
            'datePublished' => $publishedIso,
            'dateModified' => $modifiedIso,
            'author' => [
                '@type' => 'Organization',
                'name' => $companyName,
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => $companyName,
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => icon(),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $articleUrl,
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $related_articles = $related_articles ?? [];
    @endphp

    @section('seo_url', $articleUrl)
    @section('seo_published_time', $publishedIso)
    @section('seo_modified_time', $modifiedIso)
    @section('json_ld', $jsonLd)
    @if ($is_preview)
        @section('seo_robots', 'noindex, nofollow')
    @endif

    <section class="bg-brand-950 py-16 text-white sm:py-20">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            @if ($is_preview)
                <div class="mb-8 rounded-app border border-gold-100/30 bg-gold-500/15 p-4 text-sm font-bold text-gold-100">
                    Preview admin: artikel ini tidak harus sedang tampil publik.
                </div>
            @endif
            <a href="{{ url('/') }}#artikel"
                class="inline-flex text-sm font-black text-gold-100 underline decoration-white/20 underline-offset-4 transition hover:text-white">
                Kembali ke artikel
            </a>
            <p class="mt-8 text-xs font-black uppercase tracking-[0.22em] text-gold-100">{{ $articleDate }}</p>
            <h1 class="mt-5 max-w-4xl text-4xl font-black tracking-tight sm:text-6xl">{{ $article->title }}</h1>
            @if ($article->excerpt)
                <p class="mt-6 max-w-3xl text-lg leading-8 text-white/75">{{ $article->excerpt }}</p>
            @endif
        </div>
    </section>

    <section class="py-12 sm:py-16">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-app border border-slate-200 bg-white shadow-sm dark:border-white/10 dark:bg-slate-900">
                <div class="aspect-[16/8] overflow-hidden bg-slate-100 dark:bg-white/5">
                    <img src="{{ $articleImage }}" alt="{{ $article->title }}" class="h-full w-full object-cover text-transparent">
                </div>
                <article class="p-6 sm:p-8 lg:p-10">
                    <div class="prose max-w-none prose-slate prose-headings:font-black prose-a:font-bold prose-a:text-brand-700 dark:prose-invert dark:prose-a:text-brand-100">
                        {!! $article->content !!}
                    </div>

                    <div class="mt-10 border-t border-slate-200 pt-6 dark:border-white/10">
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                            Bagikan artikel</p>
                        <div class="mt-4 flex flex-wrap gap-3">
                            <a href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex h-10 items-center rounded-app bg-brand-700 px-4 text-sm font-black text-white transition hover:bg-brand-800">
                                WhatsApp
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex h-10 items-center rounded-app border border-slate-200 px-4 text-sm font-black text-slate-700 transition hover:border-brand-200 hover:text-brand-700 dark:border-white/10 dark:text-slate-200 dark:hover:text-white">
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ $shareText }}&url={{ $shareUrl }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex h-10 items-center rounded-app border border-slate-200 px-4 text-sm font-black text-slate-700 transition hover:border-brand-200 hover:text-brand-700 dark:border-white/10 dark:text-slate-200 dark:hover:text-white">
                                X
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    @if ($related_articles)
        <section class="border-t border-slate-200 bg-white py-16 dark:border-white/10 dark:bg-slate-900">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.22em] text-brand-700 dark:text-brand-100">
                            Artikel Lainnya</p>
                        <h2 class="mt-3 text-3xl font-black tracking-tight text-slate-950 dark:text-white">
                            Informasi dari {{ $companyName }}</h2>
                    </div>
                    <a href="{{ url('artikel') }}"
                        class="text-sm font-black text-brand-700 underline decoration-brand-200 underline-offset-4 dark:text-brand-100 dark:decoration-white/20">
                        Lihat semua
                    </a>
                </div>

                <div class="mt-8 grid gap-5 lg:grid-cols-3">
                    @foreach ($related_articles as $related)
                        @php
                            $relatedImage = !empty($related->image_id) ? url_media($related->image_id) : asset('img/default-image.jpg');
                            $relatedDate = $related->published_at ? date('d M Y', strtotime($related->published_at)) : date('d M Y', strtotime($related->created_at));
                            $relatedUrl = url('artikel/' . $related->slug);
                        @endphp
                        <article
                            class="overflow-hidden rounded-app border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-soft dark:border-white/10 dark:bg-slate-950">
                            <a href="{{ $relatedUrl }}" class="block">
                                <div class="aspect-[16/10] overflow-hidden bg-slate-100 dark:bg-white/5">
                                    <img src="{{ $relatedImage }}" alt="{{ $related->title }}"
                                        class="h-full w-full object-cover text-transparent transition duration-300 hover:scale-105">
                                </div>
                            </a>
                            <div class="p-6">
                                <p class="text-xs font-black uppercase tracking-[0.16em] text-brand-700 dark:text-brand-100">
                                    {{ $relatedDate }}</p>
                                <h3 class="mt-3 line-clamp-2 text-xl font-black leading-tight text-slate-950 dark:text-white">
                                    <a href="{{ $relatedUrl }}" class="transition hover:text-brand-700 dark:hover:text-brand-100">
                                        {{ $related->title }}
                                    </a>
                                </h3>
                                <p class="mt-3 line-clamp-3 leading-7 text-slate-600 dark:text-slate-300">
                                    {{ $related->excerpt }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
