$(document).ready(function () {

    console.log('Script admin ready!');

    let token = $('meta[name="csrf-token"]').attr('content');

    try {
        var urlHistoriStoreDec = urlHistoriStore ? atob(urlHistoriStore.replace('APP', '')) : undefined;
    } catch (error) { }

    try {
        var urlUploadKriteriaDec = urlUploadKriteria ? atob(urlUploadKriteria.replace('APP', '')) : undefined;
    } catch (error) { }

    try {
        var urlUploadKaryawanDec = urlUploadKaryawan ? atob(urlUploadKaryawan.replace('APP', '')) : undefined;
    } catch (error) { }

    window.loading = function (w = 5, h = 5) {

        return `<svg class="animate-spin w-${w} h-${h}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-loader-3"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9" /><path d="M17 12a5 5 0 1 0 -5 5" /></svg>`
    }

    $('html').on('click', '.link-blank', function () {
        var linkBlank = $(this).attr('data-link-blank');
        window.open(linkBlank, '_blank');
    });

    $('html').on('click', '.link-self', function () {
        var linkSelf = $(this).attr('data-link-self');
        $(location).attr('href', linkSelf);
    });

    $('html').on('click', '.link-blank-self', function () {
        var linkBlank = $(this).attr('data-link-blank');
        var linkSelf = $(this).attr('data-link-self');
        window.open(linkBlank, '_blank');
        $(location).attr('href', linkSelf);
    });

    $('html').on('click', '.btn-close-alert', function () {

        $(this).closest('.content-alert').remove();

    });

    $('html').on('click', 'button[type="submit"]', function () {

        $(this).find('span:eq(0)').empty().append(loading());

    });

    $('html').on('submit', '.form-delete', function (e) {
        e.preventDefault(); // cegah submit langsung

        let form = this;

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // jalankan submit form setelah konfirmasi
            }
        });
    });

    $('#user-menu-button').on('click', function () {

        $(this).parent().find('div[role="menu"]').toggleClass('hidden');

    });

    $('.btn-toggle-password').click(function (event) {

        let thisBtn = $(this);

        let type = thisBtn.parent().find('input').attr('type');

        if (type == 'password') {

            thisBtn.parent().find('input').attr('type', 'text');

            thisBtn.parent().find('span').empty().append(`
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5">
                                                                                              <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                                                        </svg>
                                                                                `);

        } else {

            thisBtn.parent().find('input').attr('type', 'password');

            thisBtn.parent().find('span').empty().append(`
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                                        </svg>
                                                                                `);

        }

    });

    $('[name="checked[]"]').change(function () {

        if ($(this).prop('checked')) {

            $(this).closest('.permissions').find('.permissions-child').prop('checked', true);

        } else {

            $(this).closest('.permissions').find('.permissions-child').prop('checked', false);

        }

    });

    $('.toogle-sidebar').on('click', function () {

        $('.sidebar-mobile').slideToggle();

    });

    $('.btn-save-history').on('click', function () {

        Swal.fire({
            title: 'Yakin ingin simpan histori?',
            text: "Data akan tersimpan di tabel histori!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {

                let histori = $('.box-seleksi').html();

                let formData = new FormData();
                formData.append('histori', histori);

                $.ajax({
                    type: "POST",
                    headers: { "X-CSRF-TOKEN": token },
                    url: urlHistoriStoreDec,
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) {

                        if (data.status) {

                            Swal.fire({
                                title: 'Success!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        }

                    },
                    error: function (msg) {

                        Swal.fire({
                            title: 'Error!',
                            text: msg,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });

                    }
                });

            }
        });



    });

    $('.btn-panduan').on('click', function () {
        $('.box-panduan').slideToggle();
    });

    $('.btn-upload-excel-kriteria').click(function () {
        $.ajax({
            type: "GET",
            url: urlUploadKriteriaDec,
            success: function (data) {

                if (data.status) {

                    $('#modal-kriteria').remove();

                    $('body').prepend(data.html);

                    $('body').addClass('h-screen overflow-hidden');

                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    $('html').on('click', '.btn-remove-modal-kriteria', function () {
        $('body').removeClass('h-screen overflow-hidden');
        $('#modal-kriteria').remove();
    });

    $('.btn-upload-excel-karyawan').click(function () {
        $.ajax({
            type: "GET",
            url: urlUploadKaryawanDec,
            success: function (data) {

                if (data.status) {

                    $('#modal-karyawan').remove();

                    $('body').prepend(data.html);

                    $('body').addClass('h-screen overflow-hidden');

                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    $('html').on('click', '.btn-remove-modal-karyawan', function () {
        $('body').removeClass('h-screen overflow-hidden');
        $('#modal-karyawan').remove();
    });

    $('html').on('change', '[name="file_excel"]', function () {
        let file = this.files[0];

        if (file) {

            $('.file-name-excel').text(file.name);
        }
    });

    $('html').on('click', '.btn-delete-sertifikat-pelatihan', function () {
        $(this).parent().remove();
    });

    $('.btn-add-sertifikat-pelatihan').click(function () {
        $(this).closest('.sertifikat-pelatihan').find('.container').append(`
            <div class="relative">
                                            <input type="text" name="sertifikat_pelatihan[]" id="sertifikat-pelatihan"
                                                autocomplete="off" value=""
                                                placeholder="Enter sertifikat pelatihan"
                                                class="block w-full rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-c0-300 placeholder:text-c0-400 focus:ring-2 focus:ring-inset focus:ring-c1-600 sm:text-sm sm:leading-6">
                                            <span
                                                class="btn-delete-sertifikat-pelatihan cursor-pointer hover:text-c1-500 absolute inset-y-0 right-0 px-2 h-full items-center flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M18 6l-12 12" />
                                                    <path d="M6 6l12 12" />
                                                </svg>
                                            </span>
                                        </div>
            `);
    });

    $('html').on('click', '.btn-lihat-perhitungan', function () {
        $(this).closest('.box-perhitungan').find('.perhitungan').slideToggle();
    });

    $('.btn-lihat-semua-perhitungan').click(function () {

        let open = $(this).attr('data-open');

        if (open == 0) {
            $('.box-perhitungan').find('.perhitungan').css('display', 'block');
            $(this).attr('data-open', '1');
        } else {
            $('.box-perhitungan').find('.perhitungan').css('display', 'none');
            $(this).attr('data-open', '0');
        }

    });

});
