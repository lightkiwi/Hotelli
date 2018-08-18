<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		@include('includes.head')
		@include('includes.admin.css')
	</head>
	<body>
		@include('includes.admin.header')

		@yield('content')

		@include('includes.admin.footer')

		@include('includes.admin.modal')
	</body>
</html>
