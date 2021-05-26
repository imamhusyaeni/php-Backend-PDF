<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class ProductController extends Controller
{
    public function getProduct(){
        $email = auth()->user()->email;
        $count = count(Order::where('status', 'pay now')->where('email', $email)->get());
        return view('member.product-page', compact('count'));
    }

    public function postProduct(Request $request){
        $this->validate($request, [
            'product' => 'required | between:10,150',
            'shipping_address' => 'required | between:10,150',
            'price' => 'required | numeric',
        ]);

        Product::create([
            'product' => $request->product,
            'shipping_address' => $request->shipping_address,
            'price' => $request->price,
        ]);

        return redirect()->action('OrderController@getOrderProduct', ['product'=>$request->product,'type'=>$request->type]);
    }
}
