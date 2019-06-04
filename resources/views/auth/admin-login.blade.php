@extends('layouts.app')

@section('title')
Administration 
@endsection

@section('content')
    <div id="login">
        <div class="container">
            <div class="row">
                <div class="col-4 mx-auto">
                    <img src="/img/logo/cat.png" class="img-fluid d-block mx-auto" alt="">

                    <h2 class="text-center">Administration</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-4 mx-auto">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Adresse Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Adresse Email" required autofocus>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe" required>
                        </div>

                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>

                        <button type="submit" class="button d-block mx-auto">Connexion</button>

                        <br>

                        <a class="text-muted my-5" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié?') }}
                        </a>

                        <br>
                        
                        <a class="text-muted my-5" href="{{ route('register') }}">
                            {{ __('Pas encore de compte? Créer un compte') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection