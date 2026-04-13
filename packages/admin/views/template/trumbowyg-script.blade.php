<script src="{{ asset('packages/admin/js/trumbowyg/trumbowyg.min.js') }}"></script>
<script src="{{ asset('packages/admin/js/trumbowyg/plugins/history/trumbowyg.history.min.js') }}"></script>
<script src="{{ asset('packages/admin/js/trumbowyg/plugins/table/trumbowyg.table.min.js') }}"></script>
<script src="{{ asset('packages/admin/js/trumbowyg/plugins/emoji/trumbowyg.emoji.min.js') }}"></script>
<script src="{{ asset('packages/admin/js/trumbowyg/plugins/preformatted/trumbowyg.preformatted.min.js') }}"></script>

<script>
    window.trumbowygEditor = function() {
        $('.trumbowyg-editor').each(function() {
            var $editor = $(this);

            // Init Trumbowyg untuk masing-masing editor
            $editor.trumbowyg({
                svgPath: '{{ asset("packages/admin/css/trumbowyg/icons.svg") }}',
                btns: [
                    ['viewHTML'],
                    ['formatting', 'strong', 'italic', 'underline'],
                    ['unorderedList', 'orderedList', 'removeformat'],
                    ['historyUndo', 'historyRedo'],
                    ['link', 'preformatted'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['fullscreen']
                ],
                plugins: {
                    table: {
                        allowHorizontalResize: true,
                    }
                },
                autogrow: true
            });

            // buat word count terpisah untuk tiap editor (gunakan after biar predictable)
            $editor.closest('.trumbowyg-box').find('.trumbowyg-info-word').remove();
            var $wordInfo = $('<div class="trumbowyg-info-word">Word count: <span>0</span></div>');
            $editor.after($wordInfo);

            // fungsi hitung kata untuk editor ini
            function updateWordCount() {
                var html = $editor.trumbowyg('html') || '';
                var text = $('<div>').html(html).text();
                var words = text.trim().length ? text.trim().split(/\s+/).length : 0;
                $wordInfo.find('span').text(words);
            }

            // bersihkan atribut data-* hanya untuk editor ini
            function removeDataAttrsFromEditor() {
                var content = $editor.trumbowyg('html') || '';
                var $clean = $('<div>' + content + '</div>');

                $clean.find('*').each(function() {
                    var $el = $(this);

                    // hapus atribut data-*
                    $.each(this.attributes, function() {
                        if (this && this.name && this.name.indexOf('data-') === 0) {
                            $el.removeAttr(this.name);
                        }
                    });

                    // hapus class
                    if ($el.attr('class')) {
                        $el.removeAttr('class');
                    }
                });

                $editor.trumbowyg('html', $clean.html());

                // kembalikan posisi cursor
                $editor.trumbowyg('restoreRange');
            }

            // init count dan event khusus untuk editor ini
            updateWordCount();

            // realtime saat mengetik / perubahan
            $editor.on('keyup tbwchange', function() {
                updateWordCount();
            });

            // clean saat paste/input (delay kecil agar konten sudah masuk)
            $editor.on('tbwpaste input', function() {
                setTimeout(function() {
                    removeDataAttrsFromEditor();
                    updateWordCount();
                }, 50);
            });

        }); // end each
    };

    trumbowygEditor();
</script>
