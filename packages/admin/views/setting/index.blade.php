@layout('admin::template.master')

@section('title', 'Settings')

@section('media')
@endsection

@section('content')
    <?php
    $value = function ($slug, $default = '') use ($settings) {
        return old($slug) ?? ($settings[$slug] ?? $default);
    };

    $mediaUrl = function ($slug) use ($value) {
        $id = $value($slug, '');
        return $id ? url_media($id) : '';
    };
    ?>

    <div class="space-y-4">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-2xl font-medium">Website Settings</h1>
                <p class="mt-1 text-sm text-c0-500">Kelola konten frontend company profile tanpa mengubah file Blade.</p>
            </div>
            <a href="{{ home_url() }}" target="_blank" class="inline-flex h-9 items-center rounded-md border border-c1-500 px-3 text-sm font-semibold text-c1-600 hover:border-c1-700 hover:text-c1-800">
                Preview website
            </a>
        </div>

        @include('admin::template.components.alert')

        <form action="{{ route('admin-setting-update') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-12 gap-4">
                <aside class="col-span-12 lg:col-span-3">
                    <div class="sticky top-20 rounded-md border bg-white p-2">
                        <button type="button" data-tab-target="general" class="btn-setting-tab w-full rounded-md bg-c1-50 px-3 py-2 text-left text-sm font-semibold text-c1-700">General</button>
                        <button type="button" data-tab-target="seo" class="btn-setting-tab w-full rounded-md px-3 py-2 text-left text-sm font-semibold text-c0-600 hover:bg-c0-50">SEO</button>
                        <button type="button" data-tab-target="hero" class="btn-setting-tab w-full rounded-md px-3 py-2 text-left text-sm font-semibold text-c0-600 hover:bg-c0-50">Hero</button>
                        <button type="button" data-tab-target="about" class="btn-setting-tab w-full rounded-md px-3 py-2 text-left text-sm font-semibold text-c0-600 hover:bg-c0-50">Tentang</button>
                        <button type="button" data-tab-target="vision" class="btn-setting-tab w-full rounded-md px-3 py-2 text-left text-sm font-semibold text-c0-600 hover:bg-c0-50">Visi & Misi</button>
                        <button type="button" data-tab-target="contact" class="btn-setting-tab w-full rounded-md px-3 py-2 text-left text-sm font-semibold text-c0-600 hover:bg-c0-50">Kontak & Sosial</button>
                    </div>
                </aside>

                <div class="col-span-12 space-y-4 lg:col-span-6">
                    <section data-tab-panel="general" class="setting-panel rounded-md border bg-white p-4">
                        <h2 class="text-lg font-bold">General</h2>
                        <div class="mt-4 grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Nama website</label>
                                <input type="text" name="app-name" value="{{ $value('app-name', 'SISTEM COMPANY PROFILE') }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Deskripsi website</label>
                                <textarea name="app-deskripsi" rows="5" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('app-deskripsi') }}</textarea>
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Footer text</label>
                                <textarea name="site-footer-text" rows="3" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('site-footer-text') }}</textarea>
                            </div>
                        </div>
                    </section>

                    <section data-tab-panel="seo" class="setting-panel hidden rounded-md border bg-white p-4">
                        <h2 class="text-lg font-bold">SEO</h2>
                        <div class="mt-4 grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Meta title</label>
                                <input type="text" name="seo-title" value="{{ $value('seo-title') }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Meta description</label>
                                <textarea name="seo-description" rows="4" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('seo-description') }}</textarea>
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Meta keywords</label>
                                <textarea name="seo-keywords" rows="3" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('seo-keywords') }}</textarea>
                            </div>
                        </div>
                    </section>

                    <section data-tab-panel="hero" class="setting-panel hidden rounded-md border bg-white p-4">
                        <h2 class="text-lg font-bold">Hero</h2>
                        <div class="mt-4 grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Hero title</label>
                                <textarea name="site-hero-title" rows="3" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('site-hero-title') }}</textarea>
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Hero subtitle</label>
                                <textarea name="site-hero-subtitle" rows="4" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('site-hero-subtitle') }}</textarea>
                            </div>
                        </div>
                    </section>

                    <section data-tab-panel="about" class="setting-panel hidden rounded-md border bg-white p-4">
                        <h2 class="text-lg font-bold">Tentang Perusahaan</h2>
                        <div class="mt-4 grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Judul tentang</label>
                                <textarea name="site-about-title" rows="3" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('site-about-title') }}</textarea>
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Konten tentang</label>
                                <textarea name="site-about-body" rows="8" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('site-about-body') }}</textarea>
                            </div>
                        </div>
                    </section>

                    <section data-tab-panel="vision" class="setting-panel hidden rounded-md border bg-white p-4">
                        <h2 class="text-lg font-bold">Visi & Misi</h2>
                        <div class="mt-4 grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Visi</label>
                                <textarea name="site-vision" rows="4" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('site-vision') }}</textarea>
                            </div>
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="col-span-12">
                                    <label class="block text-sm font-medium leading-6 text-c0-900">Misi {{ $i }}</label>
                                    <textarea name="site-mission-{{ $i }}" rows="2" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('site-mission-' . $i) }}</textarea>
                                </div>
                            @endfor
                        </div>
                    </section>

                    <section data-tab-panel="contact" class="setting-panel hidden rounded-md border bg-white p-4">
                        <h2 class="text-lg font-bold">Kontak & Sosial Media</h2>
                        <div class="mt-4 grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Alamat</label>
                                <textarea name="site-contact-address" rows="3" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ $value('site-contact-address') }}</textarea>
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Telepon</label>
                                <input type="text" name="site-contact-phone" value="{{ $value('site-contact-phone') }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Email</label>
                                <input type="text" name="site-contact-email" value="{{ $value('site-contact-email') }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Jam layanan</label>
                                <input type="text" name="site-contact-hours" value="{{ $value('site-contact-hours') }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            </div>
                            <div class="col-span-12 md:col-span-4">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Facebook</label>
                                <input type="text" name="site-social-facebook" value="{{ $value('site-social-facebook') }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            </div>
                            <div class="col-span-12 md:col-span-4">
                                <label class="block text-sm font-medium leading-6 text-c0-900">Instagram</label>
                                <input type="text" name="site-social-instagram" value="{{ $value('site-social-instagram') }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            </div>
                            <div class="col-span-12 md:col-span-4">
                                <label class="block text-sm font-medium leading-6 text-c0-900">LinkedIn</label>
                                <input type="text" name="site-social-linkedin" value="{{ $value('site-social-linkedin') }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-c0-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            </div>
                        </div>
                    </section>
                </div>

                <aside class="col-span-12 lg:col-span-3">
                    <div class="sticky top-20 space-y-4">
                        <div class="rounded-md border bg-white">
                            <div class="border-b p-4">
                                <div class="text-lg font-bold">Action</div>
                            </div>
                            <div class="flex justify-end p-4">
                                <button type="submit" class="btn-save inline-flex h-10 items-center gap-x-2 rounded bg-c1-500 px-3 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-c1-600">
                                    <span class="h-5 w-5 shrink-0">
                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M48 96l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-245.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3L448 416c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96C0 60.7 28.7 32 64 32l245.5 0c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8L320 184c0 13.3-10.7 24-24 24l-192 0c-13.3 0-24-10.7-24-24L80 80 64 80c-8.8 0-16 7.2-16 16zm80-16l0 80 144 0 0-80L128 80zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"></path></svg>
                                    </span>
                                    Save Settings
                                </button>
                            </div>
                        </div>

                        @foreach (['app-logo' => 'Logo Website', 'app-icon' => 'Favicon/Icon', 'site-hero-image' => 'Hero Image', 'seo-og-image' => 'OG Image'] as $slug => $label)
                            <?php $imageId = $value($slug, ''); $imageUrl = $mediaUrl($slug); ?>
                            <div class="rounded-md border bg-white">
                                <div class="border-b p-4">
                                    <div class="text-lg font-bold">{{ $label }}</div>
                                </div>
                                <div class="p-4">
                                    <div class="media box-image space-y-2">
                                        <div class="w-full">
                                            <div class="btn-open-media {{ $imageId ? 'hidden' : '' }} relative flex h-40 cursor-pointer items-center justify-center rounded-md bg-c0-100 transition hover:bg-c0-200">
                                                <div class="text-center text-sm font-semibold text-c0-500">Upload media</div>
                                            </div>

                                            <div class="image {{ $imageId ? '' : 'hidden' }}">
                                                <div class="h-40 overflow-hidden rounded-md bg-c0-100">
                                                    <img src="{{ $imageUrl }}" class="h-full w-full object-cover">
                                                    <input type="hidden" name="{{ $slug }}" value="{{ $imageId ?: 0 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-remove-image {{ $imageId ? '' : 'hidden' }} cursor-pointer text-sm text-c1-500 underline hover:text-c1-700">Remove image</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </aside>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $('.btn-setting-tab').on('click', function() {
            let target = $(this).attr('data-tab-target');

            $('.btn-setting-tab').removeClass('bg-c1-50 text-c1-700').addClass('text-c0-600');
            $(this).addClass('bg-c1-50 text-c1-700').removeClass('text-c0-600');

            $('.setting-panel').addClass('hidden');
            $('[data-tab-panel="' + target + '"]').removeClass('hidden');
        });
    </script>
@endsection
