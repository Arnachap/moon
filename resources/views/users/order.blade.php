@extends('layouts.app')

@section('title')
    Commande du {{ date("d/m/y", strtotime($order->created_at)) }}
@endsection

@section('content')
    <div class="page-title">
        <h2>Commande {{ $order->id }}</h2>
        <p>Commande passée le {{ date("d/m/y", strtotime($order->created_at)) }}</p>
    </div>
@endsection