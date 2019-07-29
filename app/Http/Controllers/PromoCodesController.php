<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PromoCode;

class PromoCodesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $codes = PromoCode::all();

        return view('admin.promoCodes.index')->with('codes', $codes);
    }

    public function create() {
        return view('admin.promoCodes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'code' => 'required',
            'percentage' => 'required',
            'expiration' => 'required'
        ]);

        $code = new PromoCode;
        $code->code = $request->code;
        $code->percentage = $request->percentage;
        $code->expiration = $request->expiration;
        $code->save();

        return redirect('/admin/promo')->with('success', 'Code promo ajouté');
    }

    public function destroy($id) {
        $code = PromoCode::find($id);
        $code->delete();

        return redirect('/admin/promo')->with('success', 'Code promo supprimé');
    }
}
