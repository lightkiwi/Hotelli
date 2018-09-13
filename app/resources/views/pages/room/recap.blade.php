@extends('layouts.visite')

@section('title')
    @lang('global.room')
    @if (!empty($room))
        {{ $room->title }}
    @endif
@stop

@section('content')
    @csrf
    @if (!empty($recap))
        @include('layouts.error')
        <div class="opacity-article position-relative overflow-hidden p-4 bg-light">
            <div class="col-md-12 mx-auto my-5">
                <div class="row">
                    <h4>Récapitulatif de votre réservation</h4>
                    <br>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Suite</th>
                            <th scope="col">N°</th>
                            <th scope="col">Dates</th>
                            <th scope="col">Occupants</th>
                            <th scope="col">Prix/nuit</th>
                            <th scope="col">Prix total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $recap['title'] }}</td>
                            <td>{{ $recap['number'] }}</td>
                            <td>{{ $recap['dates'] }}</td>
                            <td>{{ $recap['persons'] }}</td>
                            <td>{{ $recap['price'] }} €</td>
                            <td>{{ $recap['total'] }} €</td>
                        </tr>
                        </tbody>
                    </table>

                    <br>
                </div>

                <a href="/" class="btn btn-dark float-right">Retour</a>
                <a href="javascript:void(0);" onclick="window.print();"
                   class="btn btn-dark float-right mr-2">Imprimer</a>
            </div>
        </div>
    @else
        @include('layouts.404')
    @endif
    <br>
    <br>
@stop
