@extends('layouts.app')

@section('title')
T-shirts
@endsection

@section('content')
    <div class="page-title">
        <h2>{{ $category }}</h2>
        <p>{{ $intro }}</p>
    </div>

    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 product">
                    <div class="product-img" style="background-image:url('/storage/products/{{ $product->id . '/' . $product->photos->first()->path }}');">
                        <div class="product-quickview">
                            <a href="#" data-toggle="modal" data-target="#productModal{{ $product->id }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    
                    <div class="product-info">
                        <div class="price">{{ $product->price }} €</div>
                        <div class="desc">{{ $product->name }}</div>
                        <div class="red-button" data-toggle="modal" data-target="#productModal{{ $product->id }}">Ajouter au panier</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @foreach($products as $product)
        <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="productModal{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    @if (count($product->photos) > 1)
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach($product->photos as $photo)
                                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                        <img src="/storage/products/{{ $product->id . '/' . $photo->path }}" class="img-fluid" alt="accessoire moon {{ $product->name }}">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="background-color: transparent;">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>

                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="background-color: transparent;">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    @else
                                        <img src="/storage/products/{{ $product->id . '/' . $product->photos->first()->path }}" class="img-fluid" alt="{{ $product->name }} accessoire Moon">
                                    @endif
                                </div>

                                <div class="col-12 col-md-7">
                                    <div class="modal-desc">
                                        <h4 class="title">{{ $product->name }}</h4>

                                        <h5 class="price">{{ $product->price }}€</h5>
                                        
                                        <p>{{ $product->description }}</p>
                                    </div>

                                    {{ Form::open(['action' => 'CartController@addProductToCart', 'method' => 'POST', 'class' => 'cart']) }}
                                        {{ Form::hidden('id', $product->id) }}

                                        <div class="row w-100">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    {{ Form::label('size', 'Taille :', ['class' => 'col-6 col-md-4 col-form-label']) }}
                                                    <div class="col-6 col-md-8 mt-1">
                                                        <select name="size" id="size">
                                                            @if($product->xs > 0)
                                                                <option value="xs">XS</option>
                                                            @endif
                                                            
                                                            @if($product->s > 0)
                                                                <option value="s">S</option>
                                                            @endif
                                                            
                                                            @if($product->m > 0)
                                                                <option value="m">M</option>
                                                            @endif
                                                            
                                                            @if($product->l > 0)
                                                                <option value="l">L</option>
                                                            @endif
                                                            
                                                            @if($product->xl > 0)
                                                                <option value="xl">XL</option>
                                                            @endif
                                                            
                                                            @if($product->tu > 0)
                                                                <option value="tu">TU</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <div class="quantity">
                                                <span class="qty-minus" onclick="var effect = document.getElementById('quantity{{ $product->id }}'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
    
                                                {{ Form::number('quantity', 1, ['id' => 'quantity' . $product->id]) }}
    
                                                <span class="qty-plus" onclick="var effect = document.getElementById('quantity{{ $product->id }}'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            {{ Form::submit('Ajouter au panier', ['class' => 'red-button']) }}
                                        </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection