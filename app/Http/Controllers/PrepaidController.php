<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prepaid;
use App\Order;

class PrepaidController extends Controller
{
    public function getPrepaid(){
        $email = auth()->user()->email;
        $count = count(Order::where('status', 'pay now')->where('email', $email)->get());
        return view('member.prepaid-balance', compact('count'));
    }

    public function postPrepaid(Request $request){
        // $this->validate($request, [
        //     'mobile_number' => 'required|digits_between:7,12',
        //     'value' => 'required'
        // ]);

        // Prepaid::create([
        //     'mobile_number' => $request->mobile_number,
        //     'value' => $request->value,
        // ]);

        // return redirect()->route('get-prepaid', ['mobile_number'=>$request->mobile_number,'type'=>$request->type]);
        dd($request);
    }
}
