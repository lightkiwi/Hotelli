@extends('layouts.admin')

@section('title')
@lang('admin.staff')
@stop

@section('content')
<h1>@lang('admin.staff')</h1>

<div class="flex-center position-ref full-height">
	<div class="row toolbar">
		<!--		<div class="span2 p-2">
					<div class="btn-group pull-right" data-toggle="buttons-radio">
						<button class="btn active">@lang('admin.tableAll')</button>
						<button class="btn">@lang('admin.tableStaff')</button>
						<button class="btn">@lang('admin.tableClient')</button>
					</div>
				</div>-->
		<!--		<div class="span4 p-2">
					<form class="form-search">
						<div class="input-append">
							<input type="text" class="span2" disabled>
							<button type="submit" class="btn" disabled>@lang('search.search')</button>
						</div>
					</form>
				</div>-->
		<div class="span2 p-2">
			<button class="btn btn-primary" style='color: white;' data-toggle="modal" data-target="#signinModalCentered">
				<span data-feather="user-plus"></span> @lang('admin.createEntry')
			</button>
			<button class="btn btn-warning user-select" disabled>
				<span data-feather="unlock"></span> Réinitialiser le mot de passe
			</button>
			<button id='user-select-del' class="btn btn-danger user-select" disabled>
				<span data-feather="user-minus"></span> Supprimer
			</button>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
			<td>@lang('admin.email')</td>
			<td>@lang('admin.first_name')</td>
			<td>@lang('admin.last_name')</td>
			<td>@lang('admin.phone')</td>
			<td>@lang('admin.id_profil')</td>
			<td>@lang('admin.rgpd_date')</td>
			<td>@lang('admin.newsletter')</td>
			</thead>
			<tbody>
				@foreach ($allUsers as $user)
				<tr data-id='{{ $user->id }}'>
					<td class="inner-table">{{ $user->email }}</td>
					<td>{{ $user->first_name }}</td>
					<td class="inner-table">{{ $user->last_name }}</td>
					<td class="inner-table">{{ $user->phone }}</td>
					<td class="inner-table">{{ $user->label }}</td>
					<td class="inner-table">{{ $user->rgpd_date }}</td>
					<td class="inner-table">
						<?php
						if ($user->newsletter) {
							echo "oui";
						} else {
							echo "non";
						}
						?>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!-- modal d'inscription -->
<div class="modal fade" id="signinModalCentered" tabindex="-1" role="dialog" aria-labelledby="signinModalCentered" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="signinModalTitle">Créez un compte</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="/admin/users/add" aria-label="@lang('auth.register')">
					@csrf

					<label for="signinInputEmail">@lang('auth.primary')</label>
					<div class="form-row">
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="first_name" placeholder="Prénom">
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="last_name" placeholder="Nom" required>
						</div>
						<div class="form-group col-md-4">
							<input type="password" class="form-control" name="password" required="true" placeholder="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-8">
							<input type="email" class="form-control" name="email" required placeholder="Email">
						</div>
						<div class="form-group col-md-4">
							<select class="form-control" name="id_profil">
								@foreach ($profils as $profil)
								<option value="{{ $profil->id }}">{{ $profil->label }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="signinInputAddress">@lang('auth.complementary')</label>
						<input type="text" class="form-control" name="adress" placeholder="1 avenue...">
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<input type="zip" class="form-control" name="cp" placeholder="Code Postal">
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="ville" placeholder="Ville">
						</div>
						<div class="form-group col-md-4">
							<input type="tel" class="form-control" name="tel" placeholder="Téléphone">
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="newsCheck" value="t">
							<label class="form-check-label" for="newsCheck">
								@lang('auth.newsletter')
							</label>
						</div>
					</div>
					<div class="text-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('global.cancel')</button>
						<button type="submit" class="btn btn-primary">@lang('admin.createEntry')</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
