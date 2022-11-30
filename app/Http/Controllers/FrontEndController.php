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

    public function productDetails($product_id){

        $categories = Category::where('status',1)->latest()->get();
        $product = Product::findOrFail($product_id);
        $category_id = $product->category_id;
        $relatedProducts = Product::where('category_id',$category_id)->where('id','!=',$product_id)->latest()->get();  
        return view('frontend.product-details',compact('categories','product','relatedProducts') );
    }
}
