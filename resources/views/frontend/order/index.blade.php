@extends('layouts.app')

@section('title','Orders')


@section('content')

<div class="py-3 py-md-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4" id="category">Orders</h4>

                    <div class="table-responsive">
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
                                @forelse ($orders as $order)


                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->tracking_no }}</td>
                                    <td>{{ $order->fullname }}</td>
                                    <td>{{ $order->payment_mode }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->status_message }}</td>
                                    <td>
                                        <a href="{{ url('orders/'.$order->id) }}" class="btn btn-success">View</a>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="7">No Order Avaliables</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $orders->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
