<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="text-center" href="/"><h1 class="navbar-brand">@lang('global.hotel_name')</h1><p id="contact-infos" class="navbar-brand">@lang('global.hotel_tel')</p></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="ml-auto navbar-nav mr-4">
			@guest
			<li class="nav-item">
				<a class="nav-link nav-link-login" href="{{ route('login') }}">@lang('auth.login')</a>
			</li>
			<li class="nav-item">
				<a class="nav-link nav-link-signin" href="{{ route('register') }}">@lang('auth.register')</a>
			</li>
            @else
			@if(Auth::user()->id_profil === 1 || Auth::user()->id_profil === 2)
			<li class="nav-item">
				<a class="nav-link" href="/admin">@lang('global.administration')</a>
			</li>
            @else
			<li class="nav-item">
				<a class="nav-link" href="/account">@lang('global.account')</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/account/booking">@lang('global.my_resa')</a>
			</li>
			@endif
			<li class="nav-item">
				<a class="nav-link" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
					@lang('auth.logout')
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
			@endif
            <li class="nav-item">
                <a class="nav-link" href="/contact">@lang('global.contact')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/faq">@lang('global.faq')</a>
            </li>
        </ul>
		<!--        <form class="form-inline my-2 my-lg-0" method="post" action="/search">
					@csr					f
						 <input class="form-control mr-sm-2" type="search" name="searchField">
						 <input class="btn btn-outline-danger my-2 my-sm-0" type="submit" value="Chercher">
					 </form>-->
	</div>
</nav>
