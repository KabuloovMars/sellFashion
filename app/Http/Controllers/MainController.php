<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use GuzzleHttp\Psr7\Message;
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


    public function productDesc($id){

        $product = Product::findOrFail($id);

        return view('home.product-desc',compact('product'));


    }


    public function addToCart(Request $request ,$id){

        if(Auth::check()){
           $product = Product::findOrFail($id);
           $user = Auth::user();
            $price="";
           if($product->discount_price==NULL){
            $price = $product->price;
           }else{
            $price = $product->discount_price;
           }

           $total_price = $request->quantity*$price;
           Cart::create([
            'product_id'=>$product->id,
            'user_id'=>$user->id,
            'user_name'=>$user->name,
            'email'=>$user->email,
            'phone'=>$user->phone,
            'address'=>$user->address,
            'product_name'=>$product->name,
            'img'=>$product->img,
            'price'=>$price,
            'total_price'=>$total_price,
            'quantity'=>$request->quantity
           ]);

           return redirect()->route('indexCart');
        }else{
            return redirect()->route('login')->with('message','You need to enter the site to order the product');
        }
    }


    public function indexCart(){
        return view('home.cart-view-product');
    }
}
