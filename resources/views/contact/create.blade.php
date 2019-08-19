@extends('layouts.app')

@section('title')
    Nous contacter
@endsection

@section('content')
<div class="page-title">
    <h2>Nous contacter</h2>
    <p>Une question? Une suggestion? Ou simplement l'envie de nous envoyer un petit message?
        <br>Nous sommes à votre écoute.</p>
</div>

<div class="container" id="contact">
    <div class="row">
        <div class="col-md-6 mx-auto">
            {{ Form::open(['action' => 'ContactFormController@store', 'method' => 'POST', 'class' => 'mb-5']) }}
                <div class="form-group">
                    {{ Form::label('name', 'Votre nom') }} <span class="text-danger">*</span> :
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nom']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('email', 'Votre Email') }} <span class="text-danger">*</span> :
                    {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('subject', 'Sujet du message') }} <span class="text-danger">*</span> :
                    {{ Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Sujet']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('message', 'Message') }} <span class="text-danger">*</span> :
                    {{ Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Message', 'rows' => '5']) }}
                </div>

                <p class="text-muted"><span class="text-danger">*</span> Champs obligatoires</p>

                {{ Form::submit('Envoyer', ['class' => 'button white d-block mx-auto']) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection