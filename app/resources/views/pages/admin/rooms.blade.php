@extends('layouts.admin')

@section('title')
@lang('admin.rooms')
@stop

@section('content')
<h1>@lang('admin.rooms')</h1>

<div class="flex-center position-ref full-height">
	<div class="row toolbar">
		<div class="span2 p-2">
			<select name='hotel' disabled>
				<option>@lang('global.hotel_name')</option>
			</select>
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
			<button class="btn btn-primary room-select" style='color: white;' data-toggle="modal" data-target="#addRoomModalCentered">
				<span data-feather="plus"></span> @lang('admin.createEntry')
			</button>
			<button id='room-select-del' class="btn btn-danger room-select" disabled>
				<span data-feather="minus"></span> Supprimer
			</button>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
			<td>@lang('admin.room_number')</td>
			<td>@lang('admin.room_title')</td>
			<td>@lang('admin.room_description')</td>
			<td>@lang('admin.room_score')</td>
			<td>@lang('admin.room_persons')</td>
			</thead>
			<tbody>
				@foreach ($rooms as $room)
				<tr>
					<td class="inner-table">101</td>
					<td class="inner-table">{{ $room->title }}</td>
					<td class="inner-table">{{ $room->description }}</td>
					<td class="inner-table">{{ $room->score }}</td>
					<td class="inner-table">{{ $room->persons }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!-- modal d'ajout de chambre -->
<div class="modal fade" id="addRoomModalCentered" tabindex="-1" role="dialog" aria-labelledby="addRoomModalCentered" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="signinModalTitle">@lang('admin.create_room')</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="/admin/rooms/add" aria-label="@lang('auth.register')">
					@csrf

					<label for="signinInputEmail">@lang('auth.primary')</label>
					<div class="form-row">
						<div class="form-group col-md-8">
							<input type="text" class="form-control" name="title" placeholder="Nom de la chambre" required>
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="number" required="true" placeholder="Numéro">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<span style="display: inline-block;white-space: nowrap;">
								<input type="text" class="form-control" style="display: inline-block;" name="price" required placeholder="Prix">&nbsp;€
							</span>
						</div>
						<div class="form-group col-md-4">
							<input type="number" class="form-control" name="persons" required="true" placeholder="Nb de personnes">
						</div>
						<div class="form-group col-md-2">
							<input type="number" class="form-control" name="area" placeholder="Aire">
						</div>
					</div>
					<div class="form-group">
						<textarea class="form-control" name="description" placeholder="Description"></textarea>
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
