<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
			<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand" href="#">
				</a>
				<ul>
					<li><a href="/inscription">Inscription</a></li>
				</ul>
			</nav>
            <div class="content">
                <div class="title m-b-md">
                    Hotelli
                </div>

                <div class="links">
                    <a href="">Page d'accueil du site</a>
                </div>
            </div>
        </div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
