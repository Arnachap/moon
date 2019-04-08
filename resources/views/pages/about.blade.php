@extends('layouts.app')

@section('title')
L'entreprise
@endsection

@section('content')

<div class="container-fluid" id="about">
    <div class="row">
        <div class="intro">
            <img src="/img/logo/logo-full-blanc.png" alt="">
            <h2>Qu'est-ce que Moon?</h2>
            <p>Moon, c’est la création de nœuds papillon, sous toutes leurs formes et matières, notamment en bois (meubles, palettes...) et tissus recyclés.</p>
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