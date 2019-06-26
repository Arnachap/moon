@extends('layouts.admin')

@section('title')
    Collections
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Collections</h1>

        <a href="/admin/collections/create" class="btn btn-primary ml-1">Créer une collection</a>
    </div>

    {{-- Open sorting form --}}
    {{ Form::open(['action' => 'CollectionsController@sort', 'method' => 'POST']) }}
        <div id="collectionSort">
            @foreach ($collections as $collection)
                <div class="card mb-3">
                    <div class="card-header" id="heading{{ $collection->id }}" data-toggle="collapse" data-target="#collapse{{ $collection->id }}" aria-expanded="true" aria-controls="collapse{{ $collection->id }}">
                        <i class="fas fa-arrows-alt-v collectionHandle" style="cursor: grabbing;"></i>
                        {{-- Collection ID to sort --}}
                        {{ Form::hidden('id[]', $collection->id) }}
                        {{ $collection->title }}

                        <div class="float-right">
                            <a href="/admin/bowties/sort/{{ $collection->id }}" class="pr-2 mr-1">
                                <i class="fas fa-sync text-info" data-toggle="tooltip" data-placement="left" title="Modifier l'ordre des nœuds pap'"></i>
                            </a>

                            <a href="/admin/bowties/create" class="pr-2 mr-1">
                                <i class="fas fa-plus text-success" data-toggle="tooltip" data-placement="left" title="Ajouter un nœud pap'"></i>
                            </a>

                            <a href="/admin/collections/{{ $collection->id }}/edit">
                                <i class="far fa-edit text-primary" data-toggle="tooltip" data-placement="left" title="Modifier la collection"></i>
                            </a>
                            
                            <button type="button" class="btn py-0 border-0" data-toggle="modal" data-target="#modal{{ $collection->id }}">
                                <i class="far fa-trash-alt text-danger pb-2" data-toggle="tooltip" data-placement="left" title="Supprimer la collection"></i>
                            </button>
                        </div>
                    </div>
                
                    <div id="collapse{{ $collection->id }}" class="collapse" aria-labelledby="heading{{ $collection->id }}">
                        <div class="card-body">
                            <p>
                                {{ $collection->intro }}
                            </p>

                            <ul class="list-group">
                                @foreach ($bowties as $bowtie)
                                    @if ($bowtie->collection_id === $collection->id)
                                        <li class="list-group-item">
                                            <a href="/admin/bowties/{{ $bowtie->id }}" class="text-primary">{{ $bowtie->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
        {{-- Close sorting form --}}
        {{ Form::submit('Sauvegarder l\'ordre des collections', ['class' => 'btn btn-success d-block mx-auto']) }}
    {{ Form::close() }}

    @foreach ($collections as $colelction)
        <div class="modal fade" id="modal{{ $collection->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $collection->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <p class="mt-5">Etes-vous sur de vouloir supprimer la collection {{ $collection->title }}</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                        {{ Form::open(['action' => ['CollectionsController@destroy', $collection->id], 'method' => 'POST']) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Supprimer la collection', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection