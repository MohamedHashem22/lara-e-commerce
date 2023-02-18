@extends('layouts.admin')

@section('content')

<div>
    <div class="row">
        <div class="col-md-12 ">
        @if(session('message'))
        <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h3>
                        View Order
                    </h3>
                </div>
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4" style="font-size: 26px; font-weight:bold; color:rgb(68, 68, 217)">
                        <i class="fa fa-shopping-cart text-dark mr-2"></i>My Order Details
                        <a href="{{ url('/admin/order') }}" class="btn btn-danger btn-sm float-end" style="font-weight:bold; font-size:16px;">Back</a>
                        <a href="{{ url('/admin/downloadInvoice/'.$order->id) }}" class="btn btn-primary btn-sm float-end " style="font-weight:bold; font-size:16px; margin-right:5px;">Download Invoice</a>
                        <a href="{{ url('/admin/viewInvoice/'.$order->id) }}" class="btn btn-warning btn-sm float-end " style="font-weight:bold; font-size:16px; margin-right:5px;" target="_blank">View Invoice</a>
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

            <div class="card">
                <div class="card-body">
                    <h4>Order Process (Order Status Update)</h4>
                    <div class="row">
                        <div class="col-md-5">
                            <form method="POST" action="{{ url('admin/orders/'.$order->id) }}">
                                @csrf

                                <label>Update Your Order Status</label>
                                <div class="input-group">
                                    <select name="status" class="form-select">
                                        <option value="">Select status</option>
                                        <option value="in progress" {{ $order->status_message=='in progress'? 'selected':'' }}>in progress</option>
                                        <option value="completed" {{ $order->status_message=='completed'? 'selected':'' }}>completed</option>
                                        <option value="pending" {{ $order->status_message=='pending'? 'selected':'' }}>pending</option>
                                        <option value="canceled" {{ $order->status_message=='canceled'? 'selected':'' }}>canceled</option>
                                        <option value="out for delivery" {{ $order->status_message=='out for delivery'? 'selected':'' }}>out for delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h4 class="mt-3">Current Order Status:<span class="text-uppercase">{{ $order->status_message }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
