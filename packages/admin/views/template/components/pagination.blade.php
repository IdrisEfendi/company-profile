<div class="flex items-center justify-between border-t border-c0-200 px-4 py-3 sm:px-6">
    <div class="flex flex-1 justify-between sm:hidden">
        <a href="#"
            class="relative inline-flex items-center rounded-md border border-c0-300 bg-white px-4 py-2 text-sm font-medium text-c0-700 hover:bg-c0-50">Previous</a>
        <a href="#"
            class="relative ml-3 inline-flex items-center rounded-md border border-c0-300 bg-white px-4 py-2 text-sm font-medium text-c0-700 hover:bg-c0-50">Next</a>
    </div>
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-c0-700">
                Showing
                <span class="font-medium">
                    {{ ($page - 1) * $per_page + 1 }}
                </span>
                to
                <span class="font-medium">
                    {{ min($page * $per_page, $total_rows) }}
                </span>
                of
                <span class="font-medium">
                    {{ number_format($total_rows, 0, ",", ".") }}
                </span>
                results
            </p>
        </div>
        <div>

            @if (ceil($total_rows / $per_page) > 0)
                <nav aria-label="Pagination " class="flex items-center">
                    @if ($page > 1)
                        <a href="{{ replace_url_get_params(URL::full(), 'page', ($page - 1)) }}"
                            class="prev inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-xs font-medium text-c0-500 hover:border-c0-300 hover:text-c0-700">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @endif

                    @if ($page > 3)
                        <a href="{{ replace_url_get_params(URL::full(), 'page', 1) }}"
                            class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-xs font-medium text-c0-500 hover:border-c0-300 hover:text-c0-700">1</a>
                        <span
                            class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-xs font-medium text-c0-500 hover:border-c0-300 hover:text-c0-700">...</span>
                    @endif

                    @if ($page - 2 > 0)
                        <a href="{{ replace_url_get_params(URL::full(), 'page', ($page - 2)) }}"
                            class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-xs font-medium text-c0-500 hover:border-c0-300 hover:text-c0-700">{{ $page - 2 }}</a>
                    @endif
                    @if ($page - 1 > 0)
                        <a href="{{ replace_url_get_params(URL::full(), 'page', ($page - 1)) }}"
                            class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-xs font-medium text-c0-500 hover:border-c0-300 hover:text-c0-700">{{ $page - 1 }}</a>
                    @endif

                    <a href="{{ replace_url_get_params(URL::full(), 'page', $page) }}" aria-current="page"
                        class="inline-flex items-center border-t-2 border-c1-500 px-4 pt-4 text-xs font-medium text-c1-600">{{ $page }}</a>

                    @if ($page + 1 < ceil($total_rows / $per_page) + 1)
                        <a href="{{ replace_url_get_params(URL::full(), 'page', ($page + 1)) }}"
                            class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-xs font-medium text-c0-500 hover:border-c0-300 hover:text-c0-700">{{ $page + 1 }}</a>
                    @endif
                    @if ($page + 2 < ceil($total_rows / $per_page) + 1)
                        <a href="{{ replace_url_get_params(URL::full(), 'page', ($page + 2)) }}"
                            class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-xs font-medium text-c0-500 hover:border-c0-300 hover:text-c0-700">{{ $page + 2 }}</a>
                    @endif

                    @if ($page < ceil($total_rows / $per_page) - 2)
                        <span
                            class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-xs font-medium text-c0-500 hover:border-c0-300 hover:text-c0-700">...</span>
                        <a href="{{ replace_url_get_params(URL::full(), 'page', ceil($total_rows / $per_page)) }}"
                            class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-xs font-medium text-c0-500 hover:border-c0-300 hover:text-c0-700">{{ ceil($total_rows / $per_page) }}</a>
                    @endif
                    @if ($page < ceil($total_rows / $per_page))
                        <a href="{{ replace_url_get_params(URL::full(), 'page', ($page + 1)) }}"
                            class="next inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-xs font-medium text-c0-500 hover:border-c0-300 hover:text-c0-700">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @endif
                </nav>
            @endif

        </div>
    </div>
</div>
