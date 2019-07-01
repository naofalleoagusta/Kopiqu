<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class CheckOutController extends Controller
{
    public function createOrder(Request $request,$total){
        $arr=$request->session()->get('shoppingCart');
        $orders = new Order;
        $orders->id_customer=$request->session()->get('id');
        $orders->amount_to_be_paid=$total;
        $orders->paid=0;
        $orders->finished=0;
        $orders->address="belom isi";
        $orders->save();
    }

    public function updateAmount(Request $request){
        Order::where('id_customer',$request->session()->get('id'))->where('paid',0)->update(['amount_to_be_paid' => (int)$request->total-$request->session()->get('unique_code')]);
    }
    
    public function check(Request $request){
        if($request->session()->has('name')){
            //  dd($arr);
            //$request->session()->flush();
            if(!$request->session()->has('shoppingCart')){
                return redirect()->action('HomeController@index');
            }
            else{
                $cart=$request->session()->get('shoppingCart');
                $total=0;
                $checkOrder =Order::where('id_customer',$request->session()->get('id'))->where('paid',0)->count();
                if($checkOrder==0){
                    if(!$request->session()->has('unique_code')){
                        $request->session()->put('unique_code',1);
                        $total=(int)$request->total-$request->session()->get('unique_code');
                        $orders=Order::where('amount_to_be_paid',$temp)->count();
                        if($orders>=1){
                            $request->session()->put('unique_code',$request->session()->get('unique_code')-1);
                            $total=(int)$request->total-$request->session()->get('unique_code');
                            dd($total);
                            Self::createOrder($request,$total);
                        }
                        else{
                            $total=(int)$request->total-$request->session()->get('unique_code');
                            Self::createOrder($request,$total);
                        }
                    }
                    else{
                        if($request->session()->get('unique_code')<=500){
                            $request->session()->put('unique_code',$request->session()->get('unique_code')-1);
                        }
                        else{
                            $request->session()->put('unique_code',1);
                        }
                        $temp=$request->total-$request->session()->get('unique_code');
                        $orders=Order::where('amount_to_be_paid',$temp)->count();
                        if($orders>=1){
                            $request->session()->put('unique_code',$request->session()->get('unique_code')-1);
                            $total=(int)$request->total-$request->session()->get('unique_code');
                            dd($total);
                            Self::createOrder($request,$total);
                        }
                        else{
                            $total=(int)$request->total-$request->session()->get('unique_code');
                            Self::createOrder($request,$total);
                        }
                    }
                }
                else{
                    $count =Order::where('id_customer',$request->session()->get('id'))->where('paid',0)->where('amount_to_be_paid','!=',(int)$request->total-$request->session()->get('unique_code'))->count();
                    if($count==1){
                        self::updateAmount($request);
                    }
                }
                $total=(int)$request->total-$request->session()->get('unique_code');
                return view('checkout',['name'=>$request->session()->get('name'),'id'=>$request->session()->get('id'),'cart'=>$cart,'total'=>$total]);
            }
        }
        else{
            return view('home',['products'=>$products]);
        }
    }
}
