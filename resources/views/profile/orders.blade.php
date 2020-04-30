@extends('layouts.master')

@section('title')
    UBOS | Orders
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
                            <a class="nav-link active" href="{{ route('profile.orders') }}">My Orders</a>
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
                <div class="card-header">
                    <div class="card-title">
                        <h3>{{ucwords(Auth::user()->name)}}, Your Orders</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="orders">
                                <thead>
                                  <th>Date</th>
                                  <th>Product Name</th>
                                  <th>Product Code</th>
                                  <th>Order Total</th>
                                  <th>Order Status</th>
                                </thead>
                                <tbody>
                                  @foreach ($orders as $order)
                                  <tr>
                                      <td>{{$order->created_at}}</td>
                                      <td>{{$order->name}}</td>
                                      <td>{{$order->code}}</td>
                                      <td>{{$order->total}}</td>
                                      <td>{{$order->status}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#orders').DataTable({
        "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
        });
    });
</script>
@endsection
