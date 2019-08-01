@extends('layouts.admin')

@section('title')
    Ajouter une image au slider d'accueil
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajouter une image au slider d'accueil</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                {{ Form::open(['action' => 'SliderController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Titre à afficher :') }}
                        {{ Form::text('title', '', ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('link_name', 'Texte du bouton :') }}
                        {{ Form::text('link_name', '', ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('link', 'Lien du bouton :') }}
                        {{ Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'https://www.moon-noeudpap.fr/contact']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('image', 'Image :') }}
                        <br>
                        {{ Form::file('image', ['class' => 'form-control-file']) }}
                    </div>

                    {{ Form::submit('Ajouter l\'image a la page d\'accueil', ['class' => 'btn btn-primary d-block mx-auto mt-4']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection