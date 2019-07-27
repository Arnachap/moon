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
                            @if($item->product_id >= 910)
                                <tr>
                                    <td>
                                        <img src="/img/create/noeuds-pap/{{ $item->options['shape'] }}/{{ $item->options['shape'] }}-{{ $item->options['wood'] }}.png" class="img-fluid" alt="">

                                        @foreach($tissus as $tissu)
                                            @if($tissu->name == $item->options['tissu'])
                                                <img src="/storage/tissus/{{ $tissu->filename }}" class="img-fluid position-absolute" style="transform: translateX(-100%);" alt="">
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>Noeuds pap' sur mesure</td>

                                    <td class="pt-4">
                                        Forme : {{ $item->options['shape'] }}
                                        <br>Bois : {{ $item->options['wood'] }}
                                        <br>Tissu : {{ $item->options['tissu'] }}
                                    </td>

                                    <td>40€</td>

                                    <td>{{ $item->quantity }}</td>

                                    <td>{{ $item->quantity * 40 }}€</td>
                                </tr>
                            @elseif(isset($item->options['collection']))
                                <tr>
                                    <td>
                                        <img src="/storage/bowties/{{ $item->bowtie->photo }}" class="img-fluid" alt="">
                                    </td>

                                    <td>{{ $item->bowtie->name }}</td>

                                    <td>
                                        Collection : {{ $item->options['collection'] }}
                                    </td>

                                    <td>{{ $item->bowtie->price }}€</td>

                                    <td>{{ $item->quantity }}</td>

                                    <td>{{ $item->quantity * $item->bowtie->price }}€</td>
                                </tr>
                            @else
                                @foreach($products as $product)
                                    @if($product->id == $item->product_id)
                                        <tr>
                                            <td>
                                                <img src="/storage/products/{{ $product->id }}/{{ $item->photo->path }}" class="img-fluid" alt="">
                                            </td>

                                            <td>{{ $product->name }}</td>

                                            <td>Taille : {{ $item->options['size'] }}</td>

                                            <td>{{ $product->price }}€</td>

                                            <td>{{ $item->quantity }}</td>

                                            <td>{{ $product->price * $item->quantity }}€</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
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