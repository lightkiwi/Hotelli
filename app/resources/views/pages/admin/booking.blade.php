@extends('layouts.admin')

@section('title')
@lang('admin.booking')
@stop

@section('content')
<h1>@lang('admin.booking')</h1>

<div class="flex-center position-ref full-height">
	<div class="row toolbar">
		<div class="span2 p-2">
			<button class="btn btn-primary" style='color: white;' data-toggle="modal" data-target="#addResaModalCentered">
				<span data-feather="plus"></span> @lang('admin.createEntry')
			</button>
		</div>
		<div class="span4 p-2 float-right">
			<form class="form-search">
				<div class="input-append">
					<input type="text" class="span2" disabled>
					<button type="submit" class="btn" disabled>@lang('search.search')</button>
				</div>
			</form>
		</div>
	</div>
	@if (count($allResas) > 0)
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
			<td>@lang('admin.resa_start')</td>
			<td>@lang('admin.resa_end')</td>
			<td>@lang('admin.resa_persons')</td>
			<td>@lang('admin.resa_name')</td>
			<td>@lang('admin.resa_phone')</td>
			<td>@lang('admin.resa_number')</td>
			<td>@lang('admin.resa_title')</td>
			</thead>
			<tbody>
				@foreach ($allResas as $resa)
				<tr>
					<td class="inner-table">{{ $resa->start }}</td>
					<td class="inner-table">{{ $resa->end }}</td>
					<td class="inner-table">{{ $resa->persons }}</td>
					<td class="inner-table">{{ $resa->last_name }}&nbsp;{{ $resa->first_name }}</td>
					<td class="inner-table">{{ $resa->phone }}</td>
					<td class="inner-table">{{ $resa->number }}</td>
					<td class="inner-table">{{ $resa->title }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
		<div class="row justify-content-center">
			<div class="col-md-12 text-center">
				<div class="mb-4 lead">@lang('admin.no_client')</div>
			</div>
		</div>
	</div>
	@endif
</div>

<!-- modal d'ajout de réservation -->
<div class="modal fade" id="addResaModalCentered" tabindex="-1" role="dialog" aria-labelledby="addResaModalCentered" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="signinModalTitle">Ajouter une réservation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="/admin/booking/add" aria-label="@lang('auth.register')">
					@csrf

					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="start">Date d'arrivée</label>
							<input type="date" class="form-control" name="start" placeholder="Date d'arrivée" required>
						</div>
						<div class="form-group col-md-4">
							<label for="end">Date de départ</label>
							<input type="date" class="form-control" name="end" placeholder="Date de départ" required>
						</div>
						<div class="form-group col-md-2">
							<label for="persons">Nb de clients</label>
							<input type="number" class="form-control" name="persons" placeholder="1">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-2">
							<button class="btn btn-primary" style='color: white;' data-toggle="modal" data-target="#addClientModalCentered">
								<span data-feather="user-plus"></span> @lang('admin.createEntry')
							</button>
						</div>
						<div class="form-group col-md-10">
							<label for="end">Client :</label>
							<select class="js-example-basic-single" name="id_user" required>
								@foreach ($allClients as $client)
								<option value="{{ $client->id }}">{{ $client->last_name }} - {{ $client->first_name }} ({{ $client->email }})</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group  col-md-4">
							<select class="js-example-basic-single" name='id_hotel' disabled>
								<option value='1'>@lang('global.hotel_name')</option>
							</select>
						</div>
						<div class="form-group  col-md-6">
							<select class="js-example-basic-single" name="id_room" required>
								@foreach ($allRooms as $room)
								<option value="{{ $room->id }}">{{ $room->number }} - {{ $room->title }} </option>
								@endforeach
							</select>
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

<!-- modal d'inscription -->
<div class="modal fade" id="addClientModalCentered" tabindex="-1" role="dialog" aria-labelledby="addClientModalCentered" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="signinModalTitle">Créez un compte</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="/admin/booking/users/add" aria-label="@lang('auth.register')">
					@csrf

					<label for="signinInputEmail">@lang('auth.primary')</label>
					<div class="form-row">
						<div class="form-group col-md-4">
							<input type="text" class="form-control" id="signinInputPrenom" name="first_name" placeholder="Prénom">
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" id="signinInputNom" name="last_name" placeholder="Nom" required>
						</div>
						<div class="form-group col-md-4">
							<input type="password" class="form-control" id="signinInputPassword" name="password" required="true" placeholder="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-8">
							<input type="email" class="form-control" id="signinInputEmail" name="email" required placeholder="Email">
						</div>
						<!--	<div class="form-group col-md-4">
							<input type="password" class="form-control" id="signinInputPasswordConf" name="password" required placeholder="Password Confirm">
						</div>-->
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
