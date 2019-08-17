@extends('layouts.app')

@section('title')
Créer un compte 
@endsection

@section('content')
    <div id="login">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mx-auto">
                    <img src="/img/logo/cat.png" class="img-fluid d-block mx-auto" alt="">

                    <h2 class="text-center">Créer un compte</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 mx-auto">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Votre nom</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Adresse Email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirmer mot de passe</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer mot de passe" required>
                        </div>

                        <button type="submit" class="button d-block mx-auto">Créer un compte</button>

                        <br>
                        
                        <a class="text-info my-5" href="{{ route('register') }}">
                            {{ __('Vous avez déjà un compte? Connectez-vous !') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
