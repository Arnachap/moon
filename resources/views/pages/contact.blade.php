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
            <form action="#" method="POST" class="mb-5">
                <div class="form-group">
                    <label for="">Votre nom <span class="text-danger">*</span> :</label>
                    <input class="form-control" type="text" placeholder="Nom">
                </div>
                
                <div class="form-group">
                    <label for="">Votre Email <span class="text-danger">*</span> :</label>
                    <input class="form-control" type="email" placeholder="Email">
                </div>
                
                <div class="form-group">
                    <label for="">Votre numéro de téléphone :</label>
                    <input class="form-control" type="tel" placeholder="Téléphone">
                </div>
                
                <div class="form-group">
                    <label for="">Sujet du message <span class="text-danger">*</span> :</label>
                    <input class="form-control" type="text" placeholder="Sujet">
                </div>
                
                <div class="form-group">
                    <label for="">Message <span class="text-danger">*</span> :</label>
                    <textarea class="form-control" type="text" placeholder="Message" rows="5"></textarea>
                </div>

                <p class="text-muted"><span class="text-danger">*</span> Champs obligatoires</p>
                <button type="submit" class="button d-block mx-auto">Envoyer</button>
            </form>
        </div>
    </div>
</div>
@endsection