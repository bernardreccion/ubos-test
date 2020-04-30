@extends('layouts.master')

@section('title')
    UBOS | Address
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.index') }}">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.orders') }}">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('profile.address') }}">My Address</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>{{ucwords(Auth::user()->name)}}, Your Credentials</h3>
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        <form action="{{ route('profile.update') }}" method="post" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                @foreach ($credentials as $credential)
                                    <div class="col-md-6 form-group {{$errors->has('firstname')?' has-error': ''}}">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstname" class="form-control" id="firstname" value="{{$credential->firstname}}" placeholder="First Name">
                                        <span class="text-danger">{{$errors->first('firstname')}}</span>
                                    </div>

                                    <div class="col-md-6 form-group {{$errors->has('lastname')?' has-error': ''}}">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastname" class="form-control" id="lastname" value="{{$credential->lastname}}" placeholder="Last Name">
                                        <span class="text-danger">{{$errors->first('lastname')}}</span>
                                    </div>

                                    <div class="col-md-6 form-group {{$errors->has('email')?' has-error': ''}}">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{$credential->email}}" placeholder="Email">
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    </div>

                                    <div class="col-md-6 form-group {{$errors->has('course')?' has-error': ''}}">
                                        <label for="course">Course</label>
                                        <input type="text" name="course" class="form-control" id="course" value="{{$credential->course}}" placeholder="Course">
                                        <span class="text-danger">{{$errors->first('course')}}</span>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary">Update Address</button>
                            </div>
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
