@extends('layouts.app')

@section('content')

<div id="mainSlider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#mainSlider" data-slide-to="0" class="active"></li>
        <li data-target="#mainSlider" data-slide-to="1"></li>
        <li data-target="#mainSlider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">

        <div class="carousel-caption d-none d-md-block">
            <h2>Le Noeud Papillon sur-mesure</h2>

            <a class="button slider-btn" href="/create">Crée mon Noeud Pap'</a>
        </div>
        </div>

        <div class="carousel-item">

        <div class="carousel-caption d-none d-md-block">
            <h2>Moon, c'est aussi des t-shirts, des casquettes,
                <br>et pleins d'autres accessoires !</h2>

            <a class="button slider-btn" href="/create">Nos accessoires</a>
        </div>
        </div>

        <div class="carousel-item">

        <div class="carousel-caption d-none d-md-block">
            <h2>Moon, c'est avant tout un concept...</h2>

            <a class="button slider-btn" href="/about">En savoir plus</a>
        </div>
        </div>
    </div>
</div>

<div id="createBanner">
    <a href="/create">
        <img src="img/create.png" alt="Créer son noeud papillon en bois sur-mesure">
    </a>
</div>

<div id="bowBanner">
    <img src="/img/bow-banner.jpg" alt="Collection noeud papillon en bois Moon">

    <a href="/collections" class="button">Découvrir nos collections</a>
</div>

<div id="links">
    <h2 class="section-title">Nos accessoires</h2>

    <div id="accesories">
        <figure class="main-links">
            <img src="/img/shirt-mini.jpg" alt="T-shirt Moon">
    
            <figcaption>
                <h3>T-shirt</h3>
            </figcaption>
    
            <a href="/shirts"></a>
        </figure>
    
        <figure class="main-links"><img src="/img/earings-mini.jpg" alt="Boucles d'oreille Moon">
    
            <figcaption>
                <h3>Boucles d'oreille</h3>
            </figcaption>
    
            <a href="/earings"></a>
        </figure>
        <figure class="main-links"><img src="/img/cap-mini.jpg" alt="Casquettes Moon">
    
            <figcaption>
                <h3>Casquette</h3>
            </figcaption>
    
            <a href="/caps"></a>
        </figure>
    </div>
</div>

@endsection