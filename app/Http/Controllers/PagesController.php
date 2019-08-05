<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductPhoto;
use App\Collection;
use App\Bowtie;
use App\Wood;
use App\Tissu;
use App\slide;

class PagesController extends Controller
{
    public function index() {
        $slides = Slide::orderBy('position', 'asc')->get();

        return view('pages.index')->with('slides', $slides);
    }

    public function collection() {
        $collections = Collection::orderBy('position', 'asc')->get();

        foreach ($collections as $collection) {
            $bowties = Bowtie::where('collection_id', $collection->id)->orderBy('position', 'asc')->get();
            $collection->bowties = $bowties;
        }

        return view('pages.collection')->with('collections', $collections);
    }

    public function create() {
        $woods = Wood::all();
        $tissus = Tissu::all();
        $first = Tissu::all()->first();

        return view('pages.create')->with([
            'woods' => $woods,
            'tissus' => $tissus,
            'first' => $first
        ]);
    }

    public function tshirts() {
        $category = 'T-shirts';
        $intro = 'Des t-shirts uniques, à la marque au Chat.';
        $products = Product::where('category', 't-shirts')->get();
        
        foreach ($products as $product) {
            $photos = ProductPhoto::where('product_id', $product->id)->get();
            $product->photos = $photos;
        }

        return view('pages.store')->with([
            'products' => $products,
            'category' => $category,
            'intro' => $intro
        ]);
    }

    public function earrings() {
        $category = 'Boucles d\'oreilles';
        $intro = 'Un accessoire original, en bois recyclé !';
        $products = Product::where('category', 'earrings')->get();

        return view('pages.store')->with([
            'products' => $products,
            'category' => $category,
            'intro' => $intro
        ]);
    }

    public function caps() {
        $category = 'Casquettes';
        $intro = 'Moon fait de l\'ombre';
        $products = Product::where('category', 'caps')->get();

        return view('pages.store')->with([
            'products' => $products,
            'category' => $category,
            'intro' => $intro
        ]);
    }

    public function about() {
        return view('pages.about');
    }

    public function login() {
        return view('pages.login');
    }

    public function contact() {
        return view('pages.contact');
    }
}
