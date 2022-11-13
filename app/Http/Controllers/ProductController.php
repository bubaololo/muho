<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }
    public function singleProduct($id)
    {
        $product = Product::find($id);
//    dd($product);
        return view('product', compact('product'));
    }


}
