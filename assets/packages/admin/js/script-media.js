$(document).ready(function () {

    console.log('Script media ready!');

    let token = $('meta[name="csrf-token"]').attr('content');

    try {
        var urlMediaCreateDec = urlMediaCreate ? atob(urlMediaCreate.replace('APP', '')) : undefined;
    } catch (error) { }

    try {
        var urlMediaStoreDec = urlMediaStore ? atob(urlMediaStore.replace('APP', '')) : undefined;
    } catch (error) { }

    try {
        var urlMediaMoreDec = urlMediaMore ? atob(urlMediaMore.replace('APP', '')) : undefined;
    } catch (error) { }

    try {
        var urlMediaDetailDec = urlMediaDetail ? atob(urlMediaDetail.replace('APP', '')) : undefined;
    } catch (error) { }

    try {
        var urlMediaDestroyDec = urlMediaDestroy ? atob(urlMediaDestroy.replace('APP', '')) : undefined;
    } catch (error) { }

    try {
        var urlMediaUpdateDec = urlMediaUpdate ? atob(urlMediaUpdate.replace('APP', '')) : undefined;
    } catch (error) { }

    try {
        var urlMediaOpenDec = urlMediaOpen ? atob(urlMediaOpen.replace('APP', '')) : undefined;
    } catch (error) { }

    var thisBtnMedia;

    $('html').on('click', '.btn-create-media', function () {

        $.ajax({
            url: urlMediaCreateDec,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': token,
            },
            data: {},
            success: function (data) {

                if (data.status) {

                    $('#modal-upload-media').remove();
                    $('body').append(data.html);

                }

            },
            error: function (msg) {

                let error = msg.responseJSON.message;

                console.log(error);

            },
        });

    });

    $('html').on('click', '.btn-cancel-media-upload', function () {

        $('#modal-upload-media').remove();

    });

    $('html').on('change', '#input-media', function () {

        const files = this.files;

        // Batasi maksimal 5 file
        if (files.length > 5) {
            Swal.fire({
                icon: 'warning',
                title: 'Maksimal 5 gambar!',
                text: 'Silakan pilih maksimal 5 gambar saja.',
            });

            // Reset input agar user bisa pilih ulang
            $(this).val('');
            $('#preview-media').empty().addClass('hidden');
            return;
        }

        if (files.length > 0) {
            $('#preview-media').empty().removeClass('hidden');

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const name = file.name;
                    $('#preview-media').append(`
                    <div class="relative overflow-hidden border rounded-lg">
                        <img src="${e.target.result}" alt="${name}" title="${name}" class="w-12 h-12 object-cover">
                    </div>
                `);
                };
                reader.readAsDataURL(file);
            });
        } else {
            $('#preview-media').empty().addClass('hidden');
        }
    });


    $('html').on('click', '.btn-upload-media', function (e) {

        e.preventDefault();

        let thisBtn = $(this);
        const files = $('[name="input_media[]"]')[0].files;

        if (files.length > 0) {

            thisBtn.attr('disabled', true);
            thisBtn.addClass('cursor-not-allowed');
            thisBtn.find('span').addClass('animate-pulse').text('Loading');

            (async () => {

                let number = 0;

                const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms));

                for (let el of files) {

                    let formData = new FormData();
                    formData.append('input_media', el);

                    try {
                        let data = await $.ajax({
                            url: urlMediaStoreDec,
                            type: 'POST',
                            headers: { 'X-CSRF-TOKEN': token },
                            data: formData,
                            contentType: false,
                            processData: false,
                        });

                        if (data.status) {

                            let media = data.media;
                            let countMedia = data.count_media;

                            if (thisBtnMedia) {

                                var buttonSetMedia = `<span class="btn-set-media cursor-pointer text-c1-500 hover:text-c1-600">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-camera-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 20h-7a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v3.5" /><path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M19 16v6" /><path d="M22 19l-3 3l-3 -3" /></svg>
                                                            </span>`;
                            }

                            $('.media-list').prepend(`
                                <div class="media col-span-2">
                                    <div class="border rounded-lg overflow-hidden relative group">
                                        <img data-media-id="${media.id}" class="text-transparent object-cover w-full h-36"
                                            src="${media.guid}" alt="${media.title}">
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
                                                ${buttonSetMedia ?? ''}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);

                            $('.showing').text(parseInt($('.showing').text()) + 1);
                            $('.count-media').text(countMedia);

                            $('#preview-media').find('img:eq(' + number + ')').parent().append(`<div class="absolute inset-0 bg-c0-500 bg-opacity-50 flex items-center justify-center text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-rosette-discount-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7c.412 .41 .97 .64 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1c0 .58 .23 1.138 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1" /><path d="M9 12l2 2l4 -4" /></svg>
                            </div>`);

                        }

                        number++;

                    } catch (err) {

                        $('#preview-media').find('img:eq(' + number + ')').parent().append(`<div class="absolute inset-0 bg-c0-500 bg-opacity-50 flex items-center justify-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-square-rounded-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10l4 4m0 -4l-4 4" /><path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" /></svg>
                        </div>`);

                        console.error("Error:", err.responseJSON?.message || err.statusText);

                        number++;
                    }

                    await sleep(250);
                }



                if (number == files.length) {
                    thisBtn.find('span').removeClass('animate-pulse').text('Upload');
                    thisBtn.removeAttr('disabled');
                    thisBtn.removeClass('cursor-not-allowed');

                    $('#modal-upload-media').remove();
                }

            })();
        }
    });


    $('html').on('click', '.btn-load-more-media', function (e) {

        let thisBtn = $(this);

        if ($('.media-list .media').length == 0) {
            return;
        }

        thisBtn.attr('disabled', true);
        thisBtn.addClass('cursor-not-allowed');

        let formData = new FormData();

        $('.media-list .media').each(function () {

            let mediaId = $(this).find('img').attr('data-media-id');

            formData.append('media_id_not[]', mediaId);

        });

        $.ajax({
            type: "POST",
            headers: { "X-CSRF-TOKEN": token },
            url: urlMediaMoreDec,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {

                if (data.status) {

                    let medias = data.medias;

                    if (thisBtnMedia) {

                        var buttonSetMedia = `<span class="btn-set-media cursor-pointer text-c1-500 hover:text-c1-600">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-camera-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 20h-7a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v3.5" /><path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M19 16v6" /><path d="M22 19l-3 3l-3 -3" /></svg>
                                                            </span>`;
                    }

                    for (let media of medias) {
                        $('.media-list').append(`
                            <div class="media col-span-2">
                                <div class="border rounded-lg overflow-hidden relative group">
                                    <img data-media-id="${media.id}" class="text-transparent object-cover w-full h-36"
                                        src="${media.guid}" alt="${media.title}">
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
                                            ${buttonSetMedia ?? ''}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        `);
                    }

                    $('.showing').text(parseInt($('.showing').text()) + medias.length);

                }

                thisBtn.attr('disabled', false);
                thisBtn.removeClass('cursor-not-allowed');

            },
            error: function (msg) {

                console.log(msg);

                thisBtn.attr('disabled', false);
                thisBtn.removeClass('cursor-not-allowed');

            }
        });

    });

    $('html').on('click', '.btn-detail-media', function (e) {

        let mediaId = $(this).closest('.media').find('img').attr('data-media-id');

        let formData = new FormData();
        formData.append('media_id', mediaId);

        $.ajax({
            type: "POST",
            headers: { "X-CSRF-TOKEN": token },
            url: urlMediaDetailDec,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {

                if (data.status) {
                    $('#modal-detail-media').remove();
                    $('body').append(data.html);
                }

            },
            error: function (msg) {

                console.log(msg);

                thisBtn.attr('disabled', false);
                thisBtn.removeClass('cursor-not-allowed');

            }
        });

    });

    $('html').on('click', '.btn-close-media-detail', function (e) {

        $('#modal-detail-media').remove();

    });

    $('html').on('click', '.btn-delete-media', function (e) {
        e.preventDefault();

        let thisBtn = $(this);
        let mediaId = thisBtn.closest('#modal-detail-media').find('[name="media_id"]').val();

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

                // Jalankan AJAX hanya jika user menekan "Ya, hapus!"
                let formData = new FormData();
                formData.append('_method', 'DELETE');
                formData.append('media_id', mediaId);

                $.ajax({
                    type: "POST",
                    headers: { "X-CSRF-TOKEN": token },
                    url: urlMediaDestroyDec,
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) {

                        if (data.status) {

                            let countMedia = data.count_media;

                            $('#modal-detail-media').remove();
                            $('img[data-media-id="' + mediaId + '"]').closest('.media').remove();
                            $('.count-media').text(countMedia);
                            $('.showing').text(parseInt($('.showing').text()) - 1);

                            Swal.fire('Success!', data.message, 'success');
                        } else {
                            Swal.fire('Gagal!', data.message, 'error');
                        }

                    },
                    error: function (msg) {

                        console.log(msg);

                        Swal.fire('Error!', msg.responseJSON.message, 'error');
                    }
                });
            }
        });
    });

    $('html').on('click', '.btn-update-media', function (e) {
        e.preventDefault();

        let thisBtn = $(this);
        let mediaId = thisBtn.closest('#modal-detail-media').find('[name="media_id"]').val();
        let title = thisBtn.closest('#modal-detail-media').find('[name="title"]').val();
        let caption = thisBtn.closest('#modal-detail-media').find('[name="caption"]').val();

        let formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append('media_id', mediaId);
        formData.append('title', title);
        formData.append('caption', caption);

        $.ajax({
            type: "POST",
            headers: { "X-CSRF-TOKEN": token },
            url: urlMediaUpdateDec,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {

                if (data.status) {

                    $('#modal-detail-media').remove();

                    Swal.fire('Success!', data.message, 'success');

                } else {

                    Swal.fire('Gagal!', data.message, 'error');

                }

            },
            error: function (msg) {

                console.log(msg);

                Swal.fire('Error!', msg.responseJSON.message, 'error');

            }
        });

    });

    $('html').on('click', '.btn-open-media', function (e) {

        thisBtnMedia = $(this);

        $.ajax({
            url: urlMediaOpenDec,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': token,
            },
            data: {},
            success: function (data) {

                if (data.status) {

                    $('#modal-media').remove();
                    $('body').append(data.html);

                    $('body').addClass('h-screen overflow-hidden');

                }

            },
            error: function (msg) {

                let error = msg.responseJSON.message;

                console.log(error);

            },
        });

    });

    $('html').on('click', '.btn-close-media', function (e) {

        e.preventDefault();

        $('#modal-media').remove();

        $('body').removeClass('h-screen overflow-hidden');

    });

    $('html').on('click', '.btn-set-media', function (e) {

        e.preventDefault();

        let mediaId = $(this).closest('.media').find('img').attr('data-media-id');
        let url = $(this).closest('.media').find('img').attr('src');

        thisBtnMedia.closest('.media').find('input').val(mediaId);
        thisBtnMedia.closest('.media').find('img').attr('src', url);
        thisBtnMedia.closest('.media').find('.image').removeClass('hidden');
        thisBtnMedia.closest('.media').find('.btn-open-media').addClass('hidden');
        thisBtnMedia.closest('.media').find('.btn-remove-image').removeClass('hidden');

        $('#modal-media').remove();

    });

    $('.btn-remove-image').click(function (e) {

        e.preventDefault();

        $(this).closest('.media').find('input').val(0);
        $(this).closest('.media').find('img').attr('src', '');
        $(this).closest('.media').find('.image').addClass('hidden');
        $(this).closest('.media').find('.btn-open-media').removeClass('hidden');
        $(this).closest('.media').find('.btn-remove-image').addClass('hidden');

    });


});
