@extends('layouts.master')

@section('title')
    UBOS | Edit Product
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
             <div class="card">
                <div class="card-header">
                    <h3>Edit Product</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form action="{{ route('product.update',$products->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group {{$errors->has('name')?' has-error': ''}}">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" value="{{ $products->name }}" class="form-control" required>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>

                                    <div class="form-group {{$errors->has('price')?' has-error': ''}}">
                                        <label for="price">Product Price</label>
                                        <input type="text" name="price" value="{{ $products->price }}" class="form-control" required>
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    </div>

                                    <div class="form-group {{$errors->has('description')?' has-error': ''}}">
                                        <label for="description">Product Description</label>
                                        <textarea name="description" id="description" rows="5" class="form-control" required>
                                            {{ $products->description }}
                                        </textarea>
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group {{$errors->has('location')?' has-error': ''}}">
                                        <label for="location">Location</label>
                                        <select name="location" id="location" class="form-control" required>
                                            <option @if($products->location == "") {{'selected'}} @endif value="">Select Location...</option>
                                            <option @if($products->location == "SDA") {{'selected'}} @endif value="SDA">School of Design & Arts</option>
                                            <option @if($products->location == "Main") {{'selected'}} @endif value="Main">Benilde Main</option>
                                            <option @if($products->location == "Main&SDA") {{'selected'}} @endif value="Main&SDA">Both</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('location') }}</span>
                                    </div>

                                    <div class="form-group {{$errors->has('category_id')?' has-error': ''}}">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            <option value="">Select Category...</option>
                                            @foreach ($categories as $id=>$category)
                                                <option @if($products->category_id == $id) {{'selected'}} @endif value="{{$id}}">{{$category}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    </div>

                                    <div class="form-group {{$errors->has('stock')?' has-error': ''}}">
                                        <label for="stock">Number of Stocks</label>
                                        <input type="text" name="stock" id="stock" value="{{ $products->stock }}" class="form-control" required>
                                        <span class="text-danger">{{ $errors->first('stock') }}</span>
                                    </div>

                                    <div class="form-group {{$errors->has('image')?' has-error': ''}}">
                                        <label for="image">Product Image</label>
                                        <input type="file" name="image" value="{{ $products->image }}" class="form-control">
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('product.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
?>

@endsection

@section('scripts')
    
@endsection