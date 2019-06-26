<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Bowtie;

class CollectionsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::orderBy('position', 'asc')->get();
        $bowties = Bowtie::all();

        return view('admin.collections.index')
            ->with('collections', $collections)
            ->with('bowties', $bowties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collections.create');
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
            'title' => 'required'
        ]);

        $collection = new Collection;
        $collection->title = $request->title;
        $collection->intro = $request->intro;
        $collection->save();

        return redirect('/admin/collections')->with('success', 'Collection créée');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Collection::find($id);

        return view('admin.collections.edit')->with('collection', $collection);
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
            'title' => 'required'
        ]);

        $collection = Collection::find($id);
        $collection->title = $request->title;
        $collection->intro = $request->intro;
        $collection->save();

        return redirect('/admin/collections')->with('success', 'Collection modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection = Collection::find($id);
        $bowties = Bowtie::where('collection_id', $collection->id)->get();

        foreach ($bowties as $bowtie) {
            $bowtie->delete();
        }

        $collection->delete();

        return redirect('/admin/collections')->with('success', 'Collection supprimée');
    }

    public function sort(Request $request) {
        foreach ($request->id as $index => $id) {
            $collection = Collection::find($id);
            $collection->position = $index;
            $collection->save();
        }

        return redirect('/admin/collections')->with('success', 'Ordre des collections sauvegardé');
    }
}
