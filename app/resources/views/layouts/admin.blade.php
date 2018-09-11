<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		@include('includes.head')
		@include('includes.admin.css')
	</head>
	<body>

		@include('includes.admin.header')
		<div class="container-fluid container-admin">
			<div class="row">
				@include('includes.admin.nav')
				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
					@yield('content')
				</main>
			</div>
		</div>
		@include('includes.admin.footer')

		@include('includes.admin.modal')
	</body>
</html>
