@extends('layouts.admin')

@section('title')
@lang('global.administration')
@stop

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	<h1 class="h2">@lang('admin.dashboard')</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group mr-2">
			<button class="btn btn-sm btn-outline-secondary">Export</button>
		</div>
		<button class="btn btn-sm btn-outline-secondary dropdown-toggle">
			<span data-feather="calendar"></span>
			This week
		</button>
	</div>
</div>

<h2>@lang('admin.lastBooking')</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>Date de réservation</th>
				<th>Client</th>
				<th>Nb de personnes</th>
				<th>Chambre</th>
				<th>Date d'arrivée</th>
				<th>Durée</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1,001</td>
				<td>Lorem</td>
				<td>ipsum</td>
				<td>ipsum</td>
				<td>dolor</td>
				<td>sit</td>
			</tr>
			<tr>
				<td>1,002</td>
				<td>amet</td>
				<td>consectetur</td>
				<td>adipiscing</td>
				<td>adipiscing</td>
				<td>elit</td>
			</tr>
			<tr>
				<td>1,003</td>
				<td>Integer</td>
				<td>nec</td>
				<td>odio</td>
				<td>Praesent</td>
				<td>Praesent</td>
			</tr>
			<tr>
				<td>1,003</td>
				<td>libero</td>
				<td>libero</td>
				<td>Sed</td>
				<td>cursus</td>
				<td>ante</td>
			</tr>
			<tr>
				<td>1,004</td>
				<td>dapibus</td>
				<td>diam</td>
				<td>diam</td>
				<td>Sed</td>
				<td>nisi</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="col-md-12 center">
	<canvas class="my-4" id="myChart" width="900" height="380"></canvas>
</div>

@stop

