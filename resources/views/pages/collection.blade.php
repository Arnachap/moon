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

        <div id="collection" class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <figure class="bowtie">
                        <img src="/img/noeuds/01blue-jean.jpg" alt="">

                        <figcaption>
                            <span>#1</span>
                            <h2>Blue Jean</h2>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-3">
                    <figure class="bowtie">
                        <img src="/img/noeuds/02detroit.jpg" alt="">

                        <figcaption>
                            <span>#2</span>
                            <h2>Detroit</h2>
                        </figcaption>
                    </figure>
                </div>
                    
                <div class="col-3">
                    <figure class="bowtie">
                        <img src="/img/noeuds/03reznikov.jpg" alt="">

                        <figcaption>
                            <span>#3</span>
                            <h2>Reznikov</h2>
                        </figcaption>
                    </figure>
                </div>

                <div class="col-3">
                    <figure class="bowtie">
                        <img src="/img/noeuds/04camel.jpg" alt="">

                        <figcaption>
                            <span>#4</span>
                            <h2>Camel</h2>
                        </figcaption>
                    </figure>
                </div>

                <div class="collapse" id="collapse{{ $collection->id }}">
                    <div class="row">
                            <div class="col-3">
                                <figure class="bowtie">
                                    <img src="/img/noeuds/05corne-de-gazelle.jpg" alt="">
        
                                    <figcaption>
                                        <span>#5</span>
                                        <h2>Corne de Gazelle</h2>
                                    </figcaption>
                                </figure>
                            </div>
                            
                            <div class="col-3">
                                <figure class="bowtie">
                                    <img src="/img/noeuds/06gala.jpg" alt="">
        
                                    <figcaption>
                                        <span>#6</span>
                                        <h2>Gala</h2>
                                    </figcaption>
                                </figure>
                            </div>
                            
                            <div class="col-3">
                                <figure class="bowtie">
                                    <img src="/img/noeuds/07uv.jpg" alt="">
        
                                    <figcaption>
                                        <span>#7</span>
                                        <h2>UV</h2>
                                    </figcaption>
                                </figure>
                            </div>
                            
                            <div class="col-3">
                                <figure class="bowtie">
                                    <img src="/img/noeuds/08rainbow.jpg" alt="">
        
                                    <figcaption>
                                        <span>#8</span>
                                        <h2>Rainbow</h2>
                                    </figcaption>
                                </figure>
                            </div>
                    </div>
                </div>  
                
                <div class="col-2 mx-auto">
                    <button class="btn btn-dark w-100" type="button" data-toggle="collapse" data-target="#collapse{{ $collection->id }}" aria-expanded="false" aria-controls="collapse{{ $collection->id }}">
                        Voir plus
                    </button>
                </div>       
            </div>
        </div>
    @endforeach
@endsection