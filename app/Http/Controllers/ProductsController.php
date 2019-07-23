<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductPhoto;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
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
        $tshirts = Product::where('category', 't-shirts')->get();
        $earrings = Product::where('category', 'earrings')->get();
        $caps = Product::where('category', 'caps')->get();

        return view('admin.products.index')->with([
            'tshirts' => $tshirts,
            'earrings' => $earrings,
            'caps' => $caps
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
            'price' => 'required',
            'category' => 'required'
        ]);

        // Create Product
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->available = true;
        $product->xs = $request->xs;
        $product->s = $request->s;
        $product->m = $request->m;
        $product->l = $request->l;
        $product->xl = $request->xl;
        $product->tu = $request->tu;
        $product->save();

        // Handle Files Upload
        if($request->hasFile('photos')) {
            foreach($request->photos as $photo) {
                // Save photo
                $filename = time() . '_' . $photo->getClientOriginalName();
                $directory = 'public/products/' . $product->id;
                $path = $photo->storeAs($directory, $filename);

                // Save to DB
                $photoToSave = new ProductPhoto;
                $photoToSave->product_id = $product->id;
                $photoToSave->path = $filename;
                $photoToSave->save();
            }
        }

        return  redirect('/admin/products')->with('success', 'Article créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $photos = ProductPhoto::where('product_id', $product->id)->get();

        return view('admin.products.show')->with([
            'product' => $product,
            'photos' => $photos    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.edit')->with('product', $product);
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
            'price' => 'required',
            'category' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        

        // Edit Product
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->available = $request->available;
        $product->xs = $request->xs;
        $product->s = $request->s;
        $product->m = $request->m;
        $product->l = $request->l;
        $product->xl = $request->xl;
        $product->tu = $request->tu;
        $product->save();

        // Handle Files Upload
        if($request->hasFile('photos')) {
            foreach($request->photos as $photo) {
                // Save photo
                $filename = time() . '_' . $photo->getClientOriginalName();
                $directory = 'public/products/' . $product->id;
                $path = $photo->storeAs($directory, $filename);

                // Save to DB
                $photoToSave = new ProductPhoto;
                $photoToSave->product_id = $product->id;
                $photoToSave->path = $filename;
                $photoToSave->save();
            }
        }

        return  redirect('/admin/products/' . $id)->with('success', 'Article modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $photos = ProductPhoto::where('product_id', $product->id)->get();

        foreach($photos as $photo) {
            Storage::delete('public/products/' . $product->id . '/' . $photo->path);

            $photo->delete();
        }

        $product->delete();

        return redirect('/admin/products')->with('success', 'Article supprimé !');
    }

    public function deletePhoto($id) {
        $photo = ProductPhoto::find($id);

        Storage::delete('/public/products/' . $photo->product_id . '/' . $photo->path);

        $photo->delete();

        return redirect('/admin/products/' . $photo->product_id)->with('success', 'Photo supprimée !');
    }
}
