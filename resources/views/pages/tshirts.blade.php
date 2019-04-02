@extends('layouts.app')

@section('title')
T-shirts
@endsection

@section('content')

<div class="page-title">
    <h2>T-shirts</h2>
    <p>Des t-shirts uniques, à la marque au Chat.</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 product">
            <div class="product-img">
                <img src="/img/store/tshirt1.jpg" class="img-fluid" alt="">

                <div class="product-quickview">
                    <a href="#" data-toggle="modal" data-target="#productModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            
            <div class="product-info">
                <div class="price">30€</div>
                <div class="desc">"Tête à noeud" - blanc</div>
                <div class="add-to-cart">Ajouter au panier</div>
            </div>
        </div>

        <div class="col-md-4 product">
            <div class="product-img">
                <img src="/img/store/tshirt2.jpg" class="img-fluid" alt="">

                <div class="product-quickview">
                    <a href="#" data-toggle="modal" data-target="#productModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            
            <div class="product-info">
                <div class="price">30€</div>
                <div class="desc">"Chats" - blanc</div>
                <div class="add-to-cart">Ajouter au panier</div>
            </div>
        </div>

        <div class="col-md-4 product">
            <div class="product-img">
                <img src="/img/store/tshirt3.jpg" class="img-fluid" alt="">

                <div class="product-quickview">
                    <a href="#" data-toggle="modal" data-target="#productModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            
            <div class="product-info">
                <div class="price">30€</div>
                <div class="desc">"Chat" - gris</div>
                <div class="add-to-cart">Ajouter au panier</div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-5">
                            <img src="/img/store/tshirt1.jpg" class="img-fluid" alt="">
                        </div>

                        <div class="col-7">
                            <div class="modal-desc">
                                <h4 class="title">Tête à Noeud</h4>

                                <h5 class="price">30€</h5>
                                
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita quibusdam aspernatur, sapiente consectetur accusantium perspiciatis praesentium eligendi, in fugiat?</p>
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

@endsection