@layout('admin::template.master')

@section('title', 'Menu')

@php

    $menu_id = $menu->id;
    $name = $menu->name;
    $slug = $menu->slug;
    $description = $menu->description;
    $label_id = $menu->label_id;
    $icon = $menu->icon;

@endphp

@section('content')

    <div class="space-y-4">
        <div>
            <div class="flex gap-4 items-center">
                <h1 class="text-2xl font-medium">Edit Menu</h1>
                <div
                    class="group h-8 w-auto shrink-0 rounded font-semibold px-3 py-2 cursor-pointer text-c1-500 hover:text-c1-900 border border-c1-500 hover:border-c1-900 shadow-sm hover:shadow-base transition duration-300 inline-flex gap-x-1 justify-between items-center">
                    <a href="{{ route('admin-menu-create') }}"
                        class="whitespace-nowrap text-xs sm:text-sm font-medium tracking-normal">
                        Add Menu
                    </a>
                </div>
            </div>
        </div>

        @include('admin::template.components.alert')

        <form action="{{ route('admin-menu-update', ['id' => $menu_id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="space-y-12">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 md:col-span-8">
                        <div class="grid grid-cols-12 gap-x-6 gap-y-2 border rounded-md p-4 bg-white">
                            <div class="col-span-6">
                                <label for="name" class="block text-sm font-medium leading-6 text-c0-900">Name <span class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <input type="text" name="name" id="name" autocomplete="off"
                                        value="{{ old('name') ?? $name }}" placeholder="Enter name"
                                        class="block w-full rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-c0-400 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm sm:leading-6">
                                    @if ($errors->has('name'))
                                        <p class="mt-1 text-xs text-red-600">{{ $errors->get('name')[0] }}</p>
                                    @endif
                                </div>

                            </div>

                            <div class="col-span-6">
                                <label for="slug" class="block text-sm font-medium leading-6 text-c0-900">Slug</label>
                                <div class="mt-1">
                                    <input type="text" name="slug" id="slug" autocomplete="off"
                                        value="{{ old('slug') ?? $slug }}" placeholder="Enter slug"
                                        class="block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-c0-400 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm sm:leading-6">
                                    @if ($errors->has('slug'))
                                        <p class="mt-1 text-xs text-red-600">{{ $errors->get('slug')[0] }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-span-6">
                                <label for="label" class="block text-sm font-medium leading-6 text-c0-900">Label</label>
                                <div class="mt-1">
                                    <select name="label" id="label" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-c0-400 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm sm:leading-6">
                                        <option value="" selected disabled>-Pilih-</option>
                                        @foreach ($labels as $label)
                                            <option value="{{ $label->id }}" {{ ($label_id == $label->id || old('label') == $label->id) ? 'selected' : '' }}>{{ $label->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('label'))
                                        <p class="mt-1 text-xs text-red-600">{{ $errors->get('label')[0] }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-span-6">
                                <label for="icon" class="block text-sm font-medium leading-6 text-c0-900">Icon</label>
                                <div class="mt-1">
                                    <textarea name="icon" id="icon" rows="4" placeholder="Enter icon" class="block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-c0-400 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm sm:leading-6">{{ old('icon') ?? $icon }}</textarea>

                                    @if ($errors->has('icon'))
                                        <p class="mt-1 text-xs text-red-600">{{ $errors->get('icon')[0] }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-span-12">
                                <label for="description" class="block text-sm font-medium leading-6 text-c0-900">Description</label>
                                <div class="mt-1">
                                    <textarea name="description" id="description" rows="4" placeholder="Enter description" class="block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-c0-400 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm sm:leading-6">{{ old('description') ?? $description }}</textarea>

                                    @if ($errors->has('description'))
                                        <p class="mt-1 text-xs text-red-600">{{ $errors->get('description')[0] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-4">
                        <div class="sticky top-20 flex flex-col gap-4">
                            <div class="bg-white rounded-md border">
                                <div class=" border-b  p-4 ">
                                    <div class="text-lg font-bold">
                                        Action
                                    </div>
                                </div>

                                <div class="p-4 space-y-4 flex justify-end">
                                    <button type="submit"
                                        class="btn-save group h-10 w-auto shrink-0 rounded font-semibold px-3 py-2 cursor-pointer text-white bg-c1-500 hover:bg-c1-600 shadow-sm hover:shadow-base transition duration-300 inline-flex gap-x-1 justify-between items-center">

                                        <span class="h-5 w-5 shrink-0">
                                            <svg fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path
                                                    d="M48 96l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-245.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3L448 416c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96C0 60.7 28.7 32 64 32l245.5 0c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8L320 184c0 13.3-10.7 24-24 24l-192 0c-13.3 0-24-10.7-24-24L80 80 64 80c-8.8 0-16 7.2-16 16zm80-16l0 80 144 0 0-80L128 80zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="whitespace-nowrap text-xs sm:text-sm font-medium tracking-normal">
                                            Save
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script')
@endsection
