@extends('layouts.app')

@section('title')
    Vos commandes en cours
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h2>Vos commandes</h2>
        </div>

        @if (!empty($orders))
            <div class="row">
                <div class="col-10 mx-auto">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 50px;">#</th>
        
                                <th scope="col">Date de la commande</th>
        
                                <th scope="col">Statut</th>

                                <th scope="col" class="text-center">Détails</th>
                            </tr>
                        </thead>
        
                        @foreach($orders as $order)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
        
                                    <td>{{ date("d/m/y", strtotime($order->created_at)) }}</td>
        
                                    <td>
                                        @if($order->status == 'payed')
                                            <div class="text-success">
                                                En préparation
                                            </div>
                                        @elseif($order->status == 'sent')
                                            <div class="text-success">
                                                Envoyé
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="/" class="btn btn-success d-block mx-5">
                                            Voir la commande
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                Aucune commande effectuée.
            </div>
        @endif
    </div>
@endsection
