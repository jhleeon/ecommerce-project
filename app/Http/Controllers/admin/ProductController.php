<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;


class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.product.create', compact('categories','brands'));
    }


    public function store(Request $request){
   
        $request->validate([
        'category_id'=>'required',
        'brand_id'=>'required',
        'product_code'=>'required|max:255',
        'product_name'=>'required|max:255',
        'price'=>'required|max:255',
        'short_description'=>'required',
        'long_description'=>'required',
        'quantity'=>'required|max:255',
        'image_one'=>'required|mimes:jpg,jpeg,png',
        'image_two'=>'required|mimes:jpg,jpeg,png',
        'image_three'=>'required|mimes:jpg,jpeg,png',

        ],[

        'category_id.required' => 'Select category name',
        'brand_id.required' => 'Select brand name'
        ]);

        $image_one = $request->file('image_one');
    
        $image_name = hexdec(uniqid()).".".$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(270,270)->save('frontend/img/product/upload/'.$image_name);
        $image_one_url = 'frontend/img/product/upload/'.$image_name;
       
        $image_two = $request->file('image_two');
        $image_name = hexdec(uniqid()).".".$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(270,270)->save('frontend/img/product/upload/'.$image_name);
        $image_two_url = 'frontend/img/product/upload/'.$image_name;
        
        $image_three = $request->file('image_three');
        $image_name = hexdec(uniqid()).".".$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(270,270)->save('frontend/img/product/upload/'.$image_name);
        $image_three_url = 'frontend/img/product/upload/'.$image_name;

       Product::insert([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'price' => $request->price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'quantity' => $request->quantity,
            'image_one' => $image_one_url,
            'image_two' => $image_two_url,
            'image_three' => $image_three_url,
            'created_at' => Carbon::now(),
        ]);
        
       
        return redirect()->route('product.create')->with('success', 'Product Added Successful');

    }

    public function manage(){
        $products = Product::latest()->get();
        return view('backend.product.manage', compact('products'));
    }

    public function edit($product_id){
        $product = Product::find($product_id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.product.edit', compact('product','categories','brands'));
    }


    public function update(Request $request, $product_id){

        $request->validate([
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_code'=>'required|max:255',
            'product_name'=>'required|max:255',
            'price'=>'required|max:255',
            'short_description'=>'required',
            'long_description'=>'required',
            'quantity'=>'required|max:255',
    
            ],[
    
            'category_id.required' => 'Select category name',
            'brand_id.required' => 'Select brand name'
            ]);

            $products = Product::findOrFail($product_id);

            if($request->has('image_one')){
                unlink($products->image_one);
                $image_one = $request->file('image_one');
                $image_name = hexdec(uniqid()).".".$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('frontend/img/product/upload/'.$image_name);
                $products->image_one = 'frontend/img/product/upload/'.$image_name;
            }

            if( $request->has('image_two')){
                unlink($products->image_two);
                $image_two = $request->file('image_two');
                $image_name = hexdec(uniqid()).".".$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(270,270)->save('frontend/img/product/upload/'.$image_name);
                $products->image_two = 'frontend/img/product/upload/'.$image_name;

            }
    
            if( $request->has('image_three')){
            unlink($products->image_three);
            $image_three = $request->file('image_three');
            $image_name = hexdec(uniqid()).".".$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(270,270)->save('frontend/img/product/upload/'.$image_name);
            $products->image_three = 'frontend/img/product/upload/'.$image_name;
                
            }
    
    
                $products->update([

                    'category_id' => $request->category_id,
                    'brand_id' => $request->brand_id,
                    'product_code' => $request->product_code,
                    'product_name' => $request->product_name,
                    'price' => $request->price,
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                    'quantity' => $request->quantity,
                    'updated_at' => Carbon::now(),
            ]);
            
           
            return redirect()->route('product.manage')->with('success', 'Product Edited Successful');
    }


    public function delete($product_id){

       

        $products=Product::find($product_id);
        unlink($products->image_one);
        unlink($products->image_two);
        unlink($products->image_three);
        $products->delete();
        return redirect()->route('product.manage')->with('success', 'Product Deleted Successfully'); 
    }


  public function inactive($product_id){
 
        Product::find($product_id)->update([
            'status' => 0,
        ]);
        return redirect()->route('product.manage');
    }

    public function active($product_id){
        Product::find($product_id)->update([
            'status' => 1,
        ]);
        return redirect()->route('product.manage');
    } 



}
