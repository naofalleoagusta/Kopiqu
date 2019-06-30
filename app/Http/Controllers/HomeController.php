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
            return view('home',['products'=>$products,'name'=>$request->session()->get('name'),'id'=>$request->session()->get('id')]);
        }
        else{
            return view('home',['products'=>$products]);
        }
    }
}
