@extends('layouts.admin')

@section('title')
    Créer un article
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Créer un article</h1>
    </div>

    <div class="row">
        <div class="col-8 mx-auto">
            {{ Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="form-group">
                    {{ Form::label('name', 'Nom de l\'article') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nom de l\'article']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Description de l\'article') }}
                    {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description de l\'article', 'rows' => '5']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('category', 'Catégorie') }}
                    {{ Form::select('category', ['t-shirts' => 'T-shirts', 'earrings' => 'Boucles d\'oreilles', 'caps' => 'Casquettes'], null, ['placeholder' => 'Catégorie', 'class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('price', 'Prix') }}
                    {{ Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Prix']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('image', 'Photo de l\'article') }}
                    {{ Form::file('image', ['class' => 'form-control-file']) }}
                </div>


                {{ Form::hidden('available', true) }}

                {{ Form::submit('Créer l\'article', ['class' => 'btn btn-primary d-block mx-auto']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection