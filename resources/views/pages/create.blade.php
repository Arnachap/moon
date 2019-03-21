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
                <div class="shapes">
                    <div class="shape">
                        <img src="/img/create/noeuds-pap/classic/classic-bois1.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4 sub-menu">
                <h3 class="shape-btn">Forme</h3>
            </div>
    
            <div class="col-4 sub-menu">
                <h3>Bois</h3>
            </div>
    
            <div class="col-4 sub-menu">
                <h3>Tissus</h3>
            </div>
        </div>
    </div>
</div>

@endsection