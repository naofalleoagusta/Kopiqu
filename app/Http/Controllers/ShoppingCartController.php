<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Arr;

class ShoppingCartController extends Controller
{
    public function addToCart(Request $request){
        $product=Product::where('id_product',$request->id_product)->get();
        foreach ($product as $prod) {
            $arrOfCart=Arr::add([],'id_product',$prod->id_product);
            $arrOfCart=Arr::add($arrOfCart,'quantity',$request->quantity);
            $arrOfCart=Arr::add($arrOfCart,'weight',$prod->weight*$request->quantity);
            $arrOfCart=Arr::add($arrOfCart,'total',$prod->price*$request->quantity+($prod->weight*$request->quantity*5000));
            $finalItem=Arr::add([],$prod->name,$arrOfCart);
            if($request->session()->has('shoppingCart')){
                $arr=$request->session()->get('shoppingCart');
                $arr+=$finalItem;
                $request->session()->put('shoppingCart',$arr);
            }
            else{
                $request->session()->put('shoppingCart',$finalItem);
            }
           return redirect()->action('HomeController@index');
        }
    }
}
