<!doctype html>
<html>
@include('admin::auth.template.head')
<body>

	@yield('content')

	@include('admin::auth.template.script')

	@yield('script')

</body>
</html>

