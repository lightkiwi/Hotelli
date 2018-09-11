@extends('layouts.visite')

@section('title')
    @lang('global.welcome')
@stop

@section('content')
    <div class="opacity-article position-relative overflow-hidden p-4 bg-light">
        <div class="col-md-8 mx-auto my-5">
            @if(isset($user))
                <form action="/account" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="last_name">Nom</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                   value="{{ $user['last_name'] }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="first_name">Prénom</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                   value="{{ $user['first_name'] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        @if(isset($genders))
                            <div class="form-group col-md-6">
                                <label for="genders">Genre</label>
                                <select class="form-control" id="genders" name="genders">
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender['id'] }}">{{ $gender['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   value="{{ $user['email'] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group  col-md-12">
                            <label for="address_line">Voie</label>
                            <input type="text" class="form-control" name="address_line" id="address_line"
                                   value="{{ $user['address_line'] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group  col-md-6">
                            <label for="city">Ville</label>
                            <input type="text" class="form-control" name="city" id="city"
                                   value="{{ $user['city'] }}">
                        </div>
                        <div class="form-group  col-md-3">
                            <label for="region">Région</label>
                            <input type="text" class="form-control" name="region" id="region"
                                   value="{{ $user['region'] }}">
                        </div>
                        <div class="form-group  col-md-3">
                            <label for="zip">Code postal</label>
                            <input type="text" class="form-control" name="zip" id="zip"
                                   value="{{ $user['zip'] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group  col-md-6">
                            <label for="country">Pays</label>
                            <input type="text" class="form-control" name="country" id="country"
                                   value="{{ $user['country'] }}">
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="phone">Téléphone</label>
                            <input type="phone" class="form-control" name="phone" id="phone"
                                   value="{{ $user['phone'] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group  col-md-6">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="confirm_password">Confirmation du mot de passe</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                            <label class="form-check-label" for="newsletter">
                                Newsletter
                            </label>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $user['id'] }}">

                    <input type="submit" value="Valider les modifications" class="btn btn-dark">
                </form>
            @else
                @include('layouts.404')
            @endif
        </div>
    </div>
    <br>
    <br>
@stop
