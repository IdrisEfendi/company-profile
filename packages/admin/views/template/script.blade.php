<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('packages/admin/js/script-admin.js') }}?{{ time() }}"></script>
<script src="{{ asset('packages/admin/js/script-media.js') }}?{{ time() }}"></script>
<script>
    let urlMediaCreate =
        "{{ substr_replace(base64_encode(route('admin-media-create')), 'APP', 2, 0) }}";
    let urlMediaStore =
        "{{ substr_replace(base64_encode(route('admin-media-store')), 'APP', 2, 0) }}";
    let urlMediaMore =
        "{{ substr_replace(base64_encode(route('admin-media-more')), 'APP', 2, 0) }}";
    let urlMediaDetail =
        "{{ substr_replace(base64_encode(route('admin-media-detail')), 'APP', 2, 0) }}";
    let urlMediaDestroy =
        "{{ substr_replace(base64_encode(route('admin-media-destroy')), 'APP', 2, 0) }}";
    let urlMediaUpdate =
        "{{ substr_replace(base64_encode(route('admin-media-update')), 'APP', 2, 0) }}";
    let urlMediaOpen =
        "{{ substr_replace(base64_encode(route('admin-media-open')), 'APP', 2, 0) }}";
</script>
