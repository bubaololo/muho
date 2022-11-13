<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainPageController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('main-page', compact('products'));
    }
}
