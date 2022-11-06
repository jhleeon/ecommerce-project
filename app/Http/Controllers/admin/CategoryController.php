<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $categories = Category::latest()->get();
        return view('backend.category.index', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories,category_name',
        ]);

        Category::insert([
            'category_name'=>$request->category_name,
            'created_at'=>Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Category Added Successfully'); 
    }

    public function edit($cat_id){
        $category = Category::find($cat_id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, $cat_id){
        Category::find($cat_id)->update([
            'category_name' => $request->category_name,
            'updated_at' =>Carbon::now(),
        ]);
            return redirect()->route('category.index')->with('success', 'Category Edited Successfully'); 

    }

    public function delete($cat_id){
        Category::find($cat_id)->delete();
        return redirect()->route('category.index')->with('success', 'Category Deleted Successfully'); 
    }


  public function inactive($cat_id){
        Category::find($cat_id)->update([
            'status' => 0,
        ]);
        return redirect()->route('category.index');
    }

    public function active($cat_id){
        Category::find($cat_id)->update([
            'status' => 1,
        ]);
        return redirect()->route('category.index');
    }




}
