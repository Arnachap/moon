@extends('layouts.admin')

@section('title')
    Modifier slide "{{ $slide->title }}"
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modifier slide "{{ $slide->title }}"</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                {{ Form::open(['action' => ['SliderController@update', $slide->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Titre à afficher :') }}
                        {{ Form::text('title', $slide->title, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('link_name', 'Texte du bouton :') }}
                        {{ Form::text('link_name', $slide->link_name, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('link', 'Lien du bouton :') }}
                        {{ Form::text('link', $slide->link, ['class' => 'form-control', 'placeholder' => 'https://www.moon-noeudpap.fr/contact']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('image', 'Image :') }}
                        <br>
                        {{ Form::file('image', ['class' => 'form-control-file']) }}
                    </div>
                    
                    {{ Form::hidden('_method', 'PUT') }}

                    {{ Form::submit('Modifier la slide', ['class' => 'btn btn-primary d-block mx-auto mt-4']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection