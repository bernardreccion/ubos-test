<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['status', 'total', 'user_id'];

    public function orderFields()
    {
        return $this->belongsToMany('App\Product')->withPivot('qty', 'total');
    }

    public static function createOrder()
    {
        $user = Auth::user();
        $order = $user->orders()->create(['status' => 'pending','total' => Cart::subtotal()]);
        $cartItems = Cart::content();


        foreach ($cartItems as $cartItem)
        {
            $order->orderFields()->attach($cartItem->id, 
                ['qty' => $cartItem->qty, 'total' => $cartItem->qty*$cartItem->price]);
        }
    }
}
