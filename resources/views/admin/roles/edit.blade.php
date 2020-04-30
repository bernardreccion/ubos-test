@extends('layouts.master')

@section('title')
    UBOS | Edit Users
@endsection

@section('content')

<div class="container">
    <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                    <h3>Edit Registered Role</h3>
                 </div>
                 <div class="card-body">
                    <div class="col-md-6">
                        <form action="{{ route('roles.update',$users->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $users->name }}" class="form-control">
                            </div>
                            <a href="{{ route('roles.index') }}" class="btn btn-danger">Cancel</a>
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