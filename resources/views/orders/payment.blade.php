@extends('layouts.app')

@section('title')
    Paiement
@endsection

@section('content')
    <div class="container" id="cart">
        <div class="page-title">
            <h2>Paiement de la commande</h2>
        </div>

        <div class="col-12">
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
                                        <img src="/img/create/noeuds-pap/{{ $item->options->shape }}/{{ $item->options->shape }}-{{ $item->options->wood }}.png" class="img-fluid" alt="">

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
                                        <p>Taille : {{ $item->options->size }}</p>
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

                                <td>{{ $item->qty }}</td>

                                <td>{{ $item->price * $item->qty }}€</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="4"></td>

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
            @endif
        </div>

        <div class="col-6 mx-auto pb-0" id="payment-section">
            <h4 class="text-center my-3">Payer par carte bancaire</h4>

            {{ Form::open(['action' => 'ClientOrdersController@pay', 'method' => 'POST', 'id' => 'payment-form', 'class' => 'my-4']) }}
                <div class="row">
                    <div class="col-4">
                        <img src="https://storage.googleapis.com/helpdocs-assets/xd21t13ilk/articles/gy433n1273/1533310177521/image.png" class="img-fluid">
                    </div>

                    <div class="col-8 mt-2">
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
            
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert" class="text-danger"></div>
                    </div>
                    
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success d-block mt-5 mx-auto">Payer {{ Cart::total() + 3 }}€</button>
        
                        <small class="text-muted">
                            Paiement sécurisé par <a class="text-primary" href="https://stripe.com/fr">Stripe</a>
                        </small>
                    </div>
                </div>

                {{ Form::hidden('id', $order->id) }}
            {{ Form::close() }}
        </div>
    </div>
    
    <script src="https://js.stripe.com/v3/"></script>
    
    <script>// Create a Stripe client.
        var stripe = Stripe('pk_test_cNIBlPunKLKnuVUC6unOiq6900E2IFaLbR');
        
        // Create an instance of Elements.
        var elements = stripe.elements();
        
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        
        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});
        
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        
        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
        
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
        
            // Submit the form
            form.submit();
        }
    </script>
@endsection