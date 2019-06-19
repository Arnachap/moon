@extends('layouts.admin')

@section('title')
    Modifier une collection
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modifier une collection</h1>
    </div>

    <div class="row">
        <div class="col-8 mx-auto">
            {{ Form::open(['action' => ['CollectionsController@update', $collection->id], 'method' => 'POST']) }}
                <div class="form-group">
                    {{ Form::label('title', 'Nom de la collection') }}
                    {{ Form::text('title', $collection->title, ['class' => 'form-control', 'placeholder' => 'Nom de la collection']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('intro', 'Introduction') }}
                    {{ Form::textarea('intro', $collection->intro, ['class' => 'form-control', 'placeholder' => 'Introduction', 'rows' => '5']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}

                {{ Form::submit('Modifier la collection', ['class' => 'btn btn-primary d-block mx-auto']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection