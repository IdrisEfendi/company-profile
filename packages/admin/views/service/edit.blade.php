@layout('admin::template.master')

@section('title', 'Edit Layanan')

@php
    $service_id = $service->id;
@endphp

@section('content')
    <div class="space-y-4">
        <div class="flex items-center justify-between gap-4">
            <h1 class="text-2xl font-medium">Edit Layanan</h1>
            <a href="{{ route('admin-service') }}" class="inline-flex h-9 items-center rounded border border-c1-500 px-3 text-sm font-semibold text-c1-600 hover:border-c1-700 hover:text-c1-800">Kembali</a>
        </div>

        @include('admin::template.components.alert')

        <form action="{{ route('admin-service-update', ['id' => $service_id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-8">
                    <div class="grid grid-cols-12 gap-4 rounded-md border bg-white p-4">
                        <div class="col-span-12 md:col-span-8">
                            <label for="title" class="block text-sm font-medium leading-6 text-c0-900">Judul <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="title" value="{{ old('title') ?? $service->title }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            @if ($errors->has('title'))
                                <p class="mt-1 text-xs text-red-600">{{ $errors->get('title')[0] }}</p>
                            @endif
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <label for="slug" class="block text-sm font-medium leading-6 text-c0-900">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') ?? $service->slug }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                            @if ($errors->has('slug'))
                                <p class="mt-1 text-xs text-red-600">{{ $errors->get('slug')[0] }}</p>
                            @endif
                        </div>
                        <div class="col-span-12">
                            <label for="description" class="block text-sm font-medium leading-6 text-c0-900">Deskripsi</label>
                            <textarea name="description" id="description" rows="7" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">{{ old('description') ?? $service->description }}</textarea>
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <label for="sort_order" class="block text-sm font-medium leading-6 text-c0-900">Urutan</label>
                            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order') ?? $service->sort_order }}" class="mt-1 block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                        </div>
                        <div class="col-span-12 md:col-span-8">
                            <label class="mt-8 flex items-center gap-2 text-sm font-semibold text-c0-900">
                                <input type="checkbox" name="is_active" value="1" {{ (old('is_active') ?? $service->is_active) ? 'checked' : '' }} class="rounded border-c0-300 text-c1-600 focus:ring-c1-600">
                                Tampilkan di frontend
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 md:col-span-4">
                    <div class="sticky top-20 rounded-md border bg-white">
                        <div class="border-b p-4">
                            <div class="text-lg font-bold">Action</div>
                        </div>
                        <div class="flex justify-end p-4">
                            <button type="submit" class="btn-save inline-flex h-10 items-center rounded bg-c1-500 px-3 text-sm font-semibold text-white hover:bg-c1-600">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection
