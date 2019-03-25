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
        <img src="/img/create/noeuds-pap/classic/classic-bois1.png" alt="">
        <img src="/img/create/tissus/tissus1.png" alt="">
    </div>

    <div id="createMenu" class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="upper-menu">
                    <div class="shapes upper-menu-category">
                        <img src="/img/create/noeuds-pap/classic/classic-bois1.png" class="shape" alt="">
                        <img src="/img/create/noeuds-pap/electric/electric-bois1.png" class="shape" alt="">
                        <img src="/img/create/noeuds-pap/heavy/heavy-bois1.png" class="shape" alt="">
                        <img src="/img/create/noeuds-pap/roadster/roadster-bois1.png" class="shape" alt="">
                    </div>
                    
                    <div class="woods upper-menu-category">
                        <img src="/img/create/noeuds-pap/classic/classic-bois1.png" class="woods" alt="">
                        <img src="/img/create/noeuds-pap/classic/classic-bois2.png" class="woods" alt="">
                        <img src="/img/create/noeuds-pap/classic/classic-bois3.png" class="woods" alt="">
                    </div>
                    
                    <div class="tissus upper-menu-category">
                        <img src="/img/create/tissus/tissus1.png" class="tissus" alt="">
                        <img src="/img/create/tissus/tissus2.png" class="tissus" alt="">
                        <img src="/img/create/tissus/tissus3.png" class="tissus" alt="">
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