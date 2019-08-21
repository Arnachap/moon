@extends('layouts.app')

@section('title')
L'entreprise
@endsection

@section('content')

<div class="container-fluid" id="about">
    <div class="row">
        <div class="intro">
            <img src="/img/logo/logo-full-blanc.png" alt="Logo Moon noeud papillon en bois recyclé">
            <h2>Qu'est-ce que Moon?</h2>
            <p>Moon, c’est la création de nœuds papillon, sous toutes leurs formes et matières, notamment en bois (meubles, palettes...) et tissus recyclés.</p>
        </div>
    </div>
</div>

<div id="concept" class="container-fluid">
    <h2 class="section-title">Notre Concept</h2>

    <div class="row">
        <div class="col-sm-6">
            <img src="/img/about/concept.jpg" class="img-fluid" alt="Moon noeud papillon en bois recyclé">
        </div>

        <div class="col-sm-6">
            <ul>
                <li>
                    <i class="far fa-hand-peace"></i>
                    <h3>Fabrication à la main</h3>
                </li>

                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Fabriqué en Lorraine</h3>
                </li>

                <li>  
                    <i class="fa fa-recycle"></i>
                    <h3>Matériaux recyclés</h3>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="recycle">
    <div class="container">
        <h2 class="section-title">Moon recycle</h2>

        <div class="row">
            <div class="col-sm-6">
                <h3>Tu veux participer au projet Moon?<br>Recyclons ensemble !</h3>

                <p>Nous collectons bois et tissus pour leur donner une seconde vie. Le surplus de matériaux est ensuite reversé à des associations qui les revaloriseront à leur tour.</p>

                <p>N’hésites pas à nous contacter, pour qu’on récupère le meuble qui traîne dans ton grenier, tes anciens skates stockés au fond du garage, les palettes dont tu ne sais pas quoi faire, les chemises et pantalons qui restent dans un carton, mais aussi tout autres objets pouvant prendre la forme d’un nœud pap’. Engageons-nous ! Soyons Moon !</p>

                <p class="text-center">Tu veux recycler avec nous ?</p>
                
                <p class="text-center">
                    <a href="/contact" class="button">Contacte-nous !</a>
                </p>
            </div>

            <div class="col-sm-6">
                <img src="/img/about/recycle.png" class="img-fluid" alt="noeud papillon en bois recyclé">
            </div>
        </div>
    </div>
</div>

<div id="banner"></div>

<div id="moonExpo">
    <img src="/img/about/expo.png" class="d-block mx-auto title" alt="noeud expo papillon en bois recyclé artiste">

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img src="/img/about/van.png" class="img-fluid m-auto" alt="noeud papillon en bois recyclé">
            </div>

            <div class="col-sm-7">
                <h3>De l'art au travers de Nœuds Papillon</h3>

                <p>Moon Expo : un projet qui complète l’univers Moon et qui propose une nouvelle façon de sublimer les nœuds papillon. Ainsi chaque mois, au minimum un artiste pourra proposer son art sur un Moon Pap’. L’artiste a carte blanche et il est seul maître du destin de ce bout de bois.</p>
            </div>
        </div>
    </div>
</div>

@endsection