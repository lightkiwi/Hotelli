@extends('layouts.admin')

@section('title')
@lang('global.administration')
@stop

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	<h1 class="h2">@lang('admin.dashboard')</h1>
	<!--	<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<button class="btn btn-sm btn-outline-secondary">Export</button>
			</div>
			<button class="btn btn-sm btn-outline-secondary dropdown-toggle">
				<span data-feather="calendar"></span>
				This week
			</button>
		</div>-->
</div>

<h4>@lang('admin.nextBooking')</h4>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>Client</th>
				<th>Nb de personnes</th>
				<th>Chambre</th>
				<th>Date d'arrivée</th>
				<th>Durée</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($lastResa as $resa)
			<tr>
				<td class="inner-table">{{ $resa->last_name }}&nbsp;{{ $resa->first_name }}</td>
				<td class="inner-table">{{ $resa->persons }}</td>
				<td class="inner-table">{{ $resa->number }} - {{ $resa->title }}</td>
				<td class="inner-table">{{ $resa->start }}</td>
				<td class="inner-table">{{ $resa->phone }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div class="col-md-12 center">
	<canvas class="my-4" id="myChart" width="900" height="380"></canvas>
</div>

<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["@lang('global.Monday')", "@lang('global.Tuesday')", "@lang('global.Wednesday')", "@lang('global.Thursday')", "@lang('global.Friday')", "@lang('global.Saturday')", "@lang('global.Sunday')"],
            datasets: [{
                    label: '@lang('admin.statBooking')',
                            data: [39, 45, 83, 03, 29, 22, 34],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
            },
            legend: {
                display: true,
            }
        }
    });
</script>
@stop

