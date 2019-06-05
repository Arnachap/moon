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
                    <div class="product-img" style="background-image:url('/storage/products/{{ $product->image }}');">
                        <div class="product-quickview">
                            <a href="#" data-toggle="modal" data-target="#productModal{{ $product->id }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    
                    <div class="product-info">
                        <div class="price">{{ $product->price }} €</div>
                        <div class="desc">{{ $product->name }}</div>
                        <div class="add-to-cart">Ajouter au panier</div>
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
                                <div class="col-5">
                                    <img src="/storage/products/{{ $product->image }}" class="img-fluid" alt="">
                                </div>

                                <div class="col-7">
                                    <div class="modal-desc">
                                        <h4 class="title">{{ $product->name }}</h4>

                                        <h5 class="price">{{ $product->price }}€</h5>
                                        
                                        <p>{{ $product->description }}</p>
                                    </div>

                                    <form class="cart" method="post">
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">

                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                        <button type="submit" name="addtocart" value="5" class="cart-submit">Ajouter au panier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection