<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $categories = Category::where('status',1)->latest()->get();
        $products = Product::where('status',1)->latest()->get();
        $product_limits = Product::where('status',1)->latest()->limit(3)->get();
        return view('frontend.index', compact('categories','products','product_limits'));
    }
}
