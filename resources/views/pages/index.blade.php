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

            <a class="slider-btn" href="/create">Crée mon Noeud Pap'</a>
        </div>
        </div>

        <div class="carousel-item">

        <div class="carousel-caption d-none d-md-block">
            <h2>Moon, c'est aussi des t-shirts, des casquettes,
                <br>et pleins d'autres accessoires !</h2>

            <a class="slider-btn" href="/create">Nos accessoires</a>
        </div>
        </div>

        <div class="carousel-item">

        <div class="carousel-caption d-none d-md-block">
            <h2>Moon, c'est avant tout un concept...</h2>

            <a class="slider-btn" href="/about">En savoir plus</a>
        </div>
        </div>
    </div>
</div>

<div id="createBanner">
    <a href="/create">
        <img src="img/create.png" alt="">
    </a>
</div>

<div id="links">
    <figure class="main-links">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample89.jpg" alt="sample89">

        <figcaption>
            <h3>T-shirt</h3>
        </figcaption>

        <a href="#"></a>
    </figure>

    <figure class="main-links"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample94.jpg" alt="sample94">

        <figcaption>
            <h3>Boucles d'oreille</h3>
        </figcaption>

        <a href="#"></a>
    </figure>
    <figure class="main-links"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample92.jpg" alt="sample92">

        <figcaption>
            <h3>Casquette</h3>
        </figcaption>

        <a href="#"></a>
    </figure>
</div>

@endsection