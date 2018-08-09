<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		@include('includes.head')
		@yield('css')
	</head>
	<body>
		@include('includes.header')

		@yield('contenu')

		@include('includes.footer')
	</body>
</html>
