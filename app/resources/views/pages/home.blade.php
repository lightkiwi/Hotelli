@extends('layouts.default')

@section('title', 'Accueil')

@section('content')
    <div class="opacity-article position-relative overflow-hidden p-4 bg-light">
        <div class="col-md-8 mx-auto my-5">
            <form action="/search" method="post">
                @csrf
                <label for="searchField">Champs de recherche</label>
                <input type="text" id="searchField" name="searchField" class="form-control" aria-describedby="champs de recherche">
                <small id="searchFieldHelp" class="form-text text-muted">
                    Mots-clé : vue sur mer, balcon, piscine, lit triple, room service.
                </small>
                <br>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="start">Arrivée</label>
                        <input type="date" class="form-control" id="start" name="start">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="end">Départ</label>
                        <input type="date" class="form-control" id="end" name="end">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="room">Chambres</label>
                        <input type="number" class="form-control" id="room">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="adult">Adultes</label>
                        <input type="number" class="form-control" id="adult">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="child">Enfants</label>
                        <input type="number" class="form-control" id="child">
                    </div>
                </div>

                <br>
                <input type="submit" value="Chercher" class="btn btn-danger">
            </form>
        </div>
    </div>
@stop