@extends('layouts.admin')

@section('title')
@lang('admin.stat')
@stop

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	<h1 class="h2">@lang('admin.stats')</h1>
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
<div class="row">
	<div class="col-md-6 center">
		<canvas class="my-4" id="myChart1" width="900" height="380"></canvas>
	</div>
	<div class="col-md-6 center">
		<canvas class="my-4" id="myChart2" width="900" height="380"></canvas>
	</div>
	<div class="col-md-12 center">
		<canvas class="my-4" id="myChart" width="900" height="380"></canvas>
	</div>
</div>
@stop
