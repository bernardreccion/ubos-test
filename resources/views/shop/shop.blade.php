@extends('layouts.master')

@section('title')
    UBOS | Shop
@endsection

@section('content')
<div class="container">

    {{-- Breadcrumbs --}}
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-block dropdown-toggle" id="dropdownCategory">Categories</button>
                </div>
                <div id="categories" aria-labelledby="dropdownCategory">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item categoriesItem" id="all">All</li>
                        @foreach ($categories as $category)
                            <li class="list-group-item categoriesItem" id="{{ $category->category }}">{{ $category->category }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9 blockContainer">
            <div class="row">
                @if(count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-sm-auto filterDiv {{$product->categories->category}}">
                            <div class="card fixCard">
                                <div class="card-body">
                                    
                                    <a href="{{ route('shop.product',$product->id) }}"><img src="{{ asset('images/products/' . $product->image) }}" class="img-fluid imageCatalog" alt="product"></a>
                                
                                    <div class="options">
                                        <a href="{{ route('shop.product',$product->id) }}" class="card-link">{{ $product->name }}</a>
                                        <p class="card-text">Php {{ $product->price }}<p>
                                    </div>
                                    
                                </div>
                                <div class="card-footer text-muted">
                                    <p style="text-align:center">{{$product->categories->category}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2>No Products Found!</h2>
                @endif
                
            </div>
            {{-- <div class="row justify-content-center">
                {{$products->links()}}
            </div> --}}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
    $("#dropdownCategory").click(function(){
        $("#categories").slideToggle();
    });

    $('.categoriesItem').click(function(){
        var category = $(this).attr('id');

        if(category == 'all'){
            $('.filterDiv').addClass('hide');
            setTimeout(function(){
                $('.filterDiv').removeClass('hide');
            }, 300);
        } else {
            $('.filterDiv').addClass('hide');
            setTimeout(function(){
                $('.' + category).removeClass('hide');
            }, 300);
        }
    })

});

</script>
@endsection
