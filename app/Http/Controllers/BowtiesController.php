<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bowtie;
use App\Collection;

class BowtiesController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collections = Collection::pluck('title', 'id')->all();

        return view('admin.bowties.create')->with('collections', $collections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required'
        ]);

        $bowtie = new Bowtie;
        $bowtie->name = $request->name;
        $bowtie->description = $request->description;
        $bowtie->photo = $request->photo;
        $bowtie->price = $request->price;
        $bowtie->available = $request->available;
        $bowtie->collection_id = $request->collection_id;
        $bowtie->save();

        return redirect('/admin/collections')->with('success', 'Nœd pap\' ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bowtie = Bowtie::find($id);

        return view('admin.bowties.show')->with('bowtie', $bowtie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bowtie = Bowtie::find($id);
        $collections = Collection::pluck('title', 'id')->all();

        return view('admin.bowties.edit')
            ->with('bowtie', $bowtie)
            ->with('collections', $collections);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required'
        ]);

        $bowtie = Bowtie::find($id);
        $bowtie->name = $request->name;
        $bowtie->description = $request->description;
        $bowtie->photo = $request->photo;
        $bowtie->price = $request->price;
        $bowtie->available = $request->available;
        $bowtie->collection_id = $request->collection_id;
        $bowtie->save();

        return redirect('/admin/collections')->with('success', 'Nœd pap\' modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bowtie = Bowtie::find($id);

        $bowtie->delete();

        return redirect('/admin/collections')->with('success', 'Nœd pap\' supprimé');
    }
}
