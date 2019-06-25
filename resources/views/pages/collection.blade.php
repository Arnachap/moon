@extends('layouts.app')

@section('title')
Notre collection
@endsection

@section('content')

    @foreach($collections as $collection)

        <div class="page-title">
            <h2>{{ $collection->title }}</h2>
            <p>{{ $collection->intro }}</p>
        </div>

        <div class="container-fluid collection">
            <div class="row">
                @foreach ($collection->bowties as $index => $bowtie)
                    @if($index < 4)
                        <div class="col-3">
                            <figure class="bowtie">
                                <img src="/storage/bowties/{{ $bowtie->photo }}" alt="">
                                <figcaption>
                                    <h2>{{ $bowtie->name }}</h2>
                                </figcaption>
                            </figure>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="collapse" id="collapse{{ $collection->id }}">
                <div class="row">
                    @foreach ($collection->bowties as $index => $bowtie)
                        @if($index >= 4)
                            <div class="col-3">
                                <figure class="bowtie">
                                    <img src="/storage/bowties/{{ $bowtie->photo }}" alt="" class="img-fluid">
                                    <figcaption>
                                        <h2>{{ $bowtie->name }}</h2>
                                    </figcaption>
                                </figure>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>  

            <div class="row">
                <div class="col-2 mx-auto">
                    <button class="btn btn-dark w-100" type="button" data-toggle="collapse" data-target="#collapse{{ $collection->id }}" aria-expanded="false" aria-controls="collapse{{ $collection->id }}">
                        Voir plus
                    </button>
                </div> 
            </div>  
        </div>
    @endforeach
@endsection