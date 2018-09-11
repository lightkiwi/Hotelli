<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>-->

<!-- Icons -->
<script src="{{ asset('js/feather.min.js') }}"></script>
<script>
feather.replace();</script>

<!-- Graphs -->
<script src="{{ asset('js/Chart2.7.1.min.js') }}"></script>
<script>
var ctx = document.getElementById("myChart");
var ctx1 = document.getElementById("myChart1");
var ctx2 = document.getElementById("myChart2");
var ctx3 = document.getElementById("myChart3");
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
var myChart1 = new Chart(ctx1, {
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
var myChart2 = new Chart(ctx2, {
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
var myChart3 = new Chart(ctx3, {
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