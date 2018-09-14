@extends('layouts.visite')

@section('title')
@lang('global.welcome')
@stop

@section('content')
<div class="opacity-article position-relative overflow-hidden p-4 bg-light">
	<div class="col-md-8 mx-auto my-5">
		<form action="/search" method="post" id="formSearch">
			@csrf
			<label for="searchField">@lang('search.homefield')</label>
			<input type="search" id="searchField" name="searchField" class="form-control"
				   aria-describedby="champs de recherche"
				   @if(isset($_POST['searchField'])) value="{{ $_POST['searchField'] }}" @endif>
				   <small id="searchFieldHelp" class="form-text text-muted">
				@lang('search.keywordlist')
			</small>
			<br>

			<div class="form-row">
				<div class="form-group col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<label for="start">@lang('search.arrival')</label>
					<input type="date" class="form-control" id="start" name="start"
						   min="<?php echo date('Y-m-d'); ?>"
						   @if(isset($_POST['start']) && is_numeric(strtotime(str_replace('/', '-', $_POST['start'])))) value="{{ $_POST['start'] }}"
						   @else value="{{ date('Y-m-d') }}" @endif>
				</div>
				<div class="form-group col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<label for="end">@lang('search.departure')</label>
					<input type="date" class="form-control" id="end" name="end"
						   min="<?php echo date('Y-m-d'); ?>"
						   @if(isset($_POST['end']) && is_numeric(strtotime(str_replace('/', '-', $_POST['end'])))) value="{{ $_POST['end'] }}"
						   @else value="{{ date('Y-m-d', time() + (60 * 60 * 24)) }}" @endif>
				</div>
				<div class="form-group col-xl-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<label for="room">@lang('search.rooms')</label>
					<input type="number" class="form-control" id="room" name="room" min="0" max="10"
						   @if(isset($_POST['room'])) value="{{ $_POST['room'] }}" @else value="1" @endif>
				</div>
				<div class="form-group col-xl-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<label for="adult">@lang('search.adults')</label>
					<input type="number" class="form-control" id="adult" name="adult" min="0" max="99"
						   @if(isset($_POST['adult'])) value="{{ $_POST['adult'] }}" @else value="1" @endif>
				</div>
				<div class="form-group col-xl-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<label for="child">@lang('search.childrens')</label>
					<input type="number" class="form-control" id="child" name="child" min="0" max="99"
						   @if(isset($_POST['child'])) value="{{ $_POST['child'] }}" @else value="0" @endif>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-xl-6 col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<label for="orderSelect">Filtre</label>
					<select class="form-control" name="orderSelect" id="orderSelect">
						<option value="none"
								@if(isset($_POST['orderSelect']) && ('none' == $_POST['orderSelect'])) selected @endif>
                                Aucun
					</option>
					<option value="price_asc"
							@if(isset($_POST['orderSelect']) && ('price_asc' == $_POST['orderSelect'])) selected @endif>
							Prix croissant
				</option>
				<option value="price_desc"
						@if(isset($_POST['orderSelect']) && ('price_desc' == $_POST['orderSelect'])) selected @endif>
						Prix décroissant
			</option>
			<option value="area_asc"
					@if(isset($_POST['orderSelect']) && ('area_asc' == $_POST['orderSelect'])) selected @endif>
					Surface croissante
		</option>
		<option value="area_desc"
				@if(isset($_POST['orderSelect']) && ('area_desc' == $_POST['orderSelect'])) selected @endif>
				Surface décroissante
	</option>
	<option value="score_asc"
			@if(isset($_POST['orderSelect']) && ('score_asc' == $_POST['orderSelect'])) selected @endif>
			Note croissante
</option>
<option value="score_desc"
		@if(isset($_POST['orderSelect']) && ('score_desc' == $_POST['orderSelect'])) selected @endif>
		Note décroissante
</option>
</select>
</div>
</div>

<br>
<input type="submit" value="Chercher" class="btn btn-danger">

@if (!empty($rooms))
<span class="float-right mt-2 text-center">
	<strong>{{ count($rooms) }} @lang('global.result')</strong>

	<br>
	<small><a style="color: inherit;" href="/">@lang('global.empty')</a></small>
</span>
@endif
</form>
</div>
</div>

@if (!empty($rooms) && (count($rooms) > 0))
@foreach ($rooms as $room)
<div class="opacity-article position-relative overflow-hidden p-4">
	<div class="col-md-12 mx-auto my-5">
		<div class="row">
			<div class="col">
				<img src="{{ (null === $room->path) ? 'http://via.placeholder.com/450x350' : $room->path }}"
					 alt="chambre-{{ strtolower($room->title) }}">
			</div>
			<div class="col">
				<h2>{{$room->title}}</h2>
				<p>{{$room->description}}</p>
				<br>
				<span class="mr-4"><strong>@lang('search.price') : </strong>{{ $room->price }} €</span>
				<span class="mr-4"><strong>@lang('search.area') : </strong>{{ $room->area }} m²</span>
				<span class="mr-4"><strong>@lang('search.score') : </strong>{{ $room->score }}</span>
			</div>
		</div>

		<?php
		$request = http_build_query(array(
			'start'	 => $_POST['start'],
			'end'	 => $_POST['end'],
			'room'	 => $_POST['room'],
			'adult'	 => $_POST['adult'],
			'child'	 => $_POST['child'],
		));
		?>

		<a href="/room/{{ $room->id }}?{{ $request }}"
		   class="btn btn-dark float-right">@lang('search.booking')</a>
	</div>
</div>
@endforeach
@elseif(!empty($rooms) && (count($rooms) <= 0))
@include('layouts.empty')
@endif
<br>
<br>
@stop
