@extends('layouts.visite')

@section('title')
    @lang('global.room')
    @if (!empty($room))
        {{ $room->title }}
    @endif
@stop

@section('content')
    <form action="/room" method="post">
        @csrf
        @if (!empty($room))
            @include('layouts.error')
            <div class="opacity-article position-relative overflow-hidden p-4 bg-light">
                <div class="col-md-12 mx-auto my-5">
                    <div class="row">
                        <div class="col">
                            <img src="{{ (null === $room->path) ? 'http://via.placeholder.com/450x350' : $room->path }}"
                                 alt="chambre-{{ strtolower($room->title) }}">
                        </div>
                        <div class="col">
                            <h4>{{ $room->title }}</h4>
                            <p>{{ $room->description }}</p>
                            <br>
                            <span class="mr-4"><strong>@lang('search.price') : </strong>{{ $room->price }} €</span>
                            <span class="mr-4"><strong>@lang('search.area') : </strong>{{ $room->area }} m²</span>
                            <span class="mr-4"><strong>@lang('search.score') : </strong>{{ $room->score }}</span>

                            <br><br>
                            <div class="form-group">
                                <label for="dates"><strong>Date de réservation :</strong></label>
                                <?php
                                $date_range = date('d/m/Y', strtotime($request['start'])) . ' - ' . date('d/m/Y', strtotime($request['end']));
                                ?>

                                <input type="hidden" name="id_room" value="{{ $room->id }}">
                                {{--<input type="hidden" name="start" value="{{ $_REQUEST['start'] }}">--}}
                                {{--<input type="hidden" name="end" value="{{ $_REQUEST['end'] }}">--}}
                                <input type="hidden" name="room"
                                       value="{{ isset($_REQUEST['room']) ? $_REQUEST['room']: 0 }}">
                                <input type="hidden" name="adult"
                                       value="{{ isset($_REQUEST['adult']) ? $_REQUEST['adult']: 0 }}">
                                <input type="hidden" name="child"
                                       value="{{ isset($_REQUEST['child']) ? $_REQUEST['child']: 0 }}">

                                <input type="text" name="dates" value="{{ $date_range }}">
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-dark float-right" value="@lang('search.booking')">
                </div>
            </div>
            <script>
                var dates = @json($dates);
            </script>
            <script type="text/javascript" src="{{ asset('js/room.js') }}"></script>
        @else
            @include('layouts.404')
        @endif
    </form>
    @if(!empty($room))
        <form action="/room/comment" method="post">
            @csrf
            @include('layouts.error')
            <div class="opacity-article position-relative overflow-hidden p-4 bg-light">
                <div class="col-md-12 mx-auto my-5">
                    <h4>Commentaires</h4>

                    <ul class="list-group list-group-flush">
                        @if(isset($comments))
                            @foreach($comments as $comment)
                                <li class="list-group-item">
                                    <p>Par <strong>{{ $comment->first_name }}</strong>
                                        le {{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y') }}, note
                                        : {{ $comment->score }}</p>
                                    <p>{{ $comment->text }}</p>
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <br>

                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="form-group">
                            <label for="comment">Poster un commentaire : </label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="note">Note : <span id="rangeInput">4</span></label>
                            <input type="range" class="custom-range" min="0" max="5" step="1" value="4" id="note"
                                   name="note"
                                   onchange="$('#rangeInput').empty(); $('#rangeInput').append(this.value);">

                        </div>

                        <input type="hidden" name="start" value="{{  $request['start'] }}">
                        <input type="hidden" name="end" value="{{  $request['end'] }}">

                        <input type="hidden" name="id" value="{{ $room->id }}">
                        <input type="submit" class="btn btn-dark" value="Poster">
                    @else
                        <a href="/login">Pour poster connectez-vous.</a>
                    @endif
                </div>
            </div>
        </form>
    @endif
    <br>
    <br>
@stop
