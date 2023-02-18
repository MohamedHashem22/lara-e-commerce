@extends('layouts.admin')

@section('content')

<div>
    <div class="row">
        <div class="col-md-12 ">

            <div class="card">
                <div class="card-header">
                    <h3>
                        Order List
                    </h3>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3 ">
                                <label>Filter By Date</label>
                                <br>
                                <input type="date" name="date" value="{{ date("Y-m-d") }}" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label >Filter By Status</label>
                                <br>
                                <select name="status" class="form-control">
                                    <option value="">Select status</option>
                                    <option value="in progress" >in progress</option>
                                    <option value="completed" >completed</option>
                                    <option value="pending" >pending</option>
                                    <option value="canceled" >canceled</option>
                                    <option value="out for delivery" >out for delivery</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Order ID</th>
                                <th>Tracking No</th>
                                <th>UserName</th>
                                <th>Payment Mode</th>
                                <th>Orderd Date</th>
                                <th>Status Message</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->tracking_no }}</td>
                                    <td>{{ $order->fullname }}</td>
                                    <td>{{ $order->payment_mode }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->status_message }}</td>
                                    <td>
                                        <a href="{{ url('admin/orders/'.$order->id) }}" class="btn btn-success">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
