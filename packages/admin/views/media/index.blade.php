@layout('admin::template.master')

@section('title', 'Media')

@section('content')

    <div class="space-y-4">
        <div>
            <div class="flex gap-4 items-center">
                <h1 class="text-2xl font-medium">Medias</h1>
                <div
                    class="btn-create-media cursor-pointer group h-8 w-auto shrink-0 rounded font-semibold px-3 py-2 cursor-pointer text-c1-500 hover:text-c1-900 border border-c1-500 hover:border-c1-900 shadow-sm hover:shadow-base transition duration-300 inline-flex gap-x-1 justify-between items-center">
                    <div class="whitespace-nowrap text-xs sm:text-sm font-medium tracking-normal">
                        Add Media
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="flex items-center w-full justify-end">
                <form action="{{ route('admin-media') }}" method="GET">
                    <div class="flex gap-4 items-center">
                        <div>
                            <input type="search" name="s" id="search_media" value="{{ Input::get('s') ?? '' }}"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                        </div>

                        <button type="submit"
                            class="group h-8 w-auto shrink-0 rounded font-semibold px-3 py-2 cursor-pointer text-c1-500 hover:text-c1-900 border border-c1-500 hover:border-c1-900 shadow-sm hover:shadow-base transition duration-300 inline-flex gap-x-1 justify-between items-center">
                            <span class="whitespace-nowrap text-xs sm:text-sm font-medium tracking-normal">Search</span>
                        </button>
                    </div>
                </form>
            </div>

            <div class="media-list grid grid-cols-12 gap-4">
                @foreach ($medias as $k_media => $v_media)
                    @php
                        $media_id = $v_media->id;
                        $guid = $v_media->guid;
                        $title = $v_media->title;
                    @endphp
                    <div class="media col-span-2">
                        <div class="border rounded-lg overflow-hidden relative group">
                            <img data-media-id="{{ $media_id }}" class="text-transparent object-cover w-full h-36"
                                src="{{ $guid }}" alt="{{ $title }}">
                            <div class="hidden group-hover:block absolute inset-0 bg-c0-500 bg-opacity-25 transition duration-300 ease-in-out">
                                <div class="media-action flex items-center justify-center h-full gap-4">
                                    <span class="btn-detail-media cursor-pointer text-c1-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex items-center justify-center">
                <div class="space-y-2">
                    <div>
                        <p class="text-sm">Showing <span class="showing">{{ count($medias) }}</span> of <span
                                class="count-media">{{ $count }}</span> media items</p>
                    </div>
                    <div class="flex items-center gap-2 justify-center">
                        <button type="button" data-page="2"
                            class="btn-load-more-media inline-flex items-center gap-x-1.5 rounded-md bg-c1-600 px-2.5 py-1.5 text-sm font-medium text-white shadow-sm hover:bg-c1-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-c1-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-caret-down">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 10l6 6l6 -6h-12" />
                            </svg>
                            <span class="">Load more</span>
                        </button>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('script')

@endsection