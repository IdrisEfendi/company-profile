$(document).ready(function () {

    console.log('Script ready!');

    let token = $('meta[name="csrf-token"]').attr('content');

    try {
        var urlAbsensiStoreDec = urlAbsensiStore ? atob(urlAbsensiStore.replace('APP', '')) : undefined;
    } catch (error) { }

    try {
        var urlCutiDetailDec = urlCutiDetail ? atob(urlCutiDetail.replace('APP', '')) : undefined;
    } catch (error) { }

    window.loading = function (w = 5, h = 5) {

        return `<svg class="animate-spin w-${w} h-${h}" xmlns="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-loader-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3a9 9 0 1 0 9 9" /></svg>`;

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

    function ucfirst(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    function alert_message(type, message) {

        $('.alert-msg').remove();

        if (type == 'success') {

            var color = 'green';

            var svg = `<svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="w-5 h-5 text-${color}-400">
              <path d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>`;

        } else if (type == 'info') {

            var color = 'blue';

            var svg = `<svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="w-5 h-5 text-${color}-400">
              <path d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>`;

        } else if (type == 'warning') {

            var color = 'orange';

            var svg = `<svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="w-5 h-5 text-${color}-400">
              <path d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>`;

        } else {

            var color = 'red';

            var svg = `<svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="w-5 h-5 text-${color}-400">
              <path d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>`;
        }


        let alertMessage = `<div
        class="alert-msg z-50 pointer-events-none fixed inset-0 flex justify-center px-4 py-6 items-start sm:p-6">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
            <div
                class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-${color}-100 shadow-lg border border-${color}-500 hover:border-${color}-300">
                <div class="p-4">
                    <div class="flex items-start">

                        <div class="shrink-0">
                            ${svg}
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5 leading-none space-y-2">
                            <p class="text-sm font-medium text-${color}-600">${ucfirst(type)}</p>
                            <p class="mt-1 text-sm text-${color}-500 message">${message}</p>
                        </div>
                        <div class="ml-4 flex shrink-0">
                            <button
                                class="btn-close-alert-msg inline-flex rounded-md bg-${color}-500/5 text-${color}-400 hover:text-${color}-300 focus:outline-none">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                    data-slot="icon">
                                    <path
                                        d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>`;

        $('body').prepend(alertMessage);
        $('.alert-msg').hide().fadeIn(100);

        setTimeout(function () {
            $('.alert-msg').fadeOut(300, function () {
                $(this).remove();
            });
        }, 3000);

    }

    $('html').on('click', '.btn-close-alert-msg', function () {

        $(this).closest('.alert-msg').remove();

    });

    let stream = null;
    let lastBlob = null;

    let currentLat = null;
    let currentLon = null;

    function getLocation() {
        if (!navigator.geolocation) {
            alert_message('error', 'Browser kamu tidak mendukung GPS.');
            return;
        }

        // Matikan cache posisi lama
        navigator.geolocation.getCurrentPosition(
            function (pos) {
                currentLat = pos.coords.latitude;
                currentLon = pos.coords.longitude;

                $('.location .latitude').text(currentLat);
                $('.location .longitude').text(currentLon);

                alert_message('info', 'Lokasi berhasil diperbarui!');

                console.log("Lokasi terbaru:", currentLat, currentLon);
            },
            function (err) {

                switch (err.code) {
                    case err.PERMISSION_DENIED:
                        alert_message('error', 'Pengguna menolak akses lokasi.');
                        break;
                    case err.POSITION_UNAVAILABLE:
                        alert_message('error', 'Informasi lokasi tidak tersedia.');
                        break;
                    case err.TIMEOUT:
                        alert_message('error', 'Permintaan lokasi timeout.');
                        break;
                    default:
                        alert_message('error', 'Terjadi error saat mengambil lokasi.');
                }
            },
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0 // <– ini penting agar tidak ambil cache
            }
        );
    }

    // let href = window.location.href;

    // if (href.includes('absensi')) {

    //     getLocation();

    // }

    $('.btn-update-lokasi').click(function () {

        getLocation();

    });

    const video = $('#video')[0];
    const canvas = $('#canvas')[0];

    $('.btn-start-camera').click(async function () {
        try {
            stream = await navigator.mediaDevices.getUserMedia({
                video: { width: { ideal: 1280 }, height: { ideal: 720 } },
                audio: false
            });

            video.srcObject = stream;

            $('#video')[0].style.display = 'block';
            $('#canvas')[0].style.display = 'none';

            $('.box-absensi').find('img').hide();
            $('.box-absensi').find('video').show();

            info_message('Kamera aktif!');
        } catch (err) {
            console.error(err);
            alert_message('error', 'Gagal mengakses kamera: ' + err.name);
        }
    });


    $('.btn-stop-camera').click(function () {
        if (stream) {

            stream.getTracks().forEach(t => t.stop());
            video.srcObject = null;
            stream = null;

            $('#video')[0].style.display = 'block';

            alert_message('info', 'Kamera dimatikan!');
        }
    });

    $('.btn-capture-foto').on("click", function () {

        if (!stream) {

            alert_message('warning', 'Kamera belum aktif!');

            return;
        }

        const ctx = canvas.getContext("2d");
        canvas.width = video.videoWidth || 640;
        canvas.height = video.videoHeight || 480;

        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        $('#canvas').show();

        canvas.toBlob(function (blob) {
            lastBlob = blob;

            alert_message('success', 'Klik "Kirim Absensi" untuk mengirim.');
        }, "image/jpeg", 0.9);

        $('#video')[0].style.display = 'none';

        if (stream) {
            stream.getTracks().forEach(t => t.stop());
            video.srcObject = null;
            stream = null;
        }

    });

    // optional: stop kamera saat meninggalkan halaman
    window.addEventListener('beforeunload', () => {
        if (stream) stream.getTracks().forEach(t => t.stop());
    });

    $('.btn-send-absensi').on("click", async function () {

        let thisBtn = $(this);

        thisBtn.attr('disabled', true);
        thisBtn.addClass('cursor-not-allowed');

        if (!lastBlob) {

            alert_message('warning', 'Belum ada foto yang diambil.');

            thisBtn.attr('disabled', false);
            thisBtn.removeClass('cursor-not-allowed');

            return;
        }

        // let photo = $('[name="photo"]')[0].files;

        let absensiId = $('[name="absensi_id"]').val();
        let karyawanId = $('[name="karyawan_id"]').val();
        let type = $('[name="type"]').val();
        let catatan = $('[name="catatan"]').val();

        if (!karyawanId) {

            alert_message('warning', 'Belum ada karyawan yang dipilih.');

            thisBtn.attr('disabled', false);
            thisBtn.removeClass('cursor-not-allowed');

            return;

        }

        const formData = new FormData();
        formData.append('absensi_id', absensiId);
        formData.append('karyawan_id', karyawanId);
        formData.append('type', type);
        formData.append('catatan', catatan);
        formData.append('photo', lastBlob, `absen_${karyawanId}_${Date.now()}.jpg`);
        // formData.append('photo', photo[0]);

        if (currentLat !== null && currentLon !== null) {

            formData.append('latitude', currentLat);
            formData.append('longitude', currentLon);

        } else {

            // opsional: tambahkan flag bahwa lokasi tidak tersedia
            formData.append('latitude', "");
            formData.append('longitude', "");

        }

        try {
            let data = await $.ajax({
                type: "POST",
                headers: { "X-CSRF-TOKEN": token },
                url: urlAbsensiStoreDec,
                data: formData,
                processData: false,
                contentType: false,
            });

            console.log(data);

            if (data.status) {

                Swal.fire({
                    title: 'Success!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload(); // reload setelah klik OK
                    }
                });

            } else {

                alert_message('error', data.message);
            }

            thisBtn.attr('disabled', false);
            thisBtn.removeClass('cursor-not-allowed');

        } catch (err) {

            thisBtn.attr('disabled', false);
            thisBtn.removeClass('cursor-not-allowed');

            alert_message('error', 'Gagal mengirim absensi: ' + (err.responseJSON.message || err));

        }

    });

    $('.btn-detail-cuti').on("click", function () {

        let cutiId = $(this).closest('.cuti').attr('data-cuti-id');

        $.ajax({
            url: urlCutiDetailDec + '/' + cutiId,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': token,
            },
            data: {
                cuti_id: cutiId
            },
            success: function (data) {

                if (data.status) {

                    $('body').addClass('h-screen overflow-hidden');

                    $('#modal-detail-cuti').remove();
                    $('body').append(data.html);

                }

            },
            error: function (msg) {

                let error = msg.responseJSON.message;

                console.log(error);

            },
        });

    });

    $('html').on('click', '.btn-close-modal-detail-cuti', function () {

        $('#modal-detail-cuti').remove();
        $('body').removeClass('h-screen overflow-hidden');

    });

});
