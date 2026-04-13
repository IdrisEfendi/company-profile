<div class="relative z-50" id="modal-media">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10">
        <div class="w-full h-screen p-6">
            <div class="bg-white w-full h-full p-6 rounded-lg">
                <div class="container-media h-full flex flex-col gap-4 justify-between">

                    <div class="flex gap-2 items-center justify-between">
                        <div class="flex gap-4 items-center">
                            <h1 class="text-2xl font-medium">Media</h1>
                            <div class="group h-8 w-auto shrink-0 rounded font-semibold px-3 py-2 cursor-pointer text-indigo-500 hover:text-indigo-900 border border-indigo-500 hover:border-indigo-900 shadow-sm hover:shadow-base transition duration-300 inline-flex gap-x-1 justify-between items-center">
                                <button class="btn-create-media whitespace-nowrap text-xs sm:text-sm font-medium tracking-normal">
                                    Add Media
                                </button>
                            </div>
                        </div>
                        <div>
                            <span class="btn-close-media hover:bg-indigo-700 cursor-pointer block rounded-full bg-indigo-600 text-white p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center w-full justify-end">
                        <form action="" method="POST">
                            <div class="flex gap-4 items-center">
                                <div>
                                    <input type="search" name="s" value="" id="search_media" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                </div>

                                <button type="button" class="group h-8 w-auto shrink-0 rounded font-semibold px-3 py-2 cursor-pointer text-indigo-500 hover:text-indigo-900 border border-indigo-500 hover:border-indigo-900 shadow-sm hover:shadow-base transition duration-300 inline-flex gap-x-1 justify-between items-center">
                                    <span class="whitespace-nowrap text-xs sm:text-sm font-medium tracking-normal">Search</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="img h-full sm:flex w-full gap-4 overflow-y-auto sm:overflow-hidden">
                        <div class="w-full h-full flex flex-col gap-4">
                            <div class="h-full overflow-hidden">
                                <div class="flex flex-col h-full scrollbar-thin overflow-y-auto pr-4">
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
                                                            <span class="btn-detail-media cursor-pointer text-c1-500 hover:text-c1-600">
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
                                                            <span class="btn-set-media cursor-pointer text-c1-500 hover:text-c1-600">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-camera-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 20h-7a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v3.5" /><path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M19 16v6" /><path d="M22 19l-3 3l-3 -3" /></svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
