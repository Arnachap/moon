@extends('layouts.app')

@section('title')
Crée ton Noeud Pap'
@endsection

@section('content')

<div class="page-title">
    <h2>Crée ton Noeud Pap'</h2>
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
                        <img src="/img/create/noeuds-pap/roadster/roadster-bois1.png" id="roadster" class="shape" alt="">
                    </div>
                    
                    <div class="woods upper-menu-category">
                        <img src="/img/create/noeuds-pap/classic/classic-bois1.png" id="bois1" class="wood" alt="">
                        <img src="/img/create/noeuds-pap/classic/classic-bois2.png" id="bois2" class="wood" alt="">
                        <img src="/img/create/noeuds-pap/classic/classic-bois3.png" id="bois3" class="wood" alt="">
                    </div>
                    
                    <div class="tissus upper-menu-category">
                        <img src="/img/create/tissus/menu/tissus1.png" id="tissus1" class="tissu" alt="">
                        <img src="/img/create/tissus/menu/tissus2.png" id="tissus2" class="tissu" alt="">
                        <img src="/img/create/tissus/menu/tissus3.png" id="tissus3" class="tissu" alt="">
                        <img src="/img/create/tissus/menu/tissus4.png" id="tissus4" class="tissu" alt="">
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


@endsection