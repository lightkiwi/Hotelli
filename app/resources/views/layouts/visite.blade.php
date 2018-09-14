<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		@include('includes.head')
		@include('includes.visite.css')
	</head>
	<body>
		<header>
			@include('includes.visite.header')
		</header>

		@yield('content')

		<footer>
			@include('includes.visite.footer')
		</footer>
		@include('includes.visite.modal')
	</body>
</html>
