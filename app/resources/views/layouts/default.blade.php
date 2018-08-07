<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		@include('includes.head')
		@yield('css')
		<style type="text/css">
			body {
				background: url('{{ asset('img/big-header-2.jpg') }}') top no-repeat fixed;
			}
		</style>
	</head>
	<body style="">
		<div class="container-fluid">

			<header class="container">
				<!--				<div class="container">-->
				@include('includes.header')
				<!--				</div>-->
			</header>

			<div id="main" class="container">

				@yield('content')

			</div>

			<footer class="row">
				<div class="container">
					@include('includes.footer')
				</div>
			</footer>

		</div>
	</body>
</html>
