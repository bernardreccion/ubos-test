@extends('layouts.app')

@section('content')

<div class="container">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-center" style="margin-bottom:5px;">UBOS</h1>
                        <h5 class="text-center">Unboxed Benilde Online Store</h5>
                    </div>
                    <div class="card-body">
                        <div id="carousel" class="carousel slide" 
                            data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                                <li data-target="#carousel" data-slide-to="2"></li>
                                <li data-target="#carousel" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ url('images/unboxed-1.jpg') }}" class="d-block w-100"/> 
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ url('images/unboxed-2.jpg') }}" class="d-block w-100"/>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ url('images/unboxed-3.jpg') }}" class="d-block w-100"/>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ url('images/unboxed-4.jpg') }}" class="d-block w-100"/>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection