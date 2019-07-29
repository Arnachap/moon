@extends('layouts.admin')

@section('title')
    Créer un Codes Promo
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Créer un Codes Promo</h1>
    </div>

    <div class="contrainer">
        <div class="row">
            <div class="col-6 mx-auto">
                {{ Form::open(['action' => 'PromoCodesController@store', 'method' => 'POST']) }}
                    {{ Form::label('code', 'Code promo :') }}
                    {{ Form::text('code', '', ['class' => 'form-control']) }}

                    {{ Form::label('percentage', 'Pourcentage de réduction :') }}
                    {{ Form::number('percentage', 1, ['class' => 'form-control']) }}

                    {{ Form::label('expiration', 'Date d\'éxpiration :', ['class' => 'mt-3']) }}
                    <br>
                    {{ Form::date('expiration', \Carbon\Carbon::now()) }}
                    <br>

                    {{ Form::submit('Créer le code promo', ['class' => 'mt-3 d-block mx-auto btn btn-success']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection