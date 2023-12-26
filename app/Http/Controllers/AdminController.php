<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function addViewCategory(){

        $categories = Category::all();
        return view('admin.category-create',compact('categories'));
    }

    public function addCategory(Request $request){

        $request->validate([
            'name'=>'required'
        ]);

        Category::create([
            'name'=>$request->name
        ]);

        return redirect()->back()->with('message','created category successfuly!');

    }

    public function deleteCategory($id){

        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with('message','Category deleted successfuly!');
    }

    public function editCategory($id){
        $category  = Category::findOrFail($id);

        return view('admin.update-category',compact('category'));
    }

    public function updateCategory(Request $request){
        $category = Category::findOrFail($request->id);
         $category->update([
            'name'=>$request->name
         ]);

         $categories =Category::all();



         return view('admin.category-create',compact('categories') )->with('message','Category updated successfuly!');

    }

    //product

    public function addViewProduct (){
        $categories = Category::all();
        return view('admin.addViewProduct',compact('categories'));

    }

    public function addProduct(Request $request){

       $request->validate([
            'name'=>'required',
            'desc'=>'required',
            'price'=>'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
       ]);


       $data = $request->all();
       if($request->hasFile('img')){
        $img = $request->file('img');
        $imgName = time().'-'.$img->getClientOriginalName();
        $path = $img->storeAs('product-img',$imgName);
        $data['img']=$imgName;

       }


       
       Product::create($data);

       return redirect()->route('viewProduct');

    }


    public function viewProduct(){
        $products  = Product::all();

        return view('admin.viewProduct',compact('products'));
    }
}
