@extends('layouts.admin')

@section('title')
    Créer un article
@endsection

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Créer un article</h1>
        </div>

        <div class="row">
            <div class="col-8 mx-auto">
                {{ Form::open(['action' => 'ProductsController@store', 'method' => 'POST']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Nom de l\'article') }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nom de l\'article']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Description de l\'article') }}
                        {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description de l\'article', 'rows' => '5']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('price', 'Prix') }}
                        {{ Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Prix']) }}
                    </div>

                    {{ Form::hidden('image', '123') }}
                    {{ Form::hidden('available', true) }}

                    {{ Form::submit('Créer l\'article', ['class' => 'btn btn-primary d-block mx-auto']) }}
                {{ Form::close() }}
            </div>
        </div>
    </main>
@endsection