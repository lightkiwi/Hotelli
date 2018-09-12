@extends('layouts.visite')

@section('title')
    @lang('global.room')
    @if (!empty($room))
        {{ $room->title }}
    @endif
@stop

@section('content')
    <form action="/booking/now" method="post">
        @csrf
        @if (!empty($request))
            @include('layouts.error')
            <div class="opacity-article position-relative overflow-hidden p-4 bg-light">
                <div class="col-md-12 mx-auto my-5">
                    <h4>Vos données de réservation</h4>
                    <br>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-7">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="last_name" placeholder="Nom">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="first_name" placeholder="Prénom">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="room"
                           value="{{ isset($_REQUEST['room']) ? $_REQUEST['room']: 0 }}">
                    <input type="hidden" name="adult"
                           value="{{ isset($_REQUEST['adult']) ? $_REQUEST['adult']: 0 }}">
                    <input type="hidden" name="child"
                           value="{{ isset($_REQUEST['child']) ? $_REQUEST['child']: 0 }}">

                    <input type="hidden" name="dates" value="{{ $_REQUEST['dates'] }}">
                    <input type="hidden" name="id" value="{{ $request->id_room }}">

                    <input type="submit" class="btn btn-dark" value="@lang('search.booking')">
                    <br>
                    <br>
                    <a href="/login">Vous avez un compte ? connectez-vous.</a>
                </div>
            </div>
        @else
            @include('layouts.404')
        @endif
    </form>
    <br>
    <br>
@stop
