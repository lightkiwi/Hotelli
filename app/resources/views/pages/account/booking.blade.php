@extends('layouts.visite')

@section('title')
    @lang('global.welcome')
@stop

@section('content')
    <div class="opacity-article position-relative overflow-hidden p-4 bg-light">
        <div class="col-md-8 mx-auto my-5">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Suite</th>
                    <th scope="col">N°</th>
                    <th scope="col">Dates</th>
                    <th scope="col">Occupants</th>
                    <th scope="col">Prix/nuit</th>
                    <th scope="col">Prix total</th>
                    <th scope="col">Annulation</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($reservations))
                    @foreach($reservations as $key => $reservation)
                        <tr>
                            <th scope="row">{{ (int)$key + 1 }}</th>
                            <td>{{ $reservation['title'] }}</td>
                            <td>{{ $reservation['number'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation['start'])->format('d/m/Y') .
                            ' - '. \Carbon\Carbon::parse($reservation['end'])->format('d/m/Y') }}</td>
                            <td>{{ $reservation['persons'] }}</td>
                            <td>{{ $reservation['price'] }}</td>
                            <td>{{ (int)$reservation['price'] * \Carbon\Carbon::parse($reservation['start'])->diff(\Carbon\Carbon::parse($reservation['end']))->days }}</td>
                            <td><a href="/account/booking/{{ $reservation['id'] }}/{{ $reservation['id_user'] }}"><span data-feather="trash-2"></span></a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script>
        feather.replace();</script>
@stop
