@extends('layouts.master')

@section('title')
    UBOS | Products List
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> List of Products</h4>
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="product">
              <thead class="text-primary">
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stocks</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                    <td><img src="{{ url('images/products', $product->image) }}" alt="" width="80"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>
                      <div class="row">
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success"><i class="now-ui-icons ui-1_settings-gear-63"></i></a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                        </form>
                      </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready( function () {
    $('#product').DataTable({
      "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
    });
  });
</script>    
@endsection