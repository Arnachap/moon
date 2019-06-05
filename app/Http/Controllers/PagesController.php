<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function collection() {
        return view('pages.collection');
    }

    public function create() {
        return view('pages.create');
    }

    public function tshirts() {
        $category = 'T-shirts';
        $intro = 'Des t-shirts uniques, à la marque au Chat.';
        $products = Product::where('category', 't-shirts')->get();

        return view('pages.store')
            ->with('products', $products)
            ->with('category', $category)
            ->with('intro', $intro);
    }

    public function earrings() {
        $category = 'Boucles d\'oreilles';
        $intro = 'Un accessoire original, en bois recyclé !';
        $products = Product::where('category', 'earrings')->get();

        return view('pages.store')
            ->with('products', $products)
            ->with('category', $category)
            ->with('intro', $intro);
    }

    public function about() {
        return view('pages.about');
    }

    public function login() {
        return view('pages.login');
    }

    public function cart() {
        return view('pages.cart');
    }
}
