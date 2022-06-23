<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class CompraController extends Controller
{
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($product)
    {
        $compra = new Compra;

        $compra->user_id = Auth::user()->id;
        $compra->product_id = $product;
        $compra->save();

        $products = Product::all();

        return view('home', compact('products') );        
    }

 
}
