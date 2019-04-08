@extends('layouts.app')

@section('title')
Panier
@endsection

@section('content')
    <div class="container">
        <div class="page-title">
            <h2>Votre Panier</h2>
        </div>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <img src="/img/store/tshirt1.jpg" class="img-fluid" alt="">
                    </td>

                    <td class="m-auto">Tete à Noeud</td>

                    <td>30 €</td>

                    <td>
                        <div class="quantity">
                            <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>

                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">

                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </div>
                    </td>

                    <td>30 €</td>
                </tr>

                <tr>
                    <td colspan="3"></td>

                    <td>
                        Sous-total
                        <br>
                        <br>Total
                    </td>

                    <td>
                        30 €
                        <br>
                        <br>30 €
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection