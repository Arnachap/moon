@extends('layouts.admin')

@section('title')
    Commandes
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Commandes</h1>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">
                        <a class="text-info" href="/admin/orders/{{ $order->id }}">
                            {{ $order->id }}
                        </a>
                    </th>
                    
                    <td>
                        <a class="text-info" href="/admin/orders/{{ $order->id }}">
                            {{ $users->firstWhere('id', $order->user_id)->email }}
                        </a>
                    </td>

                    <td>
                        @if($order->status == 'payed')
                            <div class="text-primary">Payé - En cours d'envoie</div>
                        @elseif($order->status == 'sent')
                            <div class="text-success">
                                Envoyé
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection