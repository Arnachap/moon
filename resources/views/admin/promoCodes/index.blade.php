@extends('layouts.admin')

@section('title')
    Codes Promo
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Codes Promo</h1>

        <a href="/admin/promo/create" class="btn btn-primary ml-1">Créer un code promo</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Pourcentage</th>
                <th scope="col">Date d'éxpiration</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if(count($codes) > 0)
                @foreach($codes as $code)
                    <tr>
                        <th scope="row">{{ $code->code }}</th>
                        <td>{{ $code->percentage }}</td>
                        <td>{{ date("d/m/y", strtotime($code->expiration)) }}</td>
                        <td>
                            <button type="button" class="btn btn-lg py-0 border-0" data-toggle="modal" data-target="#modal{{ $code->id }}">
                                <i class="far fa-trash-alt text-danger pb-2" data-toggle="tooltip" data-placement="left" title="Supprimer le code promo"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    @if(count($codes) > 0)
        @foreach ($codes as $code)
            <div class="modal fade" id="modal{{ $code->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <p class="mt-5">Etes-vous sur de vouloir supprimer le code promo "{{ $code->code }}"</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                            {{ Form::open(['action' => ['PromoCodesController@destroy', $code->id], 'method' => 'POST']) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Supprimer le code promo', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection