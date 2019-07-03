@extends('layouts.app')

@section('title')
    Adresse de livraison
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h2>Livraison</h2>
            <p>Merci de renseigner une adresse d'expédition</p>
        </div>

        <div class="row">
            <div class="col-md-6 mx-auto mb-3">
                {{ Form::open(['action' => 'ClientOrdersController@ship', 'method' => 'POST']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Nom et prénom :') }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nom et prénom']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('address1', 'Adresse ligne 1 :') }}
                        {{ Form::text('address1', '', ['class' => 'form-control', 'placeholder' => 'Rue, voie, boîte postale']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('address2', 'Adresse ligne 2 :') }}
                        {{ Form::text('address2', '', ['class' => 'form-control', 'placeholder' => 'Bâtiment, étage, lieu-dit']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('postcode', 'Code postal :') }}
                        {{ Form::text('postcode', '', ['class' => 'form-control', 'placeholder' => 'Code postal']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'Ville :') }}
                        {{ Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'Ville']) }}
                    </div>

                    {{ Form::submit('Livrer à cette adresse', ['class' => 'button white float-right']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection