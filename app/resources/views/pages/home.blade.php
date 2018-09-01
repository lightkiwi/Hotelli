@extends('layouts.visite')

@section('title')
    @lang('global.welcome')
@stop

@section('content')
    <div class="opacity-article position-relative overflow-hidden p-4 bg-light">
        <div class="col-md-8 mx-auto my-5">
            <form action="/search" method="post">
                @csrf
                <label for="searchField">@lang('search.homefield')</label>
                <input type="search" id="searchField" name="searchField" class="form-control"
                       aria-describedby="champs de recherche">
                <small id="searchFieldHelp" class="form-text text-muted">
                    @lang('search.keywordlist')
                </small>
                <br>

                <div class="form-row">
                    <div class="form-group col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <label for="start">@lang('search.arrival')</label>
                        <input type="date" class="form-control" id="start" name="start"
                               min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <label for="end">@lang('search.departure')</label>
                        <input type="date" class="form-control" id="end" name="end"
                               min="<?php echo date('Y-m-d'); ?>"
                               value="<?php echo date('Y-m-d', time() + (60 * 60 * 24)); ?>">
                    </div>
                    <div class="form-group col-xl-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="room">@lang('search.rooms')</label>
                        <input type="number" class="form-control" id="room" name="room" min="0" max="10" value="1">
                    </div>
                    <div class="form-group col-xl-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="adult">@lang('search.adults')</label>
                        <input type="number" class="form-control" id="adult" name="adult" min="0" max="99"
                               value="1">
                    </div>
                    <div class="form-group col-xl-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="child">@lang('search.childrens')</label>
                        <input type="number" class="form-control" id="child" name="child" min="0" max="99"
                               value="0">
                    </div>
                </div>

                <div class="form-row">
                    <span class="mr-2">@lang('global.orderby') : </span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioOptionsNone" value="id" checked>
                        <label class="form-check-label" for="inlineRadioOptionsNone">
                            Aucun
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioOptionsPrice" value="price">
                        <label class="form-check-label" for="inlineRadioOptionsPrice">
                            @lang('search.price')
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioOptionsArea" value="area">
                        <label class="form-check-label" for="inlineRadioOptionsArea">
                            @lang('search.area')
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioOptionsScore" value="score">
                        <label class="form-check-label" for="inlineRadioOptionsScore">
                            @lang('search.score')
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="inlineCheckbox" id="inlineCheckbox" value="true">
                        <label class="form-check-label" for="inlineCheckbox">Inverser</label>
                    </div>
                </div>

                <br>
                <input type="submit" value="Chercher" class="btn btn-danger">
            </form>
        </div>
    </div>

    @if (!empty($rooms))
        @foreach ($rooms as $room)
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
        @endforeach

    @endif
    <br>
    <br>
@stop