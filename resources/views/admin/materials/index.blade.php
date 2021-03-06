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
                                    <h4 class="text-center">
                                        {{ $wood->name }} 
                                        <a href="#" class="text-info" data-toggle="modal" data-target="#editName{{ $wood->id }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </h4>

                                    <img src="/img/create/noeuds-pap/classic/classic-{{ $wood->id }}.png" class="img-fluid px-5" alt="noeud papillon en bois recyclé">

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
            <h4 class="float-left">Tissus</h4>

            <div class="float-right mt-1">
                <button type="button" class="btn py-0 border-0" data-toggle="modal" data-target="#addTissu">
                    <i class="fas fa-plus text-success pb-2" data-toggle="tooltip" data-placement="left" title="Ajouter un tissu"></i>
                </button>
            </div>
        </div>
    
        <div id="collapseTissus" class="collapse" aria-labelledby="headingTissus">
            <div class="card-body">
                <div class="row">
                    @foreach($tissus as $tissu)
                        <div class="col-3">
                            <h4 class="text-center">{{ $tissu->name }}</h4>

                            <img src="/storage/tissus/small_{{ $tissu->filename }}" class="img-fluid px-5" alt="tissu noeud papillon en bois recyclé">

                            {{ Form::open(['action' => ['MaterialsController@deleteTissu', $tissu->id], 'method' => 'POST']) }}
                                {{ Form::hidden('_method', 'DELETE') }}

                                {{ Form::submit('Supprimer', ['class' => 'btn btn-danger d-block mx-auto']) }}
                            {{ Form::close() }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addTissu" tabindex="-1" role="dialog" aria-labelledby="addTissuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTissuLabel">Ajouter un tissu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    {{ Form::open(['action' => 'MaterialsController@addTissu', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Nom du tissu') }}
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nom du tissu']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('image', 'Image du tissu') }}
                            <br>
                            {{ Form::file('image') }}
                        </div>

                        {{ Form::submit('Ajouter le tissu', ['class' => 'btn btn-success d-block mx-auto']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


    @foreach($woods as $wood)
        <div class="modal fade" id="editName{{ $wood->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier nom du bois</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        {{ Form::open(['action' => ['MaterialsController@editName', $wood->id], 'method' => 'POST']) }}
                            <div class="form-group">
                                {{ Form::text('name', $wood->name, ['class' => 'form-control my-3']) }}
                            </div>

                            {{ Form::hidden('_method', 'PUT') }}

                            {{ Form::submit('Modifier le nom du bois', ['class' => 'btn btn-success d-block mx-auto']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection