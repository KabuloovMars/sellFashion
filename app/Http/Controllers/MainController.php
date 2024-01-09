<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function dashboard(){
        $userType = Auth::user()->user_type;
        $products = Product::paginate(3);
        if($userType==1){
            return view('admin.home');
        }else{

            return view('home.index',compact('products'));
        }
    }

    public function indexHomeProduct(){
        $products = Product::paginate(4);


        return view('home.index',compact('products'));
    }


    public function cartViewProduct(){
        if(Auth::check()){

            return view('home.cart-view-product');
        }else{

            return redirect()->route('login');
        }


    }
}
