<nav class="col-md-2 d-none d-md-block bg-light sidebar">
	<div class="sidebar-sticky">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link <?php if (Request::is('admin')) echo 'active' ?>" href="/admin">
					<span data-feather="home"></span>
					@lang('admin.dashboard') <span class="sr-only">(@lang('global.current'))</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if (Request::is('admin/booking')) echo 'active' ?>" href="/admin/booking">
					<span data-feather="shopping-cart"></span>
					@lang('admin.booking')
				</a>
			</li>
			<!--			<li class="nav-item">
							<a class="nav-link <?php if (Request::is('admin/billing')) echo 'active' ?>" href="/admin/billing">
								<span data-feather="file"></span>
								@lang('admin.billing')
							</a>
						</li>-->
			<li class="nav-item">
				<a class="nav-link <?php if (Request::is('admin/clients')) echo 'active' ?>" href="/admin/clients">
					<span data-feather="users"></span>
					@lang('admin.clients')
				</a>
			</li>
		</ul>
		@if(Auth::user()->id_profil === 1)
		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
			<span>@lang('global.administration')</span>
		</h6>
		<ul class="nav flex-column mb-2">
			<li class="nav-item">
				<a class="nav-link <?php if (Request::is('admin/hotel')) echo 'active' ?>" href="/admin/hotel">
					<span data-feather="home"></span>
					@lang('admin.hotels')
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if (Request::is('admin/rooms')) echo 'active' ?>" href="/admin/rooms">
					<span data-feather="box"></span>
					@lang('admin.rooms')
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if (Request::is('admin/users')) echo 'active' ?>" href="/admin/users">
					<span data-feather="user-check"></span>
					@lang('admin.staff')
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if (Request::is('admin/stat')) echo 'active' ?>" href="/admin/stat">
					<span data-feather="activity"></span>
					@lang('admin.stat')
				</a>
			</li>
		</ul>
		@endif
	</div>
</nav>