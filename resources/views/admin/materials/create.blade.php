@extends('layouts.admin')

@section('title')
    Ajouter un matériau
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajouter un matériau</h1>
    </div>

    <div class="row">
        <div class="col-8 mx-auto">
            {{ Form::open(['action' => 'MaterialsController@store', 'method' => 'POST']) }}
                <div class="form-group">
                    {{ Form::label('name', 'Nom du matériau') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nom du matériau']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('type', 'Type de matériau') }}
                    {{ Form::select('type', ['shape' => 'Forme', 'wood' => 'Bois', 'tissu' => 'Tissu'], null, ['placeholder' => 'Type de matériau']) }}
                </div>

                <div class="form-group">
                    {{ Form::checkbox('available', true, ['class' => 'form-control']) }}
                    {{ Form::label('available', 'Disponible') }}
                </div>

                {{ Form::hidden('image', 123) }}

                {{ Form::submit('Ajouter le matériau', ['class' => 'btn btn-primary d-block mx-auto']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection