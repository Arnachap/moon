<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Slide;

class SliderController extends Controller
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
        $slides = Slide::orderBy('position', 'asc')->get();

        return view('admin.slider.index')->with('slides', $slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title' => 'required',
            'image' => 'required'
        ]);

        // Save image
        $filename = time() . '_' . $request->image->getClientOriginalName();
        $path = $request->image->storeAs('public/slider', $filename);

        $slide = new Slide;
        $slide->title = $request->title;
        $slide->link_name = $request->link_name;
        $slide->link = $request->link;
        $slide->image = $filename;
        $slide->save();

        return redirect('/admin/slider')->with('success', 'Image ajouter au slider d\'accueil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::find($id);

        return view('admin.slider.show')->with('slide', $slide);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);

        return view('admin.slider.edit')->with('slide', $slide);
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

        $slide = Slide::find($id);

        if($request->image) {
            // Delete old image
            Storage::delete('public/slider/' . $slide->image);

            // Save new image
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/slider', $filename);
            $slide->image = $filename;
        }

        $slide->title = $request->title;
        $slide->link_name = $request->link_name;
        $slide->link = $request->link;
        $slide->save();

        return redirect('/admin/slider/' . $slide->id)->with('success', 'Slide modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);

        Storage::delete('public/slider/' . $slide->image);
        
        $slide->delete();

        return redirect('/admin/slider')->with('success', 'Slide supprimée !');
    }

    public function sort(Request $request) {
        foreach ($request->id as $index => $id) {
            $slide = Slide::find($id);
            $slide->position = $index;
            $slide->save();
        }

        return redirect('/admin/slider')->with('success', 'Ordre des slides sauvegardé');
    }
}
