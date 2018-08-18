<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">@lang('global.cfg_name')</a>
<!--			<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
	<ul class="navbar-nav px-3">
		<li class="nav-item text-nowrap">
			<a class="nav-link" href="#">@lang('global.backToApp')</a>
		</li>
	</ul>
</nav>

<div class="container-fluid">
	<div class="row">

		<nav class="col-md-2 d-none d-md-block bg-light sidebar">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link active" href="#">
							<span data-feather="home"></span>
							@lang('admin.dashboard') <span class="sr-only">(@lang('global.current'))</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/admin/booking">
							<span data-feather="shopping-cart"></span>
							@lang('admin.booking')
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/admin/billing">
							<span data-feather="file"></span>
							@lang('admin.billing')
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/admin/clients">
							<span data-feather="users"></span>
							@lang('admin.clients')
						</a>
					</li>
				</ul>

				<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
					<span>@lang('global.administration')</span>
					<a class="d-flex align-items-center text-muted" href="#">
						<span data-feather="plus-circle"></span>
					</a>
				</h6>
				<ul class="nav flex-column mb-2">
					<li class="nav-item">
						<a class="nav-link" href="#">
							<span data-feather="file-text"></span>
							@lang('admin.hotels')
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
							<span data-feather="file-text"></span>
							@lang('admin.rooms')
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
							<span data-feather="file-text"></span>
							@lang('admin.staff')
						</a>
					</li>
				</ul>
			</div>
		</nav>