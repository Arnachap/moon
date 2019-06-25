@extends('layouts.admin')

@section('title')
    {{ $bowtie->name }}
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $bowtie->name }}</h1>

        <div class="float-right">
            <a href="/admin/bowties/{{ $bowtie->id }}/edit" class="btn btn-primary">Modifier</a>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal">
                Supprimer
            </button>
        </div>
    </div>

    <div class="col-6 mx-auto">
        <img src="/storage/bowties/{{ $bowtie->photo }}" alt="" class="img-fluid">
        <p>{{ $bowtie->description }}</p>
        <p>Collection : {{ $collection->title }}</p>
        <p>Prix : {{ $bowtie->price }}</p>
        <p>Disponible : {{ $bowtie->available ? 'Oui' : 'non' }}</p>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Supprimer {{ $bowtie->name }}?</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Etes-vous sur de vouloir supprimer l'article {{ $bowtie->name }} ?</p>
                </div>

                <div class="modal-footer">
                    {{ Form::open(['action' => ['BowtiesController@destroy', $bowtie->id], 'method' => 'POST']) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection