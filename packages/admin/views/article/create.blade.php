@layout('admin::template.master')

@section('title', 'Tambah Artikel')

@section('trumbowyg-style')
    @include('admin::template.trumbowyg-style')
@endsection

@section('content')
    <div class="space-y-4">
        <div class="flex items-center justify-between gap-4">
            <h1 class="text-2xl font-medium">Tambah Artikel</h1>
            <a href="{{ route('admin-article') }}"
                class="inline-flex h-9 items-center rounded border border-c1-500 px-3 text-sm font-semibold text-c1-600 hover:border-c1-700 hover:text-c1-800">Kembali</a>
        </div>

        @include('admin::template.components.alert')

        <form action="{{ route('admin-article-store') }}" method="post">
            @csrf
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-8">
                    <div class="grid grid-cols-12 gap-4 rounded-md border bg-white p-4">
                        <div class="col-span-12 md:col-span-8">
                            <label for="title" class="block text-sm font-medium leading-6 text-c0-900">Judul <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="title" id="title" value="{{ old('title') ?? '' }}"
                                class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            @if ($errors->has('title'))
                                <p class="mt-1 text-xs text-red-600">{{ $errors->get('title')[0] }}</p>
                            @endif
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <label for="slug" class="block text-sm font-medium leading-6 text-c0-900">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') ?? '' }}"
                                class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            @if ($errors->has('slug'))
                                <p class="mt-1 text-xs text-red-600">{{ $errors->get('slug')[0] }}</p>
                            @endif
                        </div>
                        <div class="col-span-12">
                            <label for="excerpt" class="block text-sm font-medium leading-6 text-c0-900">Ringkasan</label>
                            <textarea name="excerpt" id="excerpt" rows="3"
                                class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ old('excerpt') ?? '' }}</textarea>
                        </div>
                        <div class="col-span-12">
                            <label for="content" class="block text-sm font-medium leading-6 text-c0-900">Konten <span
                                    class="text-red-500">*</span></label>
                            <textarea name="content" id="content" rows="12"
                                class="trumbowyg-editor mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ old('content') ?? '' }}</textarea>
                            @if ($errors->has('content'))
                                <p class="mt-1 text-xs text-red-600">{{ $errors->get('content')[0] }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-span-12 md:col-span-4">
                    <div class="sticky top-20 flex flex-col gap-4">


                        <div class="bg-white rounded-md border">
                            <div class="border-b p-4">
                                <div class="text-lg font-bold">
                                    Action
                                </div>
                            </div>
                            <div class="space-y-4 p-4">
                                <div>
                                    <label for="status"
                                        class="block text-sm font-medium leading-6 text-c0-900">Status</label>
                                    <select name="status" id="status"
                                        class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                                        <option value="draft"
                                            {{ (old('status') ?? 'draft') == 'draft' ? 'selected' : '' }}>
                                            Draft</option>
                                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                            Published</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="published_at"
                                        class="block text-sm font-medium leading-6 text-c0-900">Tanggal
                                        Publish</label>
                                    <input type="datetime-local" name="published_at" id="published_at"
                                        value="{{ old('published_at') ?? '' }}"
                                        class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                                </div>
                                <label class="flex items-center gap-2 text-sm font-semibold text-c0-900">
                                    <input type="checkbox" name="is_active" value="1"
                                        {{ old('is_active') !== null ? 'checked' : 'checked' }}
                                        class="rounded border-c0-300 text-c1-600 focus:ring-c1-600">
                                    Tampilkan di frontend
                                </label>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="btn-save inline-flex h-10 items-center rounded bg-c1-500 px-3 text-sm font-semibold text-white hover:bg-c1-600">Save</button>
                                </div>
                            </div>
                        </div>


                        <div class="bg-white rounded-md border">
                            <div class="border-b p-4">
                                <div class="text-lg font-bold">
                                    Featured image
                                </div>
                            </div>

                            <div class="p-4 space-y-1">
                                <div class="media box-image col-span-12 lg:col-span-3 space-y-1">
                                    <div class="w-full h-full">
                                        <div
                                            class="btn-open-media relative group cursor-pointer duration-300 bg-gray-100 hover:bg-gray-200 rounded-md w-full h-full flex items-center justify-center max-h-40">
                                            <div class="flex flex-col items-center justify-center py-8 space-y-1">
                                                <div>
                                                    <svg class="text-gray-400 h-10 w-10" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path class="fa-secondary" opacity=".4"
                                                            d="M0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64L288 96c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32L64 32C28.7 32 0 60.7 0 96zM160 272c0-6.1 2.3-12.3 7-17l72-72c4.7-4.7 10.8-7 17-7s12.3 2.3 17 7l72 72c4.7 4.7 7 10.8 7 17s-2.3 12.3-7 17c-9.4 9.4-24.6 9.4-33.9 0l-31-31L280 360c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-102.1-31 31c-9.4 9.4-24.6 9.4-33.9 0c-4.7-4.7-7-10.8-7-17z">
                                                        </path>
                                                        <path class="fa-primary"
                                                            d="M256 384c13.3 0 24-10.7 24-24l0-102.1 31 31c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-72-72c-9.4-9.4-24.6-9.4-33.9 0l-72 72c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l31-31L232 360c0 13.3 10.7 24 24 24z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div
                                                    class="text-center text-sm font-semibold text-gray-500 group-hover:text-gray-700 duration-300">
                                                    Upload media
                                                </div>
                                            </div>
                                        </div>

                                        <div class="image hidden">
                                            <div class="w-full h-64 rounded-md overflow-hidden">
                                                <img src="" class="h-full w-full object-cover">
                                                <input type="hidden" name="image" value="0">
                                            </div>
                                        </div>

                                    </div>
                                    <div
                                        class="btn-remove-image hidden cursor-pointer hover:text-indigo-600 text-sm underline text-indigo-500">
                                        Remove image</div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('trumbowyg-script')
    @include('admin::template.trumbowyg-script')
@endsection

@section('script')
@endsection
