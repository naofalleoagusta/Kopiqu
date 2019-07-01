<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CategoryProduct;
use App\Order;

class AdminController extends Controller
{
    public function update(Request $request){
        $id=$request->id_product;
        $name =$request->product_name;
        $description=$request->description;
        $price=$request->price;
        Product::where('id_product', $id)
        ->update(['name' => $name,'price'=>$price,'description'=>$description]);
        return redirect()->action('HomeController@index');
    }

    public function delete(Request $request){
        $id=$request->id_product;
        CategoryProduct::where('id_product', '=', $id)->delete();
        $del = Product::where('id_product', '=', $id);
        $del->delete();
        return redirect()->action('HomeController@index');
    }

    public function showOrders(Request $request){
        $orders = Order::where('finished','=','0')->get();
        return view('processOrder',['orders'=>$orders,'admin'=>$request->session()->get('admin'),'role'=>$request->session()->get('role')]);
    }

    public function finishOrder(Request $request){
        Order::where('id_order','=',$request->id_order)->update(['finished' => 1]);
        return redirect()->action('AdminController@showOrders');;
    }
}
