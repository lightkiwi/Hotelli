@extends('layouts.visite')

@section('title', 'Accueil')

@section('content')
<div class="opacity-article position-relative overflow-hidden p-4 bg-light">
	<div class="col-md-8 mx-auto my-5">
		<form action="/search" method="post">
			@csrf
			<label for="searchField">Champs de recherche</label>
			<input type="search" id="searchField" name="searchField" class="form-control"
				   aria-describedby="champs de recherche">
			<small id="searchFieldHelp" class="form-text text-muted">
				Mots-clé : vue sur mer, balcon, piscine, lit triple, room service.
			</small>
			<br>

			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="start">Arrivée</label>
					<input type="date" class="form-control" id="start" name="start"
						   min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
				</div>
				<div class="form-group col-md-3">
					<label for="end">Départ</label>
					<input type="date" class="form-control" id="end" name="end"
						   min="<?php echo date('Y-m-d'); ?>"
						   value="<?php echo date('Y-m-d', time() + (60 * 60 * 24)); ?>">
				</div>
				<div class="form-group col-md-2">
					<label for="room">Chambres</label>
					<input type="number" class="form-control" id="room" name="room" min="0" max="10" value="1">
				</div>
				<div class="form-group col-md-2">
					<label for="adult">Adultes</label>
					<input type="number" class="form-control" id="adult" name="adult" min="0" max="99"
						   value="1">
				</div>
				<div class="form-group col-md-2">
					<label for="child">Enfants</label>
					<input type="number" class="form-control" id="child" name="child" min="0" max="99"
						   value="0">
				</div>
			</div>

			<br>
			<input type="submit" value="Chercher" class="btn btn-danger">
		</form>
	</div>
</div>

@if (!empty($allRooms))
@foreach ($allRooms as $room)
<div class="opacity-article position-relative overflow-hidden p-4 bg-light">
	<div class="col-md-12 mx-auto my-5">
		<div class="row">
			<div class="col">
				<img src="http://via.placeholder.com/450x350"
					 alt="chambre-{{ strtolower($room->title) }}">
			</div>
			<div class="col">
				<h4>{{$room->title}}</h4>
				<p>{{$room->description}}</p>
			</div>
		</div>
	</div>
</div>
@endforeach

@endif
<br>
<br>
@stop