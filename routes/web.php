<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', 'AuthController@getRegister')->name('register');
    Route::post('/register', 'AuthController@postRegister');
    Route::get('/', 'AuthController@getLogin')->name('login');
    Route::post('/', 'AuthController@postLogin');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/prepaid-balance', 'PrepaidController@getPrepaid')->name('prepaid');
    Route::post('/prepaid-balance', 'PrepaidController@postPrepaid')->name('prepaid');
    Route::get('/product-page', 'ProductController@getProduct')->name('product');
    Route::post('/product-page', 'ProductController@postProduct')->name('product');
    Route::get('/order-prepaid/{mobile_number}', 'OrderController@getOrderPrepaid')->name('get-prepaid');
    Route::post('/order-prepaid', 'OrderController@postOrderPrepaid')->name('post-prepaid');
    Route::get('/order-product/{product}', 'OrderController@getOrderProduct')->name('get-product');
    Route::post('/order-product', 'OrderController@postOrderProduct')->name('post-product');
    Route::get('/pay-order/{order_no}', 'OrderController@getPayOrder')->name('get-order');
    Route::post('/pay-order', 'OrderController@postPayOrder')->name('post-order');
    Route::get('/order-history', 'OrderController@getOrderHistory')->name('order-history');
    Route::post('/order-history', 'OrderController@postOrderHistory')->name('paynow');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});