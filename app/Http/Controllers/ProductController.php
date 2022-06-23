<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductosRequest;


class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('product/create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductosRequest $request)
    {
        $product = new Product;

        $product->nombre = $request->nombre;
        $product->precio = $request->precio;
        $product->impuesto = $request->impuesto;
        $product->save();

        $products = Product::all();

        return view('home', compact('products') )->with('message', 'Producto creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        
        $product = Product::where('id', $product)->first();

        return view('product/show', compact('product') );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $product = Product::where('id', $request->id)->first();

        $product->nombre = $request->nombre;
        $product->precio = $request->precio;
        $product->impuesto = $request->impuesto;
        $product->save();

        $products = Product::all();

        return view('home', compact('products') )->with('message', 'Producto Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Product::where('id', $product );
        $product->delete();

        $products = Product::all();

        return view('home', compact('products') )->with('message', 'Producto Eliminado');
    }
}
