<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages.tshirts');
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
