<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required',
            'barcode' => 'required|unique:products',
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => doubleval($request->input('price')),
            'barcode' => $request->input('barcode'),
        ]);

        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        if($id){
            $product = Product::find($id);

            $request->validate([
                'name' => 'nullable|unique:products',
                'barcode' => 'nullable|unique:products',
            ]);

            $request->input('name') ? $product->name = $request->input('name') : null;
            $request->input('description') ? $product->description = $request->input('description') : null;
            $request->input('price') ? $product->price = $request->input('price') : null;
            $request->input('barcode') ? $product->barcode = $request->input('barcode') : null;

            $product->save();

            return $product;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($id){
            $product = Product::find($id);
            $product->delete();
        }
    }
}
