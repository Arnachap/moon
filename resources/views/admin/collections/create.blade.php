@extends('layouts.admin')

@section('title')
    Créer une collection
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Créer une collection</h1>
    </div>

    <div class="row">
        <div class="col-8 mx-auto">
            {{ Form::open(['action' => 'CollectionsController@store', 'method' => 'POST']) }}
                <div class="form-group">
                    {{ Form::label('title', 'Nom de la collection') }}
                    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Nom de la collection']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('intro', 'Introduction') }}
                    {{ Form::textarea('intro', '', ['class' => 'form-control', 'placeholder' => 'Introduction', 'rows' => '5']) }}
                </div>

                {{ Form::submit('Créer la collection', ['class' => 'btn btn-primary d-block mx-auto']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection