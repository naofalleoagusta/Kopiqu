<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index(Request $request){
        $products = Product::all();
        $value = $request->session()->get('id');
        if($request->session()->has('name')){
            //  dd($arr);
            //$request->session()->flush();
            if(!$request->session()->has('shoppingCart')){
                return view('home',['products'=>$products,'name'=>$request->session()->get('name'),'id'=>$request->session()->get('id')]);
            }
            else{
                $cart=$request->session()->get('shoppingCart');
                return view('home',['products'=>$products,'name'=>$request->session()->get('name'),'id'=>$request->session()->get('id'),'cart'=>$cart]);
            }
        }
        else{
            if($request->session()->has('admin')){
                if($request->session()->get('role')!="processor"){
                    return view('home',['products'=>$products,'admin'=>$request->session()->get('admin'),'role'=>$request->session()->get('role')]);
                }
                else{
                    return redirect()->action('AdminController@showOrders');;
                }
            }
            else{return view('home',['products'=>$products]);}
        }
    }

}
