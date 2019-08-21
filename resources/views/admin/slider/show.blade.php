@extends('layouts.admin')

@section('title')
    Slide "{{ $slide->title }}"
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Slide "{{ $slide->title }}"</h1>

        <div class="float-right">
            <a href="/admin/slider/{{ $slide->id }}/edit" class="btn btn-primary">Modifier</a>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal">
                Supprimer
            </button>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto text-center">
                <img src="/storage/slider/{{ $slide->image }}" class="img-fluid" alt="Moon noeud pap', le noeud papillon en bois recyclé">

                <h3 class="my-3 section-title">{{ $slide->title }}</h3>

                <a href="{{ $slide->link }}" class="btn btn-info">{{ $slide->link_name }}</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Supprimer slide?</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Etes-vous sur de vouloir supprimer la slide "{{ $slide->title }}" ?</p>
                </div>

                <div class="modal-footer">
                    {{ Form::open(['action' => ['SliderController@destroy', $slide->id], 'method' => 'POST']) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        </div>
@endsection