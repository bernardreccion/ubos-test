@extends('layouts.master')

@section('title')
    UBOS | Checkout
@endsection

@section('content')
<div class="container">

    {{-- Breadcrumbs --}}
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Cart</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9">
                <br>
                <p class="h2">Checkout</p>
                <p class="lead">You currently have <strong>{{Cart::count()}}</strong> item/s in your basket</p>
            </div>
        </div>
    </div>

    <!-- Checkout Forms-->
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                @if(session('error'))

                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
            </tr>
            <tr class="cart_menu">
                <td>Image</td>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
            </tr>
            </thead>
            <?php $count =1;?>
            @foreach($cartItems as $cartItem)
                <tbody>
                <tr>
                    <td class="cart_image">
                        <a href="{{ route('shop.product',$cartItem->id) }}"><img src="{{asset('images/products/' . $cartItem->options->image)}}" class="img-responsive productCart"></a>
                    </td>
                    <td class="cart_product">
                        <h5><a href="{{ route('shop.product', $cartItem->id) }}">{{$cartItem->name}}</a></h5>
                        <p>Product ID: {{$cartItem->id}}</p>
                        <p>Only {{$cartItem->options->stock}} left</p>
                    </td>
                    <td class="cart_price">
                        <p>Php {{$cartItem->price}}</p>
                    </td>
                    <td class="cart_quantity">
                        <form action="{{ route('cart.update',$cartItem->rowId) }}" method="post">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="proId" value="{{$cartItem->id}}"/>
                                
                                <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                                <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>
                                <input type="number" class="form-control" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>" 
                                    autocomplete="off" MIN="1" MAX="100">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control" value="Update">
                            </div>
                        </form>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">Php {{$cartItem->subtotal}}</p>
                    </td>
                </tr>
                <?php $count++;?>
                </tbody>
            @endforeach
        </table>
    </div>

    <?php  // form start here ?>
    <section class="checkout">
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('/formvalidate') }}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <h2>Personal Information</h2>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="id_number" class="form-label">ID Number</label>
                                        <input id="id_number" type="text" name="id_number" placeholder="ID Number" value="{{ old('id_number') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('id_number') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="text" name="email" placeholder="Benilde Email" value="{{ old('email') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('email') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="firstname" class="form-label">First Name</label>
                                        <input id="firstname" type="text" name="firstname" placeholder="First Name"  value="{{ old('firstname') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('firstname') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname" class="form-label">Last Name</label>
                                        <input id="lastname" type="text" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('lastname') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course" class="form-label">Course</label>
                                        <input id="course" type="text" name="course" placeholder="Course" value="{{ old('course') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('course') }}</span>
                                    </div>
                                    <hr>
                                    <div class="form-group col-md-12">
                                        <hr/>
                                        <div>
                                            <input type="submit" value="Place Order" class="btn btn-primary form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-uppercase">Order Summary</h6>
                            <p>Please prepare the total amount and we will contact you through your email!</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Order Subtotal <span class="pull-right">Php {{Cart::subtotal()}}</span></li>
                                <li class="list-group-item">Total <span class="pull-right font-weight-bold">Php {{Cart::subtotal()}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection