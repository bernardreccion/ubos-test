@extends('layouts.master')

@section('title')
    UBOS | Shop | {{$products->name}}
@endsection

@section('content')
<div class="container">

    {{-- Breadcrumbs --}}
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('shop.shop') }}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$products->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        </div>
    </div>


    {{-- Content --}}
    <div class="row">
        <div class="col">
            <img src="{{ asset('images/products/' . $products->image) }}" class="img-fluid productDetail" alt="product">
        </div>
        <div class="col-sm-6">
            <h3>{{$products->name}}</h3>
            <p class="h5">Category: <strong><i>{{$products->categories->category}}</i></strong></p>
            <p class="h5">Available: <strong>{{$products->stock}}</strong> In Stock</p>
            <p class="h5">Location: {{$products->location}} Campus</p>

            <div class="row">
                <a href="{{ route('cart.addItem', $products->id) }}" class="btn btn-primary btn-lg">Add to Cart</a>
           
                <?php 
                    $wishlistData = DB::table('wishlist')->rightJoin('products', 'wishlist.prod_id', '=', 'products.id')
                        ->where('wishlist.prod_id', '=', $products->id)->get();
    
                    $count = App\Wishlist::where(['prod_id'=>$products->id])->count();
    
                    if($count=="0") {
    
                ?>
    
                <form action="{{ route('shop.addWishlist') }}" method="post" role="form"> 
                    @csrf
                    <input type="hidden" value="{{$products->id}}" name="prod_id" id="prod_id">
                    <button type="submit" class="btn btn-lg btn-primary">Add to Wishlist</button>
                </form>
    
                <?php } else { ?>
                    <button type="button" class="btn btn-lg btn-primary" disabled>Already Added to Wishlist</button>
                <?php }?>
    
                <br/><br/>
            </div>
        </div>
        <div class="col">
            <h3 class="text-danger">Php {{$products->price}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Description</h4>
            <hr>
            <p class="text-justify" style="text-indent:50px;">{{$products->description}}</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
