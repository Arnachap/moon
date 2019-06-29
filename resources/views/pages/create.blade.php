@extends('layouts.app')

@section('title')
Crée ton Noeud Pap'
@endsection

@section('content')

<div class="page-title">
    <h2>Cree ton Noeud Pap</h2>
    <p>Élabore un noeud papillon en bois à ton image.</p>
</div>

<div id="create">
    <div id="createImg">
        <img id="bowtie" src="/img/create/noeuds-pap/classic/classic-bois1.png" alt="">
        <img id="tissu" src="/img/create/tissus/image/tissus1.png" alt="">
    </div>

    <div id="createMenu" class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="upper-menu">
                    <div class="shapes upper-menu-category">
                        <img src="/img/create/noeuds-pap/classic/classic-bois1.png" id="classic" class="shape" alt="">
                        <img src="/img/create/noeuds-pap/electric/electric-bois1.png" id="electric" class="shape" alt="">
                        <img src="/img/create/noeuds-pap/heavy/heavy-bois1.png" id="heavy" class="shape" alt="">
                        <img src="/img/create/noeuds-pap/heavy-light/heavy-light-bois1.png" id="heavy-light" class="shape" alt="">
                        <img src="/img/create/noeuds-pap/roadster/roadster-bois1.png" id="roadster" class="shape" alt="">
                        <img src="/img/create/noeuds-pap/roadster-light/roadster-light-bois1.png" id="roadster-light" class="shape" alt="">
                    </div>
                    
                    <div class="woods upper-menu-category">
                        @foreach($woods as $wood)
                            @if($wood->available)
                                <img src="/img/create/noeuds-pap/classic/classic-bois{{ $wood->id }}.png" id="bois{{ $wood->id }}" class="wood" alt="">
                            @endif
                        @endforeach
                    </div>
                    
                    <div class="tissus upper-menu-category">
                        @foreach($tissus as $tissu)
                            <img src="/storage/tissus/small_{{ $tissu->filename }}" id="{{ $tissu->filename }}" class="tissu" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row sub-menu">
            <div class="col-4">
                <h3 class="sub-menu-btn" id="shapesBtn">Forme</h3>
            </div>
    
            <div class="col-4">
                <h3 class="sub-menu-btn" id="woodsBtn">Bois</h3>
            </div>
    
            <div class="col-4">
                <h3 class="sub-menu-btn" id="tissusBtn">Tissus</h3>
            </div>
        </div>
    </div>
</div>

<div id="options">
    <div class="container">
        <div class="row" style="height: 200vh">
            <div class="col-8">
                <form action="#">
                    <input type="hidden" name="shape">
                    <input type="hidden" name="wood">
                    <input type="hidden" name="tissu">
                    
                    <div class="row">
                        <div class="col-12">
                            <h3>Taille</h3>
                        </div>

                        <div class="col-4">
                            <div class="size-select">
                                <input id="male" class="radio-btn" type="radio" name="size" value="male" checked>

                                <div class="radio-tile">
                                    <i class="fa fa-male"></i>
                                    <label for="male">Homme</label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-4">
                            <div class="size-select">
                                <input id="female" class="radio-btn" type="radio" name="size" value="female">
                                
                                <div class="radio-tile">
                                    <i class="fa fa-female"></i>
                                    <label for="female">Femme</label>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-4">
                            <div class="size-select">
                                <input id="child" class="radio-btn" type="radio" name="size" value="child">

                                <div class="radio-tile">
                                    <i class="fa fa-child"></i>
                                    <label for="child">Enfant</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-4">
                <div id="priceSection">
                    <h3 class="price-title">Prix</h3>

                    <h3 class="price">40 €</h3>

                    <p class="delivery-time"><i class="fa fa-calendar"></i>  Livraison: 2-4 jours</p>

                    <button class="add-basket">Ajouter au panier</button>
                </div>
            </div>
        </div> 
    </div>
</div>

@endsection