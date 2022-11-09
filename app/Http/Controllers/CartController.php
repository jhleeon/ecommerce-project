<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $product_id){
        
        $product = Product::find($product_id);
 
        $check = Cart::where('product_id',$product_id)->where('user_ip',$request->ip())->first();
        if($check){

            Cart::where('product_id',$product_id)->increment('qty');
            return redirect()->back();
        }
        else{
            Cart::insert([
                'product_id' => $product->id,
                'qty' => 1,
                'price' => $product->price,
                'user_ip' =>$request->ip(),
                'created_at' =>Carbon::now(),
            ]);
            return redirect()->back();
        }
        
    }
}
