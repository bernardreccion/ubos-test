@extends('layouts.master')

@section('title')
    UBOS | Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 text-center">
                            <a href="http://apps.benilde.edu.ph/sis/"><h3>Visit SIS</h3></a>
                            <a href="http://apps.benilde.edu.ph/sis/">
                                <img src="{{ url('images/benilde.jpeg') }}" alt="SIS" class="img-fluid" width="300">
                            </a>
                            
                        </div>
                        <div class="col-md-6 text-center">
                            <a href="https://bigsky.benilde.edu.ph/d2l/login"><h3>Visit Bigsky</h3></a>
                            <a href="https://bigsky.benilde.edu.ph/d2l/login">
                                <img src="{{ url('images/bigsky.jpg') }}" alt="Bigsky" class="img-fluid" width="300">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
