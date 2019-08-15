<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Tissu;
use App\Product;
use App\ProductPhoto;
use App\Bowtie;
use App\Collection;
use App\PromoCode;

class CartController extends Controller
{
    public function __construct()
    {
        Cart::setGlobalTax(0);
    }

    public function index() {
        $tissus = Tissu::all();
        $bowties = Bowtie::all();
        
        foreach(Cart::content() as $item) {
            if($item->options->size && $item->id < 910) {
                $product = Product::where('name', $item->name)->get()->first();
                $photo = ProductPhoto::where('product_id', $product->id)->get()->first();
                $item->photo = $photo->path;
                $item->product_id = $product->id;
            }
        }
        
        return view('pages.cart')->with([
            'tissus' => $tissus,
            'bowties' => $bowties
        ]);
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

    public function addBowtieToCart(Request $request) {
        if ($request->size == 'enfant') {
            $price = 30;
        } else {
            $price = 40;
        }

        Cart::add(
            9 . rand(10, 1000),
            'Noeud Pap\' sur mesure',
            1,
            $price,
            0,
            [
                'shape' => $request->shape,
                'wood' => $request->wood,
                'tissu' => $request->tissu,
                'size' => $request->size
            ]
        );

        return redirect('/cart')->with('success', 'Noeud pap\' ajouté au panier !');
    }

    public function addCollectionItemToCart($id) {
        $bowtie = Bowtie::find($id);
        $collection = Collection::find($bowtie->collection_id);
        
        Cart::add(
            $bowtie->id,
            $bowtie->name,
            1,
            $bowtie->price,
            0,
            ['collection' => $collection->title]
        );
        
        $bowtie->available = false;
        $bowtie->save();

        return redirect('/cart')->with('success', 'Noeud pap\' ajouté au panier !');
    }

    public function updateProductQuantity(Request $request) {
        Cart::update($request->id, $request->quantity);

        return redirect('/cart')->with('success', 'Panier mis à jour !');
    }

    public function promoCode(Request $request) {
        $codes = PromoCode::all();

        foreach($codes as $code) {
            if($code->code == $request->code && strtotime($code->expiration) > strtotime('now')) {
                Cart::setGlobalDiscount($code->percentage);

                $usedCode = PromoCode::find($code->id);
            }
        }

        if(isset($usedCode)) {
            return redirect('/cart')->with('success', 'Code promo appliqué !');
        } else {
            return redirect('/cart')->with('error', 'Code promo invalide.');
        }
    }
}
