@extends('layouts.master')

@section('title')
    UBOS | Wishlist
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <?php if ($products->isEmpty()) { ?>
                <div class="row justify-content-center">
                    <h2>No Items In Wishlist</h2>
                </div>
                <div class="row justify-content-center">
                    <h3><a href="{{ route('shop.shop') }}"> Shop Now!</a></h3>
                </div>
            <?php } else { ?>
                <div class="card-body">
                    <h3>My Wishlist</h3> 
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
    <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('shop.product',$product->id) }}">
                        <img src="{{ asset('images/products/' . $product->image) }}" class="img-fluid imageWishlist" alt="product">
                    </a>

                    <div class="options">
                        <a href="{{ route('shop.product',$product->id) }}" class="card-link">{{ $product->name }}</a>
                        <p class="card-text">Php {{ $product->price }}<p>
                    </div>
                    <div class="options">
                        <a href="{{ route('cart.addItem', $product->id) }}" class="btn btn-success btn-lg btn-block">Add to Cart</a>
                        <a href="{{ route('shop.removeWishlist', $product->id) }}" class="btn btn-danger btn-lg btn-block">Remove to Wishlist</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <?php } ?>
    </div>
</div>
@endsection

@section('scripts')

@endsection
