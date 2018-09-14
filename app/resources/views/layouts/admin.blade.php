<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		@include('includes.head')
		@include('includes.admin.css')
	</head>
	<body>
		<header>
			@include('includes.admin.header')
		</header>
		<div class="container-fluid container-admin">
			<div class="row">
				@include('includes.admin.nav')
				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
					@yield('content')
				</main>
			</div>
		</div>
		<footer>
			@include('includes.admin.footer')
		</footer>
		@include('includes.admin.modal')
	</body>
</html>
