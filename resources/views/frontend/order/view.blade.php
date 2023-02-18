@extends('layouts.app')

@section('title','My Order details')


@section('content')

<div class="py-3 py-md-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4" style="font-size: 26px; font-weight:bold; color:rgb(68, 68, 217)">
                        <i class="fa fa-shopping-cart text-dark mr-2"></i>My Order Details
                        <a href="{{ url('/orders') }}" class="btn btn-danger btn-sm float-end ">Back</a>
                    </h4>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="mb-3 mt-3" style="font-size: 22px; font-weight:bold">Order Details</h5>
                            <hr>
                            <br>
                            <h6 style="font-size: 18px; font-weight:500  ; margin-bottom:5px">Order ID :{{ $order->id }}</h6>
                            <h6 style="font-size: 18px; font-weight:500 ; margin-bottom:5px">Tracking No :{{ $order->tracking_no }}</h6>
                            <h6 style="font-size: 18px; font-weight:500  ; margin-bottom:5px">Payment Mode :{{ $order->payment_mode }}</h6>
                            <h6 style="font-size: 18px; font-weight:500 ; margin-bottom:5px">Orderd Date :{{ $order->created_at->format('d-m-Y') }}</h6>
                            <h6 class="border p-2 text-success" style="font-size: 18px; font-weight:bold; margin-left:-3px">
                                Order Status Message : <span class="text-uppercase">{{ $order->status_message }}</span>
                            </h6>
                        </div>

                        <div class="col-md-6">
                            <h5 class="mb-3 mt-3" style="font-size: 22px; font-weight:bold">User Details</h5>
                            <hr>
                            <br>
                            <h6 style="font-size: 18px; font-weight:500  ; margin-bottom:5px">Full Name :{{ $order->fullname }} </h6>
                            <h6 style="font-size: 18px; font-weight:500 ; margin-bottom:5px"> Email ID   :{{ $order->email }}</h6>
                            <h6 style="font-size: 18px; font-weight:500  ; margin-bottom:5px">Address   :{{ $order->address }}</h6>
                            <h6 style="font-size: 18px; font-weight:500 ; margin-bottom:5px">Phone Number :{{ $order->phone }}</h6>
                            <h6 style="font-size: 18px; font-weight:500 ; margin-bottom:5px">Pin Code :{{ $order->pincode }}</h6>
                        </div>
                    </div>
                    <br>
                    <h5 class="mb-3 mt-3" style="font-size: 22px; font-weight:bold">Order Item</h5>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Item ID</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>

                            </thead>
                            <tbody>
                                @php
                                    $totalprice=0;
                                @endphp
                                @foreach ($order->orderItems as $orderitem)


                                <tr>
                                    <td width="10%">{{ $orderitem->id }}</td>

                                    <td width="10%"><img src="{{ asset($orderitem->product->product_images[0]->image) }}" style="width: 50px; height:50px;"></td>
                                    <td width="10%">{{ $orderitem->product->name }}</td>
                                    <td width="10%">${{ $orderitem->price }}</td>
                                    <td width="10%">{{ $orderitem->quantity }}</td>
                                    <td width="10%" class="fw-bold">${{ $orderitem->price * $orderitem->quantity }}</td>

                                </tr>
                                @php
                                    $totalprice+= $orderitem->price * $orderitem->quantity;
                                @endphp

                                @endforeach
                                <tr class="bg-info">
                                    <td colspan="5" class="fw-bold">Total Price : </td>
                                    <td colspan="1" class="fw-bold">{{ $totalprice }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
