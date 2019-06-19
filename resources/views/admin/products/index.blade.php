@extends('layouts.admin')

@section('title')
    Articles
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Articles</h1>

        <a href="/admin/products/create" class="btn btn-primary">Créer un article</a>
    </div>

    <table class="table table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">T-shirts</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tshirts as $tshirt)
                <tr>
                    <td>
                        <a href="/admin/products/{{ $tshirt->id }}" class="text-muted">
                            {{ $tshirt->name }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Boucles d'oreilles</th>
            </tr>
        </thead>

        <tbody>
            @foreach($earrings as $earring)
                <tr>
                    <td>
                        <a href="/admin/products/{{ $earring->id }}" class="text-muted">
                            {{ $earring->name }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Casquettes</th>
            </tr>
        </thead>

        <tbody>
            @foreach($caps as $cap)
                <tr>
                    <td>
                        <a href="/admin/products/{{ $cap->id }}" class="text-muted">
                            {{ $cap->name }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection