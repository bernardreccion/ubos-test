@extends('layouts.master')

@section('title')
    UBOS | Cart 
@endsection

@section('content')

<?php if ($cartItems->isEmpty()) { ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <h2>No Items In Cart</h2>
            </div>
            <div class="row justify-content-center">
                <h3><a href="{{ route('shop.shop') }}">Shop Now!</a></h3>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<section id="cart_items">
    <div class="container">
        {{-- Breadcrumbs --}}
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div id="updateDiv">
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                        <td>Action</td>
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
                    </thead>
                    <?php $count =1;?>
                    @foreach($cartItems as $cartItem)
                        <tbody>
                        <tr>
                            <td class="cart_image">
                                <p><img src="{{asset('images/products/' . $cartItem->options->image)}}" class="img-responsive productCart"></p>
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
                                <form action="{{ url('cart/update',$cartItem->rowId) }}" method="post" role="form">
                                    <div class="form-group">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="proId" value="{{$cartItem->id}}"/>
                                        <input type="number" class="form-control" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                                autocomplete="off" MIN="1" MAX="1000">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary form-control" value="Update" >
                                    </div>
                                </form>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">Php {{$cartItem->subtotal}}</p>
                            </td>
                            <td class="delete">
                                <a href="{{ route('cart.remove',$cartItem->rowId)}}" class="btn btn-danger">X</a>
                            </td>
                        </tr>
                        <?php $count++;?>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Your Cart
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cart Sub Total <span class="pull-right">Php {{Cart::subtotal()}}</span></li>
                            <li class="list-group-item">Total <span class="pull-right font-weight-bold">Php {{Cart::subtotal()}}</span></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary btn-block" href="{{ route('checkout.index')}}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
<?php } ?>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        <?php for($i=1; $i<20; $i++) { ?>
            $('#upCart<?php echo $i;?>').on('change keyup', function(){
            var newqty = $('#upCart<?php echo $i;?>').val();
            var rowId = $('#rowId<?php echo $i;?>').val();
            var proId = $('#proId<?php echo $i;?>').val();
            if(newqty <=0){ alert('enter only valid qty') }
            else {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url('/cart/update');?>/'+proID,
                    data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                    success: function (response) {
                        console.log(response);
                        $('#updateDiv').html(response);
                    }
                });
            }
        });
        <?php } ?>
    });
</script>
@endsection
