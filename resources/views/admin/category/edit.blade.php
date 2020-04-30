@extends('layouts.master')

@section('title')
    UBOS | Edit Category
@endsection

@section('content')

<div class="container">
    <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                    <h3>Edit Category</h3>
                 </div>
                 <div class="card-body">
                    <div class="col-md-6">
                        <form action="{{ route('category.update',$categories->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="category" value="{{ $categories->category }}" class="form-control">
                            </div>
                            <a href="{{ route('category.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                 </div>
             </div>
         </div>
    </div>
</div>

@endsection

@section('scripts')
    
@endsection