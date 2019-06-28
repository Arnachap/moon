@extends('layouts.admin')

@section('title')
    Crée ton noeud pap'
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Crée ton noeud pap'</h1>
    </div>

    <div class="card mb-3">
        <div class="card-header" id="headingWoods" data-toggle="collapse" data-target="#collapseWoods" aria-expanded="true" aria-controls="collapseWoods">
            <h4>Bois</h4>
        </div>
    
        <div id="collapseWoods" class="collapse">
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            @foreach($woods as $wood)
                                <div class="col">
                                    <h4 class="text-center">{{ $wood->name }}</h4>

                                    <img src="/img/create/noeuds-pap/classic/classic-bois{{ $wood->id }}.png" class="img-fluid px-5" alt="">

                                    {{ Form::open(['action' => ['MaterialsController@toggleAvailable', $wood->id], 'method' => 'POST']) }}
                                        {{ Form::hidden('_method', 'PUT') }}

                                        @if($wood->available)
                                            {{ Form::submit('Disponible', ['class' => 'btn btn-success d-block mx-auto']) }}
                                        @else
                                            {{ Form::submit('Indisponible', ['class' => 'btn btn-danger d-block mx-auto']) }}
                                        @endif
                                    {{ Form::close() }}
                                </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header" id="headingTissus" data-toggle="collapse" data-target="#collapseTissus" aria-expanded="true" aria-controls="collapseTissus">
            <h4>Tissus</h4>
        </div>
    
        <div id="collapseTissus" class="collapse" aria-labelledby="headingTissus">
            <div class="card-body">
                <ul class="list-group">

                </ul>
            </div>
        </div>
    </div>
@endsection