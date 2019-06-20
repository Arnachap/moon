@extends('layouts.admin')

@section('title')
    Ajouter un nœd pap'
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajouter un nœd pap'</h1>
    </div>

    <div class="row">
        <div class="col-8 mx-auto">
            {{ Form::open(['action' => 'BowtiesController@store', 'method' => 'POST']) }}
                <div class="form-group">
                    {{ Form::label('name', 'Nom du nœd pap\'') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nom du nœd pap\'']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => '5']) }}
                </div>
                
                <div class="form-group row">
                    {{ Form::label('price', 'Prix du nœd pap\'', ['class' => 'col-3 col-form-label']) }}
                    {{ Form::number('price', '', ['class' => 'form-control col-3']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('collection_id', 'Collection') }}
                    {{ Form::select('collection_id', $collections) }}
                </div>
                
                <div class="form-group">
                    {{ Form::checkbox('available', true, ['class' => 'form-control']) }}
                    {{ Form::label('available', 'Disponible') }}
                </div>

                {{ Form::hidden('photo', 123) }}
                {{ Form::submit('Ajouter le nœd pap\'', ['class' => 'btn btn-primary d-block mx-auto']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection