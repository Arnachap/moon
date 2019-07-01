<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartController extends Controller
{
    public function __construct()
    {
        Cart::setGlobalTax(0);
    }

    public function index() {
        return view('pages.cart');
    }

    public function addProductToCart(Request $request) {
        $product = Product::find($request->id);

        Cart::add(
            $product->id,
            $product->name,
            $request->quantity,
            $product->price,
            0,
            ['size' => $request->size]
        );

        return back()->with('success', 'Produit ajouté au panier !');
    }

    public function updateProductQuantity(Request $request) {
        Cart::update($request->id, $request->quantity);

        return redirect('/cart')->with('success', 'Panier mis à jour !');
    }
}
