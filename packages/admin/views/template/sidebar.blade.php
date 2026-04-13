<div class="sidebar-mobile relative z-50 hidden lg:hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-c0-900/80" aria-hidden="true"></div>

    <div class="fixed inset-0 flex">
        <div class="relative mr-16 flex w-full max-w-xs flex-1">
            <div class="absolute top-0 left-full flex w-16 justify-center pt-5">
                <button type="button" class="toogle-sidebar -m-2.5 p-2.5">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-c1-600 px-6 pb-4 scrollbar-thin">
                <div class="flex h-16 shrink-0 items-center">
                    <h1 class="font-medium text-white text-xl">
                        <a href="{{ home_url() }}" target="_blank">{{ Helper::setting('app-name') }}</a>
                    </h1>
                </div>

                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">

                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <a href="{{ route('admin-dashboard') }}"
                                        class="{{ URI::segment(2, 'dashboard') == 'dashboard' ? 'bg-c1-700 text-white' : 'text-c1-200' }} group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold hover:bg-c1-700 hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @php

                            $labels = Helper::sidebar();

                            $permissions = array_column(Auth::user()->role->permissions, 'menu_id');

                        @endphp

                        @if ($labels)

                            @foreach ($labels as $k_label => $v_label)
                                @php

                                    $lable_name = $v_label->name;
                                    $menus = $v_label->menus;

                                @endphp

                                <li>
                                    <div class="text-xs/6 font-semibold text-c0-200">{{ $lable_name }}</div>
                                    <ul role="list" class="-mx-2 mt-2 space-y-1">

                                        @if ($menus)
                                            @foreach ($menus as $k_me => $v_me)
                                                @php
                                                    $me_id = $v_me->id;
                                                    $me_name = $v_me->name;
                                                    $me_icon = $v_me->icon;
                                                    $me_slug = $v_me->slug;
                                                @endphp

                                                @if (in_array($me_id, $permissions) || Auth::user()->role->slug == 'administrator')
                                                    <li>
                                                        <a href="{{ route('admin-' . $me_slug) }}"
                                                            class="{{ URI::segment(2, 'dashboard') == $me_slug ? 'bg-c1-700 text-white' : 'text-c1-200' }} group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold hover:bg-c1-700 hover:text-white">
                                                            {!! $me_icon !!}
                                                            {{ $me_name }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif

                                    </ul>
                                </li>
                            @endforeach

                        @endif



                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>

<!-- Static sidebar for desktop -->
<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-c1-600 px-6 pb-4 scrollbar-thin">
        <div class="flex mt-4 shrink-0 items-center">
            <div class="font-medium text-white text-xl">
                <a href="{{ home_url() }}" target="_blank">{{ Helper::setting('app-name') }}</a>
            </div>
        </div>

        <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">

                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        <li>
                            <a href="{{ route('admin-dashboard') }}"
                                class="{{ URI::segment(2, 'dashboard') == 'dashboard' ? 'bg-c1-700 text-white' : 'text-c1-200' }} group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold hover:bg-c1-700 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                    </ul>
                </li>

                @php

                    $labels = Helper::sidebar();

                    $permissions = array_column(Auth::user()->role->permissions, 'menu_id');

                @endphp

                @if ($labels)

                    @foreach ($labels as $k_label => $v_label)
                        @php

                            $lable_name = $v_label->name;
                            $menus = $v_label->menus;

                        @endphp

                        <li>
                            <div class="text-xs/6 font-semibold text-c0-200">{{ $lable_name }}</div>
                            <ul role="list" class="-mx-2 mt-2 space-y-1">

                                @if ($menus)
                                    @foreach ($menus as $k_me => $v_me)
                                        @php
                                            $me_id = $v_me->id;
                                            $me_name = $v_me->name;
                                            $me_icon = $v_me->icon;
                                            $me_slug = $v_me->slug;
                                        @endphp

                                        @if (in_array($me_id, $permissions) || Auth::user()->role->slug == 'administrator')
                                            <li>
                                                <a href="{{ route('admin-' . $me_slug) }}"
                                                    class="{{ URI::segment(2, 'dashboard') == $me_slug ? 'bg-c1-700 text-white' : 'text-c1-200' }} group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold hover:bg-c1-700 hover:text-white">
                                                    {!! $me_icon !!}
                                                    {{ $me_name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif

                            </ul>
                        </li>
                    @endforeach

                @endif



            </ul>
        </nav>


    </div>
</div>
