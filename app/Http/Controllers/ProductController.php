<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index',[
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validation
        $validate=$request->validate([
            'nproducto' => ['required', 'min:5', 'max:255'],
            'cantidad' => ['required'],
            'precio' => ['required']
        ]);

        Product::create($validate);

        //insert into base de datos
    /*    Product::create([
            'nproducto' => $request->get('nproducto'),
            'cantidad' => $request->get('cantidad'),
            'precio' => $request->get('precio'),

        ]);*/

        //session()->flash('status', 'Chirp Created, Successfully!!!');
        return to_route('product.index')->with('status', __('Product Created, Successfully!!!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit',[
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //validation
        $validate = $request->validate([
            'nproducto' => ['required', 'min:5', 'max:255'],
            'cantidad' => ['required'],
            'precio' => ['required']
        ]);

        //insert into base de datos
       $product->update($validate);
       return to_route('product.index')->with('status', __('Product Updated, Successfully!!!'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('product.index')->with('status', __('Product Deleted, Successfully!!!'));
    }
}
