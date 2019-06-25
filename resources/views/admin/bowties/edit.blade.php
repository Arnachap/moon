@extends('layouts.admin')

@section('title')
    Modifier le nœd pap' {{ $bowtie->name }}
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modifier le nœd pap' {{ $bowtie->name }}</h1>
    </div>

    <div class="row">
        <div class="col-8 mx-auto">
            {{ Form::open(['action' => ['BowtiesController@update', $bowtie->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="form-group">
                    {{ Form::label('name', 'Nom du nœd pap\'') }}
                    {{ Form::text('name', $bowtie->name, ['class' => 'form-control', 'placeholder' => 'Nom du nœd pap\'']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textarea('description', $bowtie->description, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => '5']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('photo', 'Photo du noeud pap\' :') }}
                    <br>
                    {{ Form::file('photo') }}
                </div>

                <br>
                
                <div class="form-group">
                    {{ Form::label('price', 'Prix du nœd pap\'') }}
                    {{ Form::number('price', $bowtie->price) }}
                </div>

                <br>

                <div class="form-group">
                    {{ Form::label('collection_id', 'Collection') }}
                    {{ Form::select('collection_id', $collections, $bowtie->collection) }}
                </div>
                
                <div class="form-group">
                    {{ Form::checkbox('available', true, ['class' => 'form-control']) }}
                    {{ Form::label('available', 'Disponible') }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Modifier le nœd pap\'', ['class' => 'btn btn-primary d-block mx-auto']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection