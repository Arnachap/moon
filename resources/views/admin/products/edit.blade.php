@extends('layouts.admin')

@section('title')
    Modifier {{ $product->name }}
@endsection

@section('content')
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
                    {{ Form::label('category', 'Catégorie') }}
                    {{ Form::select('category', ['t-shirts' => 'T-shirts', 'earrings' => 'Boucles d\'oreilles', 'caps' => 'Casquettes'], $product->category, ['placeholder' => 'Catégorie', 'class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('price', 'Prix') }}
                    {{ Form::number('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Prix']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('photos[]', 'Ajouter photos de l\'article') }}
                    {{ Form::file('photos[]', ['class' => 'form-control-file', 'multiple' => 'true']) }}
                </div>

                <div class="form-row mt-2">
                    <div class="col-12">
                        <p>Quantité / taille :</p>
                    </div>

                    <div class="form-group col">
                        {{ Form::label('xs', 'XS') }}
                        {{ Form::number('xs', $product->xs, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group col">
                        {{ Form::label('s', 'S') }}
                        {{ Form::number('s', $product->s, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group col">
                        {{ Form::label('m', 'M') }}
                        {{ Form::number('m', $product->m, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group col">
                        {{ Form::label('l', 'L') }}
                        {{ Form::number('l', $product->l, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group col">
                        {{ Form::label('xl', 'XL') }}
                        {{ Form::number('xl', $product->xl, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group col">
                        {{ Form::label('tu', 'Taille unique') }}
                        {{ Form::number('tu', $product->tu, ['class' => 'form-control']) }}
                    </div>
                </div>
                
                {{ Form::hidden('available', true) }}
                {{ Form::hidden('_method', 'PUT') }}

                {{ Form::submit('Modifier l\'article', ['class' => 'btn btn-primary d-block mx-auto']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection