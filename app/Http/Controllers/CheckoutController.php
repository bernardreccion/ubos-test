<?php

namespace App\Http\Controllers;

use App\Order;
use App\Credentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $cartItems = Cart::content();
            return view('cart.checkout')->with('cartItems', $cartItems);
        } 
        else 
        {
            return redirect('login');
        }
    }

    public function address(Request $request)
    {
        $this->validate($request,[
            'id_number' => 'required|min:8|max:8',
            'email' => 'required',
            'firstname' => 'required|min:2|max:30',
            'lastname' => 'required|min:2|max:30',
            'course' => 'required|min:2|max:100'
        ]);

        $request ['user_id']=Auth::user()->id;
        Credentials::create($request->all());

        Order::createOrder();
        Cart::destroy();

        return view('thankyou.index');
    }
}
