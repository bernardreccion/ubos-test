@extends('layouts.master')

@section('title')
    UBOS | Thank You!
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <div class="row justify-content-center">
                        <h3>Thank you for ordering, <span>{{ucwords(Auth::user()->name)}}</span>!</h3>
                        <p>Keep track on your orders by clicking <a href="{{ route('profile.orders') }}">here</a></p>
                    </div>
                    <div class="row justify-content-center">
                        <a href="{{ route('shop.shop') }}">Buy Again!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
