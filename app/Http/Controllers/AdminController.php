<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
