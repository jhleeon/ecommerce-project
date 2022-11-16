<?php

namespace App\Http\Controllers;

use App\Models\Whislist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhislistController extends Controller
{
    public function addWishlist($product_id)
    {
        if (AUTH::check()) {
            
            Whislist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id
            ]);
            return redirect()->back()->with('message', "Add To Wishlist");
        }
        else{
            return redirect()->route('login')->with('message', "Please Login TO Add Wishlist");
        }
    }
}
