<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shopping_Cart;
class ShoppingCartController extends Controller
{
    public function index(Request $request){
        $check=Customer::join('shopping_cart', 'customers.id_customer', '=', 'shopping_cart.id_customer')->count();
        if($check==0){
            self::createCart($request);
        }
        return redirect()->action('HomeController@index');
    }

    private function createCart(Request $request){
        $shopping_cart = new Shopping_Cart;
        $shopping_cart->id_customer=$request->session()->get('id');
        $shopping_cart->total_price=0;
        $shopping_cart->save();
    }
}
