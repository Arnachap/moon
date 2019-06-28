<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wood;

class MaterialsController extends Controller
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
        $woods = Wood::all();

        return view('admin.materials.index')
            ->with('woods', $woods);
    }

    public function toggleAvailable($id) {
        $wood = Wood::find($id);
        $wood->available = !$wood->available;
        $wood->save();

        return redirect('/admin/materials')->with('success', 'Disponibilité du bois modifiée');
    }
}
