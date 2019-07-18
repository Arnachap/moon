@extends('layouts.admin')

@section('title')
    Commande n°{{ $order->id }}
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Commande n°{{ $order->id }}</h1>

        @if($order->status == 'payed')
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusModal">Statut : Payé / En cours d'envoi</button>
        @elseif($order->status == 'sent')
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#statusModal">Statut : Envoyée</button>
        @endif
    </div>

    <h4>Adresse de livraison :</h4>

    <table class="table mb-5">
        <thead>
            <tr>
                <th scope="col" style="width: 20%;">Nom et prénom</th>
                <th scope="col">Adresse 1</th>
                <th scope="col">Adresse 2</th>
                <th scope="col">Code Postal</th>
                <th scope="col">Ville</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $address->name }}</th>
                <td>{{ $address->address1 }}</td>
                <td>{{ $address->address2 }}</td>
                <td>{{ $address->postcode }}</td>
                <td>{{ $address->city }}</td>
            </tr>
        </tbody>
    </table>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" style="width: 20%;">Nom de l'article</th>
                <th scope="col">Quantité</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                @foreach($products as $product)
                    @if($item->product_id == $product->id)
                        <tr>
                            <th>{{ $product->name }}</th>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ str_replace(array('{', '}', '"')," ", $item->options) }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Modifier statut de la commande</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{ Form::open(['action' => 'AdminOrdersController@editStatus', 'method' => 'POST']) }}
                    <div class="modal-body pt-3">
                        {{ Form::label('status', 'Statut :') }}
                        {{ Form::select('status', ['payed' => 'Payé - En cours d\'envoi', 'sent' => 'Envoyé'], $order->status, ['class' => 'form-control']) }}
                    </div>

                    <div class="modal-footer">
                        {{ Form::hidden('id', $order->id) }}
                        {{ Form::submit('Modifier le statut', ['class' => 'btn btn-success']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection