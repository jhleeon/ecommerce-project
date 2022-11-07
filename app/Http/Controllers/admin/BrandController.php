<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
       $brands = Brand::latest()->get();
        return view('backend.brand.index', compact('brands'));
    }

    public function store(Request $request){
        $request->validate([
            'brand_name'=>'required|unique:brands,brand_name',
        ]);

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'created_at'=>Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Brand Added Successfully'); 
    }

    public function edit($brand_id){
        $brand = Brand::find($brand_id);
        return view('backend.brand.edit', compact('brand'));
    }

    public function update(Request $request, $brand_id){
        Brand::find($brand_id)->update([
            'brand_name' => $request->brand_name,
            'updated_at' =>Carbon::now(),
        ]);
            return redirect()->route('brand.index')->with('success', 'Brand Edited Successfully'); 

    }

    public function delete($brand_id){
        Brand::find($brand_id)->delete();
        return redirect()->route('brand.index')->with('success', 'Brand Deleted Successfully'); 
    }


  public function inactive($brand_id){
        Brand::find($brand_id)->update([
            'status' => 0,
        ]);
        return redirect()->route('brand.index');
    }

    public function active($brand_id){
        Brand::find($brand_id)->update([
            'status' => 1,
        ]);
        return redirect()->route('brand.index');
    } 

}
