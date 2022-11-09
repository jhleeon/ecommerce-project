<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CuponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $cupons = Cupon::latest()->get();
         return view('backend.cupon.index', compact('cupons'));
     }
 
     public function store(Request $request){
         $request->validate([
             'cupon_name'=>'required|unique:cupons,cupon_name',
         ]);
 
         Cupon::insert([
             'cupon_name'=>strtoupper($request->cupon_name),
             'created_at'=>Carbon::now(),
             
         ]);
 
         return redirect()->back()->with('cupon-success', 'Cupon Added Successfully'); 
     }

     public function edit($cupon_id){
        $cupon = Cupon::find($cupon_id);
        return view('backend.cupon.edit', compact('cupon'));
    }

    public function update(Request $request, $cupon_id){
    
        Cupon::find($cupon_id)->update([
            'cupon_name' => strtoupper($request->cupon_name),
            'updated_at' =>Carbon::now(),
        ]);
            return redirect()->route('cupon.index')->with('success', 'Cupon Edited Successfully'); 

    }

    public function delete($cupon_id){
        Cupon::find($cupon_id)->delete();
        return redirect()->route('cupon.index')->with('success', 'Cupon Deleted Successfully'); 
    }


  public function inactive($cupon_id){
        Cupon::find($cupon_id)->update([
            'status' => 0,
        ]);
        return redirect()->route('cupon.index');
    }

    public function active($cupon_id){
        Cupon::find($cupon_id)->update([
            'status' => 1,
        ]);
        return redirect()->route('cupon.index');
    } 
}
