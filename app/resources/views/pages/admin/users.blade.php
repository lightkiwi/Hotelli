@extends('layouts.admin')

@section('title')
@lang('admin.staff')
@stop

@section('content')
<!--<div class="opacity-article position-relative overflow-hidden p-4 bg-light">
	<div class="col-md-12 mx-auto my-5">-->
<h1>@lang('admin.listUsers')</h1>

<div class="flex-center position-ref full-height">
	<div class="row toolbar">
		<div class="span2 p-2">
			<div class="btn-group pull-right" data-toggle="buttons-radio">
				<button class="btn active">@lang('admin.tableAll')</button>
				<button class="btn">@lang('admin.tableStaff')</button>
				<button class="btn">@lang('admin.tableClient')</button>
			</div>
		</div>
		<div class="span4 p-2">
			<form class="form-search">
				<div class="input-append">
					<input type="text" class="span2">
					<button type="submit" class="btn">@lang('search.search')</button>
				</div>
			</form>
		</div>
		<div class="span2 p-2">
			<a href="#" class="btn btn-primary">
				<span data-feather="user-plus"></span> @lang('admin.createEntry')
			</a>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
			<td>@lang('admin.email')</td>
			<td>@lang('admin.first_name')</td>
			<td>@lang('admin.last_name')</td>
			<td>@lang('admin.phone')</td>
			<!--<td>@lang('passwords.password')</td>-->
<!--					<td>id_address</td>-->
			<td>@lang('admin.id_profil')</td>
<!--					<td>id_gender</td>-->
			<td>@lang('admin.rgpd_date')</td>
<!--					<td>newsletter</td>
			<td>ip_address</td>
			<td>user_agent</td>-->
			</thead>
			<tbody>
				@foreach ($allUsers as $user)
				<?php // $user->setProfil() ?>
				<tr>
					<td class="inner-table">{{ $user->email }}</td>
					<td>{{ $user->first_name }}</td>
					<td class="inner-table">{{ $user->last_name }}</td>
					<td class="inner-table">{{ $user->phone }}</td>
					<td class="inner-table">{{ $user->label }}</td>
					<td class="inner-table">{{ $user->rgpd_date }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!--	</div>
</div>-->
@stop
