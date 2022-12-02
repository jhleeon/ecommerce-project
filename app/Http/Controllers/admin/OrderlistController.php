<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $orders = Order::get();
        return view('backend.order.index',compact('orders'));
    }

    public function orderView($order_id){
        $order = Order::findOrFail($order_id);
        $orderitems = Orderitem::where('order_id',$order_id)->orderBy('id','DESC')->get();
        $shipping = Shipping::where('order_id',$order_id)->orderBy('id','DESC')->first();
        // dd($shipping);
        return view('backend.order.order-view',compact('orderitems','shipping','order'));
    }
}
