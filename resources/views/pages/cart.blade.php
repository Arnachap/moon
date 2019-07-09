@extends('layouts.app')

@section('title')
Panier
@endsection

@section('content')
    <div class="container" id="cart">
        <div class="page-title">
            <h2>Votre Panier</h2>
        </div>

        @if(Cart::count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th></th>

                        <th>Nom de produit</th>

                        <th>Taille</th>

                        <th>Prix unitaire</th>

                        <th>Quantité</th>

                        <th>Prix total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach(Cart::content() as $item)
                        <tr>
                            <td>
                                <img src="/img/store/tshirt1.jpg" class="img-fluid" alt="">
                            </td>

                            <td class="m-auto">{{ $item->name }}</td>

                            <td>{{ $item->options->size }}</td>

                            <td>{{ $item->price }}€</td>

                            <td>
                                <div class="quantity">
                                    {{ Form::open(['action' => 'CartController@updateProductQuantity', 'method' => 'POST']) }}
                                        <span class="qty-minus" onclick="
                                            var effect = document.getElementById('qty'); 
                                            var qty = effect.value;
                                            if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;
                                            return false;">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                        </span>

                                        {{ Form::number('quantity', $item->qty, ['id' => 'qty', 'class' => 'qty-text']) }}
                                        
                                        <span class="qty-plus" onclick="
                                            var effect = document.getElementById('qty');
                                            var qty = effect.value;
                                            if( !isNaN( qty )) effect.value++;
                                            return false;">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </span>

                                        {{ Form::hidden('id', $item->rowId) }}

                                        {{ Form::submit('Mettre à jour', ['class' => 'btn btn-success']) }}
                                    {{ Form::close() }}
                                </div>
                            </td>

                            <td>{{ $item->total }}€</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="4"></td>

                        <td>
                            Sous-total
                            <br>
                            <br>Frais de port
                            <br>
                            <br>Total
                        </td>

                        <td>
                            {{ Cart::total() }}€
                            <br>
                            <br>7.50€
                            <br>
                            <br>{{ Cart::total() + 7.50 }}€
                        </td>
                    </tr>
                </tbody>
            </table>

            <a href="/shipping" class="button float-right">Valider la commande</a>
        @else
            <div class="alert alert-danger text-center">Votre panier est vide</div>
        @endif
    </div>
@endsection