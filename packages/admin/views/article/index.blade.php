@layout('admin::template.master')

@section('title', 'Artikel')

@section('content')
    <div class="space-y-4">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-medium">Artikel</h1>
                <p class="mt-1 text-sm text-c0-500">Kelola artikel yang tampil di company profile.</p>
            </div>
            <a href="{{ route('admin-article-create') }}"
                class="inline-flex h-9 items-center justify-center rounded border border-c1-500 px-3 text-sm font-semibold text-c1-600 hover:border-c1-700 hover:text-c1-800">
                Add Artikel
            </a>
        </div>

        @include('admin::template.components.alert')

        <div class="flow-root">
            <div class="mb-3 flex justify-end">
                <form method="GET" class="w-full sm:w-auto">
                    <div class="flex gap-3">
                        <input type="search" name="s" value="{{ Input::get('s') ?? '' }}" autocomplete="off"
                            placeholder="Cari artikel"
                            class="block w-full min-w-0 rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-c0-400 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:w-72 sm:text-sm">
                        <button
                            class="inline-flex h-9 shrink-0 items-center rounded border border-c1-500 px-3 text-sm font-semibold text-c1-600 hover:border-c1-700 hover:text-c1-800">Search</button>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto rounded-sm border border-c0-300 bg-white scrollbar-thin">
                <table class="min-w-[920px] w-full table-fixed">
                    <colgroup>
                        <col class="w-14">
                        <col>
                        <col class="w-64">
                        <col class="w-28">
                        <col class="w-24">
                        <col class="w-24">
                    </colgroup>
                    <thead class="bg-c1-600">
                        <tr>
                            <th scope="col" class="px-3 py-2 text-center text-xs font-semibold text-white">No.</th>
                            <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-white">Judul</th>
                            <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-white">Slug</th>
                            <th scope="col" class="px-3 py-2 text-center text-xs font-semibold text-white">Status</th>
                            <th scope="col" class="px-3 py-2 text-center text-xs font-semibold text-white">Tampil</th>
                            <th scope="col" class="px-3 py-2 text-center text-xs font-semibold text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-c0-200">
                        @php
                            $no = $page * $per_page - $per_page;
                        @endphp

                        @forelse ($results as $article)
                            @php
                                $no++;
                            @endphp
                            <tr class="bg-white hover:bg-c0-50">
                                <td class="px-3 py-3 text-center text-xs text-c0-700">{{ $no }}</td>
                                <td class="px-3 py-3 text-xs text-c0-700">
                                    <div class="line-clamp-1 font-semibold text-c0-900">{{ $article->title }}</div>
                                    <div class="mt-1 line-clamp-2 text-c0-500">{{ $article->excerpt }}</div>
                                </td>
                                <td class="px-3 py-3 text-xs text-c0-700">
                                    <div class="truncate" title="{{ $article->slug }}">{{ $article->slug }}</div>
                                </td>
                                <td class="px-3 py-3 text-center text-xs">
                                    @if ($article->status == 'published')
                                        <span class="inline-flex min-w-20 justify-center rounded bg-green-50 px-2 py-1 font-semibold text-green-700">Published</span>
                                    @else
                                        <span class="inline-flex min-w-20 justify-center rounded bg-c0-100 px-2 py-1 font-semibold text-c0-600">Draft</span>
                                    @endif
                                </td>
                                <td class="px-3 py-3 text-center text-xs">
                                    @if ($article->is_active)
                                        <span class="inline-flex min-w-14 justify-center rounded bg-green-50 px-2 py-1 font-semibold text-green-700">Ya</span>
                                    @else
                                        <span class="inline-flex min-w-14 justify-center rounded bg-c0-100 px-2 py-1 font-semibold text-c0-600">Tidak</span>
                                    @endif
                                </td>
                                <td class="px-3 py-3 text-center text-xs text-c0-700">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <a href="{{ route('admin-article-edit', ['id' => $article->id]) }}"
                                            title="Edit artikel"
                                            class="inline-flex h-7 w-7 items-center justify-center rounded-sm bg-green-600 text-white hover:bg-green-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10">
                                                </path>
                                            </svg>
                                        </a>
                                        <form class="form-delete flex items-center" method="POST"
                                            action="{{ route('admin-article-destroy', ['id' => $article->id]) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" title="Delete artikel"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-sm bg-red-600 text-white hover:bg-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-4 w-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-3 py-10 text-center text-sm text-c0-500">
                                    Belum ada artikel.
                                </td>
                            </tr>
                        @endforelse
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
