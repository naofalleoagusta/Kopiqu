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
            //Store customer's name to session with key=>name
            //$prod->id_product,$prod->price,$request->quantity
            $arrOfCart=Arr::add([],'id_product',$prod->id_product);
            $arrOfCart=Arr::add($arrOfCart,'quantity',$request->quantity);
            $arrOfCart=Arr::add($arrOfCart,'total',$prod->price*$request->quantity);
            $finalItem=Arr::add([],$prod->name,$arrOfCart);
            if($request->session()->has('shoppingCart')){
                $arr=$request->session()->get('shoppingCart');
                $arr+=$finalItem;
                // $array=Arr::prepend([],$request->session()->get('shoppingCart'));
                // if(count($array)==1){
                //     $array+=$arrOfCart;
                //     //dd($array);
                // }
                // else{
                //     $arr=$array;
                //     $temp=Arr::prepend($arr,$arrOfCart);
                //     dd($temp);
                // }
                //dd(count($array));
                //$arrOfCart=Arr::prepend($array,$arrOfCart);
                $request->session()->put('shoppingCart',$arr);
            }
            else{
                $request->session()->put('shoppingCart',$finalItem);
            }

           return redirect()->action('HomeController@index');
            //$request->session()->put('name',$cust->name);
            //Store customer's id to session with key=>id
            //$request->session()->put('id',$cust->id_customer);
        }
    }
}
