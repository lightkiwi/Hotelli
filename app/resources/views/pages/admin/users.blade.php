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
					<input type="text" class="span2" disabled>
					<button type="submit" class="btn" disabled>@lang('search.search')</button>
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
				<form id="signinModalForm" action="/signup" method="post">
					<label for="signinInputEmail">Informations Principales</label>
					<div class="form-row">
						<div class="form-group col-md-4">
							<input type="text" class="form-control" id="signinInputPrenom" placeholder="Prénom">
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" id="signinInputNom" required="true" placeholder="Nom">
						</div>
						<div class="form-group col-md-4">
							<input type="password" class="form-control" id="signinInputPassword" required="true" placeholder="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-8">
							<input type="email" class="form-control" id="signinInputEmail" required="true" placeholder="Email">
						</div>
						<div class="form-group col-md-4">
							<input type="password" class="form-control" id="signinInputPasswordConf" required="true" placeholder="Password Confirm">
						</div>
					</div>
					<div class="form-group">
						<label for="signinInputAddress">Informations complémentaires</label>
						<input type="text" class="form-control" id="signinInputAddress" placeholder="1 avenue...">
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<input type="zip" class="form-control" id="signinInputZip" placeholder="Code Postal">
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" id="signinInputCity" placeholder="Ville">
						</div>
						<div class="form-group col-md-4">
							<input type="tel" class="form-control" id="signinInputTel" placeholder="Téléphone">
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" required="true" id="cguCheck"/>
							<label class="form-check-label" for="cguCheck">
								J'accepte les <a href="/cgu">conditions générales d'utilisation</a> <span class="red">*</span>
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="newsCheck">
							<label class="form-check-label" for="newsCheck">
								Inscription à la newsletter
							</label>
						</div>
					</div>
					<div class="text-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
						<button type="button" id="signinModalFormSubmit" class="btn btn-primary">S'incrire</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
