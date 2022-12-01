<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
 
        
        $orderId = Order::insertGetId([
            'user_id' => Auth::id(),
            'invoice_no' => mt_rand(100000,999999),
            'payment_type' => $request->payment_type,
            'subtotal' =>  $request->subtotal,
            'total' =>  $request->total,
            'cupon_discount' =>  $request->cupon_discount,
        ]);


     
        $cartItems = Cart::where('user_ip', request()->ip())->latest()->get();
        foreach ($cartItems as $cartItem ) {
            Orderitem::insert([
                'order_id'=> $orderId,
                'product_id'=> $cartItem->product_id,
                'product_name'=> $cartItem->product->product_name,
                'product_quantity'=> $cartItem->qty,   
            ]);
        }

        Shipping::insert([
                'order_id'=>$orderId,
                'shipping_name'=>$request->shipping_name,
                'shipping_email'=>$request->shipping_email,
                'shipping_phone'=>$request->shipping_phone,
                'address'=>$request->address,
                'state'=>$request->state,
                'post_code'=>$request->post_code,
         
            ]);
            
            if(session()->has('cupon')){
                session()->forget('cupon');
            }

            Cart::where('user_ip',request()->ip())->delete();

            return redirect()->route('ordersuccess')->with('order-success','Proceed to Order Successfully Done');
    }

    public function orderSuccess(){
        $categories = Category::where('status',1)->latest()->get();
        return view('frontend.order-success',compact('categories'));
    }
}
