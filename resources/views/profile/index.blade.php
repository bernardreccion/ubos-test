@extends('layouts.master')

@section('title')
    UBOS | Profile
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('profile.index') }}">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.orders') }}">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.address') }}">My Address</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>Welcome, {{Auth::user()->name}}</h1>
                    <h3 class="text-center">Hope you have a good and wonderful day!</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
