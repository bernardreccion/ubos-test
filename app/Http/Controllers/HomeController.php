<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Category;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contact() 
    {
        return view('contact');
    }

    public function send(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'bodyMessage' => $request->message
        );
        Mail::send('email_template', $data, function($message)use($data){
            $message->from($data['email']);
            $message->to('ubos2020@gmail.com');
            $message->subject('New Customer Inquiry');

        });
        return back()->with('success','Thank you for contacting us! We will get back to you soon!');
    }

    public function shop()
    {
        $products = Product::all();
        $categories = Category::all();


        return view('shop.shop')->with([
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function product($id)
    {
        $products = Product::findOrFail($id);
        
        return view('shop.product')->with('products', $products);
    }

    public function wishlist()
    {
        $products = DB::table('wishlist')
            ->leftJoin('products','wishlist.prod_id', '=', 'products.id')
            ->get();

        return view('shop.wishlist')->with('products',$products);
    }

    public function addWishlist(Request $request)
    {
        $wishlist = new Wishlist();

        $wishlist->user_id = Auth::user()->id;
        $wishlist->prod_id = $request->prod_id;
        $wishlist->save();

        // $products = DB::table('products')->where('id', $request->prod_id)->get();

        $products = Product::findOrFail($request->prod_id);

        return view('shop.product')->with('products', $products);
    }

    public function removeWishlist($id)
    {
        DB::table('wishlist')->where('prod_id', '=', $id)->delete();

        return back()->with('status', 'Your item is removed from wishlist');
    }

}
