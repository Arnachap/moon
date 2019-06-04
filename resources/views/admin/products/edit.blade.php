@extends('layouts.admin')

@section('title')
    Modifier {{ $product->name }}
@endsection

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Modifier {{ $product->name }}</h1>
        </div>

        <div class="row">
            <div class="col-8 mx-auto">
                {{ Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Nom de l\'article') }}
                        {{ Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Nom de l\'article']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Description de l\'article') }}
                        {{ Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description de l\'article', 'rows' => '5']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('price', 'Prix') }}
                        {{ Form::number('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Prix']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('image', 'Photo de l\'article') }}
                        {{ Form::file('image', ['class' => 'form-control-file']) }}
                    </div>
                    
                    {{ Form::hidden('available', true) }}
                    {{ Form::hidden('_method', 'PUT') }}

                    {{ Form::submit('Modifier l\'article', ['class' => 'btn btn-primary d-block mx-auto']) }}
                {{ Form::close() }}
            </div>
        </div>
    </main>
@endsection