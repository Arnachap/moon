@extends('layouts.admin')

@section('title')
    Crée ton noeud pap'
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Crée ton noeud pap'</h1>

        <a href="/admin/create/create" class="btn btn-primary ml-1">Ajouter un matériau</a>
    </div>

    <div class="card mb-3">
        <div class="card-header" id="headingShapes" data-toggle="collapse" data-target="#collapseShapes" aria-expanded="true" aria-controls="collapseShapes">
            <h4>Formes</h4>
        </div>
    
        <div id="collapseShapes" class="collapse">
            <div class="card-body">
                <ul class="list-group">
                    @foreach($shapes as $shape)
                        <li class="list-group-item">
                            <a href="#" class="text-muted">{{ $shape->name }}</a>

                            <button type="button" class="btn py-0 border-0 float-right" data-toggle="modal" data-target="#deleteModal{{ $shape->id }}">
                                <i class="far fa-trash-alt text-danger pb-2" data-toggle="tooltip" data-placement="left" title="Supprimer la forme"></i>
                            </button>
                        </li>
                        
                        <div class="modal fade" id="deleteModal{{ $shape->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                
                                        <p class="mt-5">Etes-vous sur de vouloir supprimer la forme {{ $shape->name }}</p>
                                    </div>
                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                
                                        {{ Form::open(['action' => ['MaterialsController@destroy', $shape->id], 'method' => 'POST']) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Supprimer la forme', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header" id="headingWoods" data-toggle="collapse" data-target="#collapseWoods" aria-expanded="true" aria-controls="collapseWoods">
            <h4>Bois</h4>
        </div>
    
        <div id="collapseWoods" class="collapse">
            <div class="card-body">
                <ul class="list-group">
                    @foreach($woods as $wood)
                        <li class="list-group-item">
                            <a href="#" class="text-muted">{{ $wood->name }}</a>

                            <button type="button" class="btn py-0 border-0 float-right" data-toggle="modal" data-target="#deleteModal{{ $wood->id }}">
                                <i class="far fa-trash-alt text-danger pb-2" data-toggle="tooltip" data-placement="left" title="Supprimer le bois"></i>
                            </button>
                        </li>
                        
                        <div class="modal fade" id="deleteModal{{ $wood->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                
                                        <p class="mt-5">Etes-vous sur de vouloir supprimer le bois {{ $wood->name }}</p>
                                    </div>
                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                
                                        {{ Form::open(['action' => ['MaterialsController@destroy', $wood->id], 'method' => 'POST']) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Supprimer le bois', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header" id="headingShapes" data-toggle="collapse" data-target="#collapseShapes" aria-expanded="true" aria-controls="collapseShapes">
            <h4>Tissus</h4>
        </div>
    
        <div id="collapseShapes" class="collapse" aria-labelledby="headingShapes">
            <div class="card-body">
                <ul class="list-group">
                    @foreach($tissus as $tissu)
                        <li class="list-group-item">
                            <a href="#" class="text-muted">{{ $tissu->name }}</a>

                            <button type="button" class="btn py-0 border-0 float-right" data-toggle="modal" data-target="#deleteModal{{ $tissu->id }}">
                                <i class="far fa-trash-alt text-danger pb-2" data-toggle="tooltip" data-placement="left" title="Supprimer le tissu"></i>
                            </button>
                        </li>
                        
                        <div class="modal fade" id="deleteModal{{ $tissu->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                
                                        <p class="mt-5">Etes-vous sur de vouloir supprimer le tissu {{ $tissu->name }}</p>
                                    </div>
                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                
                                        {{ Form::open(['action' => ['MaterialsController@destroy', $tissu->id], 'method' => 'POST']) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Supprimer le tissu', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection