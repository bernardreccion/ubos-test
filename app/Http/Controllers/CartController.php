<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();

        return view('cart.index')->with('cartItems', $cartItems);
    }

    public function addItem($id)
    {
        $product=Product::findOrFail($id);
        Cart::add($id, $product->name, 1, $product->price, ['image'=>$product->image,'stock'=>$product->stock]);
        
        return back()->with('status', 'Item is added to cart!');
    }

    public function update(Request $request, $id)
    {
        $qty = $request->qty;
        $proId = $request->proId;
        $product = Product::findOrFail($proId);
        $stock = $product->stock;

        if($qty < $stock)
        {
            Cart::update($id, $request->qty);
            return back()->with('status', 'Cart is updated');
        }
        else
        {
            return back()->with('error', 'Your quantity is more than the product stock!');
        }
    }

    public function remove($id)
    {
        Cart::remove($id);

        return back()->with('status', 'Successfully removed an item in your cart!');
    }

    
}
