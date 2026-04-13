<div id="modal-kriteria" class="modal relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 w-full text-center sm:mt-0 sm:text-left space-y-3">
                        <div class="flex gap-2 items-center w-full justify-between">
                            <h3 class="text-xl font-semibold text-gray-900" id="modal-title">Upload Excel</h3>
                            <a download href="{{ home_url() }}/assets/packages/admin/template/template-kriteria.xlsx?{{ time() }}"
                                class="group h-8 w-auto shrink-0 rounded font-semibold px-3 py-2 cursor-pointer text-c1-500 hover:text-c1-900 border border-c1-500 hover:border-c1-900 shadow-sm hover:shadow-base transition duration-300 inline-flex gap-x-1 justify-between items-center">
                                <div class="whitespace-nowrap text-xs sm:text-sm font-medium tracking-normal">
                                    Download template
                                </div>
                            </a>
                        </div>
                        <div class="mt-2">
                            <form method="POST" action="{{ route('admin-kriteria-upload-store') }}" enctype="multipart/form-data" class="grid gap-4 grid-cols-12">
                                @csrf
                                <div class="col-span-12">
                                    <div class="flex items-center justify-center w-full">
                                        <label for="file-excel"
                                            class="flex flex-col items-center justify-center w-full h-64 bg-neutral-secondary-medium border border-dashed border-default-strong rounded-base cursor-pointer hover:bg-neutral-tertiary-medium">
                                            <div class="flex flex-col items-center justify-center text-body pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                                                </svg>
                                                <p class="mb-2 text-sm"><span class="font-semibold">Click to
                                                        upload</span></p>
                                                <p class="mb-2 text-sm"><span
                                                        class="file-name-excel font-semibold text-c1-500"></span>
                                                </p>
                                            </div>
                                            <input id="file-excel" name="file_excel" type="file" class="hidden" />
                                        </label>
                                    </div>
                                    @if ($errors->has('file_excel'))
                                        <p class="mt-1 text-xs text-red-600">{{ $errors->get('file_excel')[0] }}
                                        </p>
                                    @endif
                                </div>





                                <div class="col-span-12">
                                    <div class="flex justify-end gap-2 items-center">
                                        <button type="button"
                                            class="btn-remove-modal-kriteria mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                        <button type="submit" name="inp_save_kriteria"
                                            class="group h-10 w-auto shrink-0 rounded-lg font-semibold px-3 py-2 cursor-pointer text-white bg-c1-500 border hover:border-c1-400 shadow-sm hover:shadow-base transition duration-300 inline-flex gap-x-1 justify-between items-center">
                                            <svg class="h-5 w-6 shrink-0 mr-1" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path
                                                    d="M288 109.3L288 352c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-242.7-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352l128 0c0 35.3 28.7 64 64 64s64-28.7 64-64l128 0c35.3 0 64 28.7 64 64l0 32c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64l0-32c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z">
                                                </path>
                                            </svg>
                                            <span
                                                class="whitespace-nowrap text-xs sm:text-sm font-medium tracking-normal">
                                                Upload
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
