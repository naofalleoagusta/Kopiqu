<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class PaymentController extends Controller
{
    public function processPayment(Request $request){
        Order::where('id_customer',$request->session()->get('id'))->where('paid',0)->update(['address' => $request->address,'paid'=>1]);
        $request->session()->forget('shoppingCart');
        return view('payment_success',['name'=>$request->session()->get('name'),'id'=>$request->session()->get('id')]);
    }
}
