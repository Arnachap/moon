<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wood;
use App\Tissu;

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
        $tissus = Tissu::all();

        return view('admin.materials.index')
            ->with('woods', $woods)
            ->with('tissus', $tissus);
    }

    public function toggleAvailable($id) {
        $wood = Wood::find($id);
        $wood->available = !$wood->available;
        $wood->save();

        return redirect('/admin/materials')->with('success', 'Disponibilité du bois modifiée');
    }

    public function addTissu(Request $request) {
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);

        // Handle file upload
        $filename = $request->file('image')->getClientOriginalName();
        $filenameToStore = time() . '_' . $filename;
        $path = $request->file('image')->storeAs('public/tissus', $filenameToStore);

        $tissu = new Tissu;
        $tissu->name = $request->name;
        $tissu->filename = $filenameToStore;
        $tissu->save();

        return redirect('/admin/materials')->with('success', 'Tissu ajouté');
    }
}
