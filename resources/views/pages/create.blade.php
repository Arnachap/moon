@extends('layouts.app')

@section('title')
Crée ton Noeud Pap'
@endsection

@section('content')

<div class="page-title">
    <h2>Crée ton Noeud Pap</h2>
    <p>Élabore un noeud papillon en bois à ton image.</p>
</div>

<div id="create">
    <div id="createImg">
        <img id="bowtie" src="/img/create/noeuds-pap/classic/classic-1.png" alt="">
        <img id="tissu" src="/img/create/tissus/image/tissus1.png" alt="">
    </div>

    <div id="createMenu" class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="upper-menu">
                    <div class="shapes upper-menu-category">
                        <div class="row">
                            <div class="col-6 col-sm-2">
                                <img src="/img/create/noeuds-pap/classic/classic-1.png" id="classic" class="shape d-block mx-auto" alt="">

                                <small>Classic</small>
                            </div>
    
                            <div class="col-6 col-sm-2">
                                <img src="/img/create/noeuds-pap/electric/electric-1.png" id="electric" class="shape d-block mx-auto" alt="">

                                <small>Electric</small>
                            </div>
                            
                            <div class="col-6 col-sm-2">
                                <img src="/img/create/noeuds-pap/heavy/heavy-1.png" id="heavy" class="shape d-block mx-auto" alt="">
                                
                                <small>Heavy</small>
                            </div>
                            
                            <div class="col-6 col-sm-2">
                                <img src="/img/create/noeuds-pap/heavy-light/heavy-light-1.png" id="heavy-light" class="shape d-block mx-auto" alt="">

                                <small>Heavy Light</small>
                            </div>
                            
                            <div class="col-6 col-sm-2">
                                <img src="/img/create/noeuds-pap/roadster/roadster-1.png" id="roadster" class="shape d-block mx-auto" alt="">

                                <small>Roadster</small>
                            </div>
    
                            <div class="col-6 col-sm-2 position-relative">
                                <img src="/img/create/noeuds-pap/roadster-light/roadster-light-1.png" id="roadster-light" class="shape d-block mx-auto" alt="">

                                <small>Roadster Light</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="woods upper-menu-category">
                        <div class="row">
                            @foreach($woods as $wood)
                                @if($wood->available)
                                    <div class="col">
                                        <img src="/img/create/noeuds-pap/classic/classic-{{ $wood->id }}.png" id="{{ $wood->id }}" class="wood d-block mx-auto" alt="">

                                        <small>{{ $wood->name }}</small>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="tissus upper-menu-category">
                        <div class="row overflow-auto">
                            @foreach($tissus as $tissu)
                                <div class="col">
                                    <img src="/storage/tissus/small_{{ $tissu->filename }}" id="{{ $tissu->filename }}" data-tissu="{{ $tissu->name }}" class="tissu d-block mx-auto" alt="">

                                    <small>{{ $tissu->name }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row sub-menu">
            <div class="col-12 col-md-4">
                <h3 class="sub-menu-btn" id="shapesBtn">Forme</h3>
            </div>
    
            <div class="col-12 col-md-4">
                <h3 class="sub-menu-btn" id="woodsBtn">Bois</h3>
            </div>
    
            <div class="col-12 col-md-4">
                <h3 class="sub-menu-btn" id="tissusBtn">Tissus</h3>
            </div>
        </div>
    </div>
</div>

<div id="options">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="row">
                    <div class="col-12">
                        <h3>Taille</h3>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <div class="size-select">
                            <input id="male" class="radio-btn" type="radio" name="size" value="male" checked>

                            <div class="radio-tile">
                                <i class="fa fa-male"></i>
                                <label for="male">Homme</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <div class="size-select">
                            <input id="female" class="radio-btn" type="radio" name="size" value="female">
                            
                            <div class="radio-tile">
                                <i class="fa fa-female"></i>
                                <label for="female">Femme</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <div class="size-select">
                            <input id="child" class="radio-btn" type="radio" name="size" value="child">

                            <div class="radio-tile">
                                <i class="fa fa-child"></i>
                                <label for="child">Enfant</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div id="priceSection">
                    <h3 class="price-title">Prix</h3>

                    <h3 class="price">40 €</h3>

                    <p class="delivery-time"><i class="fa fa-calendar"></i>  Livraison: 3-5 jours</p>

                    {{ Form::open(['action' => 'CartController@addBowtieToCart', 'method' => 'POST']) }}
                        {{ Form::hidden('shape', 'classic',['id' => 'formShape']) }}
                        
                        {{ Form::hidden('wood', 1,['id' => 'formWood']) }}
                        
                        {{ Form::hidden('tissu', '',['id' => 'formTissu']) }}


                        {{ Form::submit('Ajouter au panier', ['class' => 'add-basket']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div> 
    </div>
</div>

@endsection