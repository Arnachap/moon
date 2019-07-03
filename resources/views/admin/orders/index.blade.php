@extends('layouts.admin')

@section('title')
    Commandes
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Commandes</h1>
    </div>

    <ul>
        @foreach($orders as $order)
            <li>{{ $order->id }}</li>
            @foreach($addresses as $address)
                @if($address->id == $order->address)
                    <li>{{ $address->name }}</li>
                @endif
            @endforeach
        @endforeach
    </ul>
@endsection