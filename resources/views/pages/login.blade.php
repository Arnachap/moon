@extends('layouts.app')

@section('title')
Connexion 
@endsection

@section('content')
    <div id="login">
        <div class="container">
            <img src="/img/logo/cat.png" class="img-fluid" alt="">

            <h2>Connexion</h2>

            <div class="row">
                <div class="col-4 mx-auto">
                    <form action="">
                        <div class="form-group">
                            <label for="email">Adresse Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Adresse Email">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                        </div>

                        <button type="submit" class="button">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection