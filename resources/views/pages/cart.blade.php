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

                        <th>Options</th>

                        <th>Prix unitaire</th>

                        <th>Quantité</th>

                        <th>Prix total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach(Cart::content() as $item)
                        <tr>
                            <td>
                                @if($item->id >= 910)
                                    <img src="/img/create/noeuds-pap/{{ $item->options->shape }}/{{ $item->options->shape }}-{{ $item->options->wood }}.png" class="img-fluid position-relative" alt="">

                                    @foreach($tissus as $tissu)
                                        @if($tissu->name == $item->options->tissu)
                                            <img src="/storage/tissus/{{ $tissu->filename }}" class="img-fluid position-absolute" style="transform: translate(-50%, -100%);" alt="">
                                        @endif
                                    @endforeach
                                @elseif($item->options->collection)
                                    @foreach($bowties as $bowtie)
                                        @if($item->id == $bowtie->id)
                                            <img src="/storage/bowties/{{ $bowtie->photo }}" class="img-fluid" alt="">
                                        @endif
                                    @endforeach
                                @else
                                    <img src="/storage/products/{{ $item->product_id }}/{{ $item->photo }}" class="img-fluid" alt="">
                                @endif
                            </td>

                            <td class="m-auto">{{ $item->name }}</td>

                            @if($item->id >= 910)
                                <td class="pt-2">
                                    <p>Forme : {{ $item->options->shape }}</p>
                                    <p>Bois : {{ $item->options->wood == 1 ? 'Bois de palette' : 'Bois de meuble' }}</p>
                                    <p>Tissu : {{ $item->options->tissu }}</p>
                                </td>
                            @else
                                <td>
                                    @if($item->options->size)
                                        Taille : {{ $item->options->size }}
                                    @elseif($item->options->collection)
                                        Collection : {{ $item->options->collection }}
                                    @endif
                                </td>
                            @endif

                            <td>{{ $item->price }}€</td>

                            <td>
                                <div class="quantity">
                                    {{ Form::open(['action' => 'CartController@updateProductQuantity', 'method' => 'POST']) }}
                                        <span class="qty-minus" onclick="
                                            var effect = document.getElementById('qty{{ $item->rowId }}'); 
                                            var qty = effect.value;
                                            if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;
                                            return false;">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                        </span>

                                        {{ Form::number('quantity', $item->qty, ['id' => 'qty' . $item->rowId, 'class' => 'qty-text']) }}
                                        
                                        <span class="qty-plus" onclick="
                                            var effect = document.getElementById('qty{{ $item->rowId }}');
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

                            <td>{{ $item->price * $item->qty }}€</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="3"></td>

                        <td>
                            {{ Form::open(['action' => 'CartController@promoCode', 'method' => 'POST']) }}
                                {{ Form::label('code', 'Code Promo :') }}
                                <br>
                                {{ Form::text('code', '') }}

                                {{ Form::submit('Appliquer', ['class' => 'btn btn-sm btn-success mt-1']) }}
                            {{ Form::close() }}
                        </td>

                        <td>
                            Sous-total
                            <br>
                            @if(Cart::discount() > 0)
                                Code Promo
                                <br>
                            @endif
                            <br>Frais de port
                            <br><small>(Délai de livraison: 2-4 jours)</small>
                            <br>Total
                        </td>

                        <td>
                            {{ Cart::initial() }}€
                            <br>
                            @if(Cart::discount() > 0)
                                -{{ Cart::discount() }}€
                                <br>
                            @endif
                            <br>3€
                            <br>
                            <br>{{ Cart::total() + 3 }}€
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-lg btn-success float-right mb-5 mr-5" data-toggle="modal" data-target="#paymentModal">Valider la commande</button>
        @else
            <div class="alert alert-danger text-center">Votre panier est vide</div>
        @endif

        @include('orders.shipping')
    </div>
@endsection