@layout('admin::template.master')

@section('title', 'Dashboard')

@section('content')

    <div class="space-y-4">
        <div class="p-4 border rounded-md space-y-6 bg-white">

            <div class="prose max-w-full">
                {!! Helper::setting('app-deskripsi') !!}
            </div>

        </div>
    </div>

@section('script')
@endsection

@endsection
