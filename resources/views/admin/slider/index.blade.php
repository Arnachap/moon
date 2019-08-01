@extends('layouts.admin')

@section('title')
    Slider page d'accueil
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Slider page d'accueil</h1>
        
        <a href="/admin/slider/create" class="btn btn-primary ml-1">Ajouter une image</a>
    </div>

    {{ Form::open(['action' => 'SliderController@sort', 'method' => 'POST']) }}
        <ul id="slidesSort" class="list-group">
            @foreach($slides as $slide)
                <li class="list-group-item">
                    <i class="fas fa-arrows-alt-v slideHandle" style="cursor: grabbing;"></i>

                    <a href="/admin/slider/{{ $slide->id }}" class="text-primary">
                        {{ $slide->title }}
                    </a>

                    {{ Form::hidden('id[]', $slide->id) }}
                </li>
            @endforeach
        </ul>

        {{ Form::submit('Sauvegarder l\'ordre des slides', ['class' => 'btn btn-success d-block mx-auto mt-3']) }}
    {{ Form::close() }}
@endsection