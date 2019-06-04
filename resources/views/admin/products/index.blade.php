@extends('layouts.admin')

@section('title')
    Articles
@endsection

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Articles</h1>

            <a href="/admin/products/create" class="btn btn-primary">Créer un article</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>

                    <th scope="col">Nom</th>
                </tr>
            </thead>

            <tbody>
                @if(!empty($products))
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            
                            <td>
                                <a href="/admin/products/{{ $product->id }}" class="text-muted">
                                    {{ $product->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </main>
@endsection