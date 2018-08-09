<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		@include('includes.head')
		@yield('css')
	</head>
	<body>
		@include('includes.visite-header')

		@yield('content')

		@include('includes.visite-footer')

		@include('includes.visite-modal')
	</body>
</html>
