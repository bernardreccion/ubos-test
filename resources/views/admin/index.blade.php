@extends('layouts.master')

@section('title')
    UBOS | Admin Panel
@endsection

@section('content')
    
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Welcome to UBOS!</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <h3>Welcome, {{Auth::user()->name}}</h3>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection