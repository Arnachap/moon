@extends('layouts.admin')

@section('title')
    Modifier l'ordre des nœds pap'
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modifier l'ordre des nœds pap'</h1>
    </div>

    {{ Form::open(['action' => 'BowtiesController@sort', 'method' => 'POST']) }}
        <ul id="bowtieSort" class="list-group">
            @foreach($bowties as $bowtie)
                <li class="list-group-item text-primary">
                    <i class="fas fa-arrows-alt-v bowtieHandle" style="cursor: grabbing;"></i>

                    {{ $bowtie->name }}

                    {{ Form::hidden('id[]', $bowtie->id) }}
                </li>
            @endforeach
        </ul>
        
        {{ Form::submit('Sauvegarder l\'ordre des nœds pap\'', ['class' => 'btn btn-success d-block mx-auto mt-3']) }}
    {{ Form::close() }}
@endsection