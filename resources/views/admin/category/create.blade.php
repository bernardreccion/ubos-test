@extends('layouts.master')

@section('title')
    UBOS | Add Category
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Add New Category</h4>
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category">Category Name</label>
                    <input type="text" name="category" id="category" class="form-control" placeholder="Input category...">
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