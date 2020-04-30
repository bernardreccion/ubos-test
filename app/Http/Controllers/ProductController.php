<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('category','id');
        return view('admin.product.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'location' => ['required','in:null,SDA,Main,Main&SDA'],
            'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        $uuid = Str::uuid()->toString();
        
        $products = new Product();
        $products->name = $request->input('name');
        $products->code = $uuid;
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->stock = $request->input('stock');
        $products->category_id = $request->input('category_id');
        $products->location = $request->input('location');

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/products',$filename);
            $products->image = $filename; 
        }
        else
        {
            return $request;
            $products->image = '';
        }
        $products->save();
        return redirect()->route('product.index')->with('status', 'Added a product successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::pluck('category','id');
        return view('admin.product.edit',compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'location' => ['required','in:null,SDA,Main,Main&SDA'],
            'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        $products = Product::find($id);
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->stock = $request->input('stock');
        $products->category_id = $request->input('category_id');
        $products->location = $request->input('location');

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/products', $filename);
            $products->image = $filename;
        }

        $products->save();

        return redirect()->route('product.index')->with('status', 'Updated a product successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Product::findOrFail($id);
        $deleteData->delete();
        return redirect()->route('product.index')->with('status', 'Deleted a product successfully!');

    }
}
