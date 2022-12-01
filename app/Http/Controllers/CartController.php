<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Cupon;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $product_id){
        
        $product = Product::find($product_id);
 
        $check = Cart::where('product_id',$product_id)->where('user_ip',$request->ip())->first();
        if($check){

            Cart::where('product_id',$product_id)->increment('qty');
            return redirect()->back()->with('message',"Product added to cart Successfully");
        }
        else{
            Cart::insert([
                'product_id' => $product->id,
                'qty' => 1,
                'price' => $product->price,
                'user_ip' =>$request->ip(),
                'created_at' =>Carbon::now(),
            ]);
            return redirect()->back()->with('message',"Product added to cart Successfully");
        }
        
    }

    public function cartPage(){
        $categories = Category::where('status',1)->latest()->get();
        $cartItems = cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip',request()->ip())->sum( function($var){
            return $var->qty * $var->price;
        });
        return view('frontend.cart',compact('cartItems','categories','subtotal'));
    }


    public function cartUpdate( Request $request, $cart_id){
        Cart::where('id',$cart_id)->where('user_ip',$request->ip())->update([
            'qty' => $request->qty,
        ]);
    return redirect()->back()->with('success',"Cart Item Update Successfully");

    }

    public function cartDelete($cart_id){
        $cartItem = Cart::where('id',$cart_id)->where('user_ip', request()->ip())->first();
        $cartItem->delete();
        return redirect()->back()->with('success',"Cart Item Remove Successfully");
    }


    

    public function cupon(Request $request){
      $cupon =  Cupon::where('cupon_name',$request->cupon_name)->first();
        if($cupon){
            Session::put('cupon',[
                'cupon_name' => $cupon->cupon_name,
                'cupon_discount' =>$cupon->cupon_discount,
            ]);
            return redirect()->back()->with('success',"Cuppon Applied");
        }
        else{
           return redirect()->back()->with('success',"Invalid Cupon");
        }
    }


    public function cuponremove(){
        if (session::has('cupon')){
            session()->forget('cupon');
            return redirect()->back()->with('success','Cupon Removed Successfully');
        }
    }
}
