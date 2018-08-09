<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-center" href="/">Grand Budapest Hôtel<br><span id="contact-infos">04.24.42.24.42</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="ml-auto navbar-nav mr-4">
            @if(isset($_SESSION['connected']) && $_SESSION['connected'])
			<li class="nav-item">
				<a class="nav-link" href="/disconnect">Déconnexion</a>
			</li>
            @else
			<li class="nav-item">
				<button id="nav-link-connexion" type="button" class="btn btn-link nav-link" data-toggle="modal" data-target="#loginModalCentered">Connexion</button>
				<!--	<a class="nav-link" href="">Connexion</a>-->
			</li>
            <li class="nav-item">
                <a class="nav-link" href="/inscription">Inscription</a>
            </li>
			@endif
            <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cgu">FAQ</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="/search">
            @csrf
            <input class="form-control mr-sm-2" type="search" name="search_nav">
            <input class="btn btn-outline-danger my-2 my-sm-0" type="submit" value="Chercher">
        </form>
    </div>
</nav>
