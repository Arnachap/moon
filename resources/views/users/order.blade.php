@extends('layouts.app')

@section('title')
    Commande du {{ date("d/m/y", strtotime($order->created_at)) }}
@endsection

@section('content')
    <div class="container" id="cart">  
        <div class="page-title">
            <h2>Commande N°{{ $order->id }}</h2>
            <p>{{ date("d/m/y", strtotime($order->created_at)) }}</p>
        </div>

        <div class="row">
            <div class="col-12">
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
                        @foreach($orderItems as $item)
                            @foreach($products as $product)
                                @if($product->name == $item->product_name)
                                    <tr>
                                        <td>
                                            <img src="/storage/products/{{ $product->image }}" class="img-fluid" alt="">
                                        </td>

                                        <td>{{ $product->name }}</td>

                                        <td>{{ str_replace(array('{', '}', '"')," ", $item->options) }}</td>

                                        <td>{{ $product->price }}€</td>

                                        <td>{{ $item->quantity }}</td>

                                        <td>{{ $product->price * $item->quantity }}€</td>
                                    </tr>
                                @endif
                            @endforeach
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
                                {{ $totalPrice }}€
                                <br>
                                <br>3€
                                <br>
                                <br>{{ $totalPrice + 3 }}€
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-6 mx-auto">
                <div class="card text-center my-5">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-white m-0">Adresse de livraison</h5>
                    </div>

                    <div class="card-body">
                        <p class="card-text">{{ $address->name }}</p>

                        <p class="card-text">{{ $address->address1 }}</p>
                        
                        @if(!empty($address->address2))
                            <p class="card-text">{{ $address->address2 }}</p>
                        @endif

                        <p class="card-text">{{ $address->postcode . ' ' . $address->city }}</p>
                    </div>

                    <div class="card-footer bg-white">
                        Code de suivi : 13243525
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection