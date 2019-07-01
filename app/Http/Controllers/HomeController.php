<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\CategoryProduct;

class HomeController extends Controller
{
    public function index(Request $request){
        $products = Product::all();
        $categories = Category::all();
        $value = $request->session()->get('id');
        if($request->session()->has('name')){
            //  dd($arr);
            //$request->session()->flush();
            if(!$request->session()->has('shoppingCart')){
                return view('home',['categories'=>$categories,'products'=>$products,'name'=>$request->session()->get('name'),'id'=>$request->session()->get('id')]);
            }
            else{
                $cart=$request->session()->get('shoppingCart');
                return view('home',['categories'=>$categories,'products'=>$products,'name'=>$request->session()->get('name'),'id'=>$request->session()->get('id'),'cart'=>$cart]);
            }
        }
        else{
            if($request->session()->has('admin')){
                if($request->session()->get('role')!="processor"){
                    return view('home',['categories'=>$categories,'products'=>$products,'admin'=>$request->session()->get('admin'),'role'=>$request->session()->get('role')]);
                }
                else{
                    return redirect()->action('AdminController@showOrders');;
                }
            }
            else{return view('home',['products'=>$products,'categories'=>$categories]);}
        }
    }

    public function searchByCategory(Request $request){
        $categories = Category::all();
        $producthasCategory=Product::select('products.quantity','products.name','products.id_product','products.description','products.price')->join('product_has_category','product_has_category.id_product','=','products.id_product')->join('category','product_has_category.id_category','=','category.id_category')->where('category.id_category',$request->cat)->orWhere('category.id_category',$request->cat)->get();

        if($request->session()->has('name')){
            //  dd($arr);
            //$request->session()->flush();
            if(!$request->session()->has('shoppingCart')){
                return view('home',['categories'=>$categories,'products'=>$producthasCategory,'name'=>$request->session()->get('name'),'id'=>$request->session()->get('id')]);
            }
            else{
                $cart=$request->session()->get('shoppingCart');
                return view('home',['categories'=>$categories,'products'=>$producthasCategory,'name'=>$request->session()->get('name'),'id'=>$request->session()->get('id'),'cart'=>$cart]);
            }
        }
        else{
            if($request->session()->has('admin')){
                if($request->session()->get('role')!="processor"){
                    return view('home',['categories'=>$categories,'products'=>$producthasCategory,'admin'=>$request->session()->get('admin'),'role'=>$request->session()->get('role')]);
                }
                else{
                    return redirect()->action('AdminController@showOrders');;
                }
            }
            else{return view('home',['products'=>$producthasCategory,'categories'=>$categories]);}
        }
    }

}
