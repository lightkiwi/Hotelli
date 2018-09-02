@extends('layouts.visite')

@section('title')
    @lang('global.room')
    @if (!empty($room))
        {{ $room->title }}
    @endif
@stop

@section('content')
    <form action="/search" method="post">
        @csrf
        @if (!empty($room))
            <div class="opacity-article position-relative overflow-hidden p-4 bg-light">
                <div class="col-md-12 mx-auto my-5">
                    <div class="row">
                        <div class="col">
                            <img src="{{ (null === $room->path) ? 'http://via.placeholder.com/450x350' : $room->path }}"
                                 alt="chambre-{{ strtolower($room->title) }}">
                        </div>
                        <div class="col">
                            <h4>{{$room->title}}</h4>
                            <p>{{$room->description}}</p>
                            <br>
                            <span class="mr-4"><strong>@lang('search.price') : </strong>{{ $room->price }} €</span>
                            <span class="mr-4"><strong>@lang('search.area') : </strong>{{ $room->area }} m²</span>
                            <span class="mr-4"><strong>@lang('search.score') : </strong>{{ $room->score }}</span>
                        </div>
                    </div>
                    <a href="/room/{{ $room->id }}" class="btn btn-dark float-right">@lang('search.booking')</a>
                </div>
            </div>
        @else
            @include('layouts.404')
        @endif
    </form>
    <br>
    <br>
@stop