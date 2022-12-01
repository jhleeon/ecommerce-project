<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        if(Auth::check()){
            $categories = Category::where('status',1)->latest()->get();
            $subtotal = Cart::all()->where('user_ip',request()->ip())->sum( function($var){
                return $var->qty * $var->price;
            });
            return view('frontend.checkout-page',compact('categories','subtotal'));

        }else{
            return redirect()->route('login')->with('message','Please Login First For Proceed Checkout');
        }

    }
}
