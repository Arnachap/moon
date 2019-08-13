@extends('layouts.app')

@section('title')
Le noeud papillon en bois sur-mesure
@endsection

@section('content')

<div id="mainSlider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($slides as $index => $slide)
            <li data-target="#mainSlider" data-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <div class="carousel-inner">
        @foreach($slides as $slide)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-image: url(/storage/slider/{{ $slide->image }});">
                <div class="carousel-caption d-none d-md-block">
                    <h2>{{ $slide->title }}</h2>

                    <a class="button slider-btn" href="{{ $slide->link }}">{{ $slide->link_name }}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div id="createBanner">
    <h2 class="section-title">Crée ton Noeud</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <img src="/img/index/create.png" class="img-fluid mx-auto create-img" alt="">
            </div>
        </div>
        
        <div class="row pt-5">
            <div class="col-6 col-md-3">
                <img src="/img/index/1.png" class="img-fluid mx-auto paw" alt="">
                <p>Choisis<br>ta forme</p>
            </div>

            <div class="col-6 col-md-3">
                <img src="/img/index/2.png" class="img-fluid mx-auto d-block paw" alt="">
                <p>Choisis<br>ta matière</p>
            </div>

            <div class="col-6 col-md-3">
                <img src="/img/index/3.png" class="img-fluid mx-auto d-block paw" alt="">
                <p>Choisis<br>ton tissu</p>
            </div>

            <div class="col-6 col-md-3">
                <img src="/img/index/4.png" class="img-fluid mx-auto d-block paw" alt="">
                <p>Porte ton<br>Noued Pap' Moon</p>
            </div>
            
            <a href="/create" class="button mx-auto">Crée ton Noud Pap'</a>
        </div>
    </div>
</div>

<div id="bowBanner">
    <img src="/img/bow-banner.jpg" alt="Collection noeud papillon en bois Moon">

    <a href="/collection" class="button">Découvrir notre collection</a>
</div>

<div id="links">
    <h2 class="section-title">Nos accessoires</h2>

    <div id="accesories">
        <figure class="main-links">
            <img src="/img/shirt-mini.jpg" alt="T-shirt Moon">
    
            <figcaption>
                <h3>T-shirt</h3>
            </figcaption>
    
            <a href="/products/t-shirts"></a>
        </figure>
    
        <figure class="main-links"><img src="/img/earing-mini.jpg" alt="Boucles d'oreille Moon">
    
            <figcaption>
                <h3>Boucles d'oreille</h3>
            </figcaption>
    
            <a href="/products/earrings"></a>
        </figure>
        <figure class="main-links"><img src="/img/cap-mini.jpg" alt="Casquettes Moon">
    
            <figcaption>
                <h3>Casquette</h3>
            </figcaption>
    
            <a href="/products/caps"></a>
        </figure>
    </div>
</div>

@endsection