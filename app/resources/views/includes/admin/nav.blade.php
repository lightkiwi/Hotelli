<nav class="col-md-2 d-none d-md-block bg-light sidebar">
	<div class="sidebar-sticky">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link active" href="/admin/stat">
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
		</h6>
		<ul class="nav flex-column mb-2">
			<li class="nav-item">
				<a class="nav-link" href="/admin/hotel">
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
				<a class="nav-link" href="/admin/users">
					<span data-feather="file-text"></span>
					@lang('admin.staff')
				</a>
			</li>
		</ul>
	</div>
</nav>