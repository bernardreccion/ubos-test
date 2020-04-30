@extends('layouts.master')

@section('title')
    UBOS | Add Product
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Add New Product</h4>
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="form-group {{$errors->has('name')?' has-error': ''}}">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Input product name..." required>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group {{$errors->has('price')?' has-error': ''}}">
                            <label for="price">Product Price</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Input product price..." required>
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        </div>

                        <div class="form-group {{$errors->has('description')?' has-error': ''}}">
                            <label for="description">Product Description</label>
                            <textarea name="description" id="description" rows="5" class="form-control" placeholder="Input product description..." required></textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group {{$errors->has('location')?' has-error': ''}}">
                            <label for="location">Location</label>
                            <select name="location" id="location" class="form-control" required>
                                <option value="">Select Location...</option>
                                <option value="SDA">School of Design & Arts</option>
                                <option value="Main">Benilde Main</option>
                                <option value="Main&SDA">Both</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('location') }}</span>
                        </div>

                        <div class="form-group {{$errors->has('category_id')?' has-error': ''}}">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select Category...</option>
                                @foreach ($categories as $id=>$category)
                                    <option value="{{$id}}">{{$category}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        </div>

                        <div class="form-group {{$errors->has('stock')?' has-error': ''}}">
                            <label for="stock">Number of Stocks</label>
                            <input type="text" name="stock" id="stock" class="form-control" placeholder="Input number of stocks..." required>
                            <span class="text-danger">{{ $errors->first('stock') }}</span>
                        </div>

                        <div class="form-group {{$errors->has('image')?' has-error': ''}}">
                            <label for="image">Product Image</label>
                            <input type="file" name="image" class="form-control">
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection