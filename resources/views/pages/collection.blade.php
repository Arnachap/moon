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
                            <figure class="bowtie" data-toggle="modal" data-target="#modal{{ $bowtie->id }}">
                                <img src="/storage/bowties/{{ $bowtie->photo }}" alt="">
                                <figcaption>
                                    <h2>{{ $bowtie->name }}</h2>
                                </figcaption>
                            </figure>
                        </div>
                    @endif

                    <div class="modal fade" id="modal{{ $bowtie->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <h5 class="section-title">{{ $bowtie->name }}</h5>
                                
                                    <img src="/storage/bowties/{{ $bowtie->photo }}" class="img-fluid" alt="">

                                    <br>

                                    <p class="text-center text-muted">{{ $bowtie->description }}</p>
                                </div>

                                <div class="modal-footer">
                                    <div class="row w-100">
                                        <div class="col-6">
                                            @if(!is_null($bowtie->price))
                                                <p class="text-left text-success mt-1">Prix : {{ $bowtie->price }}€</p>
                                            @endif
                                        </div>

                                        <div class="col-6">
                                            @if($bowtie->available && !is_null($bowtie->price))
                                                <button type="button" class="btn btn-success d-block ml-auto">Ajouter au panier</button>
                                            @else
                                                <button type="button" class="btn btn-secondary d-block ml-auto" disabled>Indisponible</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="collapse" id="collapse{{ $collection->id }}">
                <div class="row">
                    @foreach ($collection->bowties as $index => $bowtie)
                        @if($index >= 4)
                            <div class="col-3">
                                <figure class="bowtie" data-toggle="modal" data-target="#modal{{ $bowtie->id }}">
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