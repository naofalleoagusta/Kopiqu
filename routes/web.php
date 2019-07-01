<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');
Route::post('/login','LoginLogoutController@login');
Route::get('/logout','LoginLogoutController@logout');
Route::post('/addToCart','ShoppingCartController@addToCart');
Route::get('/checkOut','CheckOutController@check');
Route::post('/payment','PaymentController@processPayment');
