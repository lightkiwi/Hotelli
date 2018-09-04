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
					<button type="submit" class="btn">Search</button>
				</div>
			</form>
		</div>
		<a href="#" class="btn btn-lg btn-primary">
			<span class="glyphicon glyphicon-plus"></span> Create new
		</a>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
			<td>email</td>
			<td>first_name</td>
			<td>last_name</td>
			<td>phone</td>
			<td>password</td>
<!--					<td>id_address</td>-->
			<td>id_profil</td>
<!--					<td>id_gender</td>-->
			<td>rgpd_date</td>
<!--					<td>newsletter</td>
			<td>ip_address</td>
			<td>user_agent</td>-->
			</thead>
			<tbody>
				@foreach ($allUsers as $user)
				<tr>
					<td class="inner-table">{{ $user->email }}</td>
					<td>{{ $user->first_name }}</td>
					<td class="inner-table">{{ $user->last_name }}</td>
					<td class="inner-table">{{ $user->phone }}</td>
					<td class="inner-table">{{ $user->password }}</td>
<!--							<td class="inner-table">{{ $user->id_address }}</td>-->
					<td class="inner-table">{{ $user->id_profil }}</td>
<!--							<td class="inner-table">{{ $user->id_gender }}</td>-->
					<td class="inner-table">{{ $user->rgpd_date }}</td>
<!--							<td class="inner-table">{{ $user->newsletter }}</td>
					<td class="inner-table">{{ $user->ip_address }}</td>
					<td class="inner-table">{{ $user->user_agent }}</td>-->
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!--	</div>
</div>-->
@stop
