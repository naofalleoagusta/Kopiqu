<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Admin;
class LoginLogoutController extends Controller
{
    /*
    This function handle login action from user
    */
    public function login(Request $request){
        //Get input email from user
        $email = $request->email;
        //Get input password from user
        $password = $request->password;
        //Check existence of user in customers table 
        $customers=Customer::where('email',$email)->where('password',$password)->count();
        if($customers==1){
            //Get the data
            $customer = Customer::where('email',$email)->where('password',$password)->get();
            foreach ($customer as $cust) {
                //Store customer's name to session with key=>name
                $request->session()->put('name',$cust->name);
                //Store customer's id to session with key=>id
                $request->session()->put('id',$cust->id_customer);
            }
        }
        else{
            //Store the error message to session
            $admins=Admin::where('username',$email)->where('password',$password)->count();
            if($admins==1){
                $admin = Admin::where('username',$email)->where('password',$password)->get();
                foreach ($admin as $adm) {
                    //Store customer's name to session with key=>name
                    $request->session()->put('admin',$adm->name);
                    //Store customer's id to session with key=>id
                    $request->session()->put('role',$adm->role);
                }
            
            }
        }
        //redirect to homepage controller method index
        return redirect()->action('HomeController@index');
    }
    /*
    This function handle logout action from user
    */
    public function logout(Request $request){
        //delete user session
        $request->session()->forget('name');
        $request->session()->forget('id');
        $request->session()->forget('shoppingCart');
        $request->session()->forget('admin');
        $request->session()->forget('role');
        //redirect to homepage controller method index
        return redirect()->action('HomeController@index');
    }
}
