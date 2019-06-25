<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'photo' => 'image'
        ]);

        // Handle file upload
        $filename = $request->file('photo')->getClientOriginalName();
        $filenameToStore = time() . '_' . $filename;
        $path = $request->file('photo')->storeAs('public/bowties', $filenameToStore);

        $bowtie = new Bowtie;
        $bowtie->name = $request->name;
        $bowtie->description = $request->description;
        $bowtie->photo = $filenameToStore;
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
        $collection = Collection::find($bowtie->collection_id);

        return view('admin.bowties.show')
            ->with('bowtie', $bowtie)
            ->with('collection', $collection);
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
            'description' => 'required'
        ]);

        $bowtie = Bowtie::find($id);

        // Handle file upload
        if ($request->hasFile('photo')) {
            // Delete old file
            Storage::delete('public/bowties/' . $bowtie->photo);

            // Save new image
            $filename = $request->file('photo')->getClientOriginalName();
            $filenameToStore = time() . '_' . $filename;
            $path = $request->file('photo')->storeAs('public/bowties', $filenameToStore);

            $bowtie->photo = $filenameToStore;
        }

        $bowtie->name = $request->name;
        $bowtie->description = $request->description;
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

        Storage::delete('public/bowties/' . $bowtie->photo);

        $bowtie->delete();

        return redirect('/admin/collections')->with('success', 'Nœd pap\' supprimé');
    }
}
