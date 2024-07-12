<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        // dd($request->all());

        $cart = new Cart();
        $cart->user_id = Auth::guard('customer')->user()->id;
        $cart->save();

        $cart_detail = new CartDetail();
        $cart_detail->cart_id = $cart->id;
        $cart_detail->product_id = $request->product_id;
        $cart_detail->quantity = $request->quantity;
        $cart_detail->price = $request->price;
        $cart_detail->total_price = $request->price * $request->quantity;
        $cart_detail->save();

        return redirect()->back()->with('success', 'Mua thành công');
    }
}
