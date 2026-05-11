@layout('admin::template.master')

@section('title', 'Layanan Website')

@section('content')
    <div class="space-y-4">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-medium">Layanan Website</h1>
                <p class="mt-1 text-sm text-c0-500">Kelola produk dan layanan yang tampil di frontend.</p>
            </div>
            <a href="{{ route('admin-service-create') }}" class="inline-flex h-9 items-center justify-center rounded border border-c1-500 px-3 text-sm font-semibold text-c1-600 hover:border-c1-700 hover:text-c1-800">
                Add Layanan
            </a>
        </div>

        @include('admin::template.components.alert')

        <div class="flow-root">
            <div class="mb-2 flex justify-end">
                <form method="GET">
                    <div class="flex gap-3">
                        <input type="search" name="s" value="{{ Input::get('s') ?? '' }}" autocomplete="off" placeholder="Cari layanan" class="block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-c0-400 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                        <button class="inline-flex h-9 items-center rounded border border-c1-500 px-3 text-sm font-semibold text-c1-600 hover:border-c1-700 hover:text-c1-800">Search</button>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto md:rounded-sm">
                <table class="w-full">
                    <thead class="bg-c1-600">
                        <tr>
                            <th class="px-2.5 py-2 text-left text-xs font-semibold text-white">No.</th>
                            <th class="px-2.5 py-2 text-left text-xs font-semibold text-white">Judul</th>
                            <th class="px-2.5 py-2 text-left text-xs font-semibold text-white">Slug</th>
                            <th class="px-2.5 py-2 text-center text-xs font-semibold text-white">Urutan</th>
                            <th class="px-2.5 py-2 text-center text-xs font-semibold text-white">Status</th>
                            <th class="px-2.5 py-2 text-center text-xs font-semibold text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border border-c0-300">
                        @php
                            $no = $page * $per_page - $per_page;
                        @endphp

                        @foreach ($results as $service)
                            @php
                                $no++;
                            @endphp
                            <tr class="even:bg-c0-100 odd:bg-white">
                                <td class="px-2.5 py-2 text-center text-xs text-c0-700">{{ $no }}</td>
                                <td class="w-full px-2.5 py-2 text-xs text-c0-700">
                                    <div class="font-semibold text-c0-900">{{ $service->title }}</div>
                                    <div class="mt-1 line-clamp-2 max-w-3xl text-c0-500">{{ $service->description }}</div>
                                </td>
                                <td class="px-2.5 py-2 text-xs text-c0-700">{{ $service->slug }}</td>
                                <td class="px-2.5 py-2 text-center text-xs text-c0-700">{{ $service->sort_order }}</td>
                                <td class="px-2.5 py-2 text-center text-xs">
                                    @if ($service->is_active)
                                        <span class="inline-flex rounded bg-green-50 px-2 py-1 font-semibold text-green-700">Aktif</span>
                                    @else
                                        <span class="inline-flex rounded bg-c0-100 px-2 py-1 font-semibold text-c0-600">Draft</span>
                                    @endif
                                </td>
                                <td class="px-2.5 py-2 text-center text-xs text-c0-700">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <a href="{{ route('admin-service-edit', ['id' => $service->id]) }}" title="Edit layanan" class="inline-block rounded-sm bg-green-600 px-1.5 py-1 text-white hover:bg-green-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" /></svg>
                                        </a>
                                        <form class="form-delete flex items-center" method="POST" action="{{ route('admin-service-destroy', ['id' => $service->id]) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" title="Delete layanan" class="inline-block rounded-sm bg-red-600 px-1.5 py-1 text-white hover:bg-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="w-full">
                @include('admin::template.components.pagination')
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
