<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function orders()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('order_product')
            ->leftJoin('products','products.id', '=', 'order_product.product_id')
            ->leftJoin('orders', 'orders.id', '=', 'order_product.order_id')
            ->where('orders.user_id', '=', $user_id)->get();
        return view('profile.orders')->with('orders', $orders);
    }

    public function address()
    {
        $user_id = Auth::user()->id;
        $credentials = DB::table('credentials')->where('user_id', $user_id)
            ->limit(1)->get();

        return view('profile.address')->with('credentials',$credentials);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'firstname' => 'required|min:2|max:30',
            'lastname' => 'required|min:2|max:30',
            'course' => 'required|min:2|max:100'
        ]);

        $user_id = Auth::user()->id;
        DB::table('credentials')->where('user_id',$user_id)->update($request->except('_token'));

        return back()->with('status', 'Your credentials has been updated!');
    }
}
