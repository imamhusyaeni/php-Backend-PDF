<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Prepaid;
use App\Product;
use App\Order;
use App\User;

class OrderController extends Controller
{

    public function getOrderPrepaid(Request $request){
        $prepaids = Prepaid::where('mobile_number', $request->mobile_number)->get();
        foreach ($prepaids as $prepaid) {
            $value = $prepaid->value;
        }
        $type = $request->type;
        $order = mt_rand(1000000000, 9999999999);
        $total = $value + ($value*(5/100));
        $email = auth()->user()->email;
        $count = count(Order::where('status', 'pay now')->where('email', $email)->get());
        return view('member.order-prepaid', compact('prepaid','order','total','type','count'));
    }

    public function postOrderPrepaid(Request $request){
        $this->validate($request, [
            'order_no' => 'unique:order,order_no',
        ]);

        Order::create([
            'order_no' => $request->order_no,
            'total' => $request->total,
            'date' => $request->date,
            'email' => $request->email,
            'type' => $request->type,
        ]);

        return redirect()->route('get-order', ['order_no'=>$request->order_no]);
    }

    public function getOrderProduct(){
        $request = request();
        $products = Product::where('product', $request->product)->get();
        foreach ($products as $product) {
            $price = $product->price;
        }
        $type = $request->type;
        $order = mt_rand(1000000000, 9999999999);
        $total = $price + 10000;
        $email = auth()->user()->email;
        $count = count(Order::where('status', 'pay now')->where('email', $email)->get());
        return view('member.order-product', compact('product','order','total','type','count'));
    }

    public function postOrderProduct(Request $request){
        $this->validate($request, [
            'order_no' => 'unique:order,order_no',
        ]);

        Order::create([
            'order_no' => $request->order_no,
            'total' => $request->total,
            'date' => $request->date,
            'email' => $request->email,
            'type' => $request->type,
        ]);

        return redirect()->route('get-order', ['order_no'=>$request->order_no]);
    }

    public function getPayOrder(Request $request){
        $order = $request->order_no;
        $email = auth()->user()->email;
        $count = count(Order::where('status', 'pay now')->where('email', $email)->get());
        return view('member.pay-order', compact('order','count'));
    }

    public function postPayOrder(Request $request){
        $orders = Order::where('order_no', $request->order_no)->get();
        foreach ($orders as $order) {
        }
        $status = $order->status;
        $shipping_code = $order->shipping_code;
        $type = $order->type;

        $status = "success";
        if ($type != "top-up") {
            $shipping_code = Str::upper(Str::random(8));
        }
        
        Order::where('order_no', $request->order_no)
            ->update([
                'status' => $status,
                'shipping_code' => $shipping_code,
            ]);
        
        return redirect()->route('order-history');
    }

    public function getOrderHistory(Request $request){
        $email = auth()->user()->email;
        $value = $request->search;
        if ($request->has('search')) {
            if ($value == null) {
                $orders = Order::orderby('date', 'desc')->where('email', $email)->paginate(20);
            }else {
                $orders = Order::where('order_no','LIKE','%'.$request->search.'%')->where('email', $email)->paginate(20);
            }
        }else {
            $orders = Order::orderby('date', 'desc')->where('email', $email)->paginate(20);
        }
        $count = count(Order::where('status', 'pay now')->where('email', $email)->get());
        return view('member.order-history', compact('orders','count'));
    }

    public function postOrderHistory(Request $request){
        $order = $request->order_no;
        return redirect()->route('get-order', ['order_no'=>$request->order_no]);
    }
}
