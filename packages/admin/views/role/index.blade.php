@layout('admin::template.master')

@section('title', 'Role')

@section('content')

    <div class="space-y-4">
        <div>
            <div class="flex gap-4 items-center">
                <h1 class="text-2xl font-medium">Roles</h1>
                <div
                    class="group h-8 w-auto shrink-0 rounded font-semibold px-3 py-2 cursor-pointer text-c1-500 hover:text-c1-900 border border-c1-500 hover:border-c1-900 shadow-sm hover:shadow-base transition duration-300 inline-flex gap-x-1 justify-between items-center">
                    <a href="{{ route('admin-role-create') }}"
                        class="whitespace-nowrap text-xs sm:text-sm font-medium tracking-normal">
                        Add Role
                    </a>
                </div>
            </div>
        </div>

        @include('admin::template.components.alert')

        <div class="flow-root">
            <div class="flex justify-end mb-2">
                <form method="GET">
                    <div class="flex gap-4 items-center">
                        <div>
                            <input type="search" name="s" value="{{ Input::get('s') ?? '' }}" autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-c0-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-c0-400 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm">
                        </div>

                        <button
                            class="group h-8 w-auto shrink-0 rounded font-semibold px-3 py-2 cursor-pointer text-c1-500 hover:text-c1-900 border border-c1-500 hover:border-c1-900 shadow-sm hover:shadow-base transition duration-300 inline-flex gap-x-1 justify-between items-center">
                            <span class="whitespace-nowrap text-xs sm:text-sm font-medium tracking-normal">Search</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="align-middle">
                <div class="overflow-y-auto md:rounded-sm overflow-x-auto scrollbar-thin">
                    <table class="w-full">
                        <thead class="bg-c1-600">
                            <tr>
                                <th scope="col" class="px-2.5 py-2 text-left text-xs font-semibold text-white">No.</th>
                                <th scope="col" class="px-2.5 py-2 text-left text-xs font-semibold text-white">
                                    <div class="flex gap-1.5 items-center">
                                        <span class="inline-block">Name</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-2.5 py-2 text-left text-xs font-semibold text-white">
                                    <div class="flex gap-1.5 items-center">
                                        <span class="inline-block">Slug</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-2.5 py-2 text-left text-xs font-semibold text-white">
                                    <div class="flex gap-1.5 items-center">
                                        <span class="inline-block">Count</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-2.5 py-2 text-left text-xs font-semibold text-white">
                                    <div class="flex gap-1.5 items-center">
                                        <span class="inline-block whitespace-nowrap">Created at</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-2.5 py-2 text-left text-xs font-semibold text-white">
                                    <div class="flex gap-1.5 items-center">
                                        <span class="inline-block whitespace-nowrap">Updated at</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-2 text-left text-xs font-semibold text-white text-center">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="border border-c0-300">

                            @php

                                $no = $page * $per_page - $per_page;

                            @endphp

                            @foreach ($results as $k_role => $v_role)
                                @php
                                    $no++;
                                    $role_id = $v_role->id;
                                    $name = $v_role->name;
                                    $slug = $v_role->slug;
                                    $count = $v_role->count;
                                    $created_at = $v_role->created_at;
                                    $updated_at = $v_role->updated_at;
                                @endphp
                                <tr class="even:bg-c0-100 odd:bg-white">
                                    <td class="text-center px-2.5 py-2 text-xs text-c0-700">
                                        <div class="flex gap-2 items-center justify-center">
                                            <span class="no">{{ $no }}</span>
                                        </div>
                                    </td>
                                    <td class="px-2.5 py-2 text-xs text-c0-700 w-full">
                                        <span>{{ $name }}</span>
                                    </td>
                                    <td class="px-2.5 py-2 text-xs text-c0-700 whitespace-nowrap">
                                        <span>{{ $slug }}</span>
                                    </td>
                                    <td class="px-2.5 py-2 text-xs text-c0-700 whitespace-nowrap text-center">
                                        <span>{{ $count }}</span>
                                    </td>
                                    <td class="px-2.5 py-2 text-xs text-c0-700 whitespace-nowrap">
                                        <span>{{ $created_at }}</span>
                                    </td>
                                    <td class="px-2.5 py-2 text-xs text-c0-700 whitespace-nowrap">
                                        <span>{{ $updated_at }}</span>
                                    </td>
                                    <td class="action px-2.5 py-2 text-xs text-c0-700 text-center">
                                        <div class="flex gap-1.5 items-center justify-center w-full">
                                            <a href="{{ route('admin-role-edit', ['id' => $role_id]) }}" title="Edit role"
                                                class="text-white inline-block px-1.5 py-1 rounded-sm bg-green-600 hover:bg-green-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10">
                                                    </path>
                                                </svg>
                                            </a>
                                            <form class="flex items-center form-delete" method="POST"
                                                action="{{ route('admin-role-destroy', ['id' => $role_id]) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" title="Delete role"
                                                    class="text-white inline-block px-1.5
                                                    py-1 rounded-sm bg-red-600 hover:bg-red-700">
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
                            @endforeach

                        </tbody>
                    </table>

                </div>

                <div class="w-full">
                    @include('admin::template.components.pagination')
                </div>
            </div>
        </div>
    </div>

@section('script')
@endsection

@endsection
