@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">

                <div class="me-md-3 me-xl-5">
                    <h2>Dash Board</h2>
                    <p class="mb-md-0">Your analytics dashboard template.</p>
                    <hr>
                </div>

                <div class="row">
                    <br>
                    <h3 style="color:darkblue">Orders </h3>
                    <br>
                    <br>
                    <div class="col-md-3">
                        <div class="card card-body bg-primary text-white mb-3">
                            <label >Total Orders</label>
                            <h1>{{ $totalorder }}</h1>
                            <a href="{{ url('/admin/orders') }}" class="text-white">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-success text-white mb-3">
                            <label >Today Orders</label>
                            <h1>{{ $ordersintoday }}</h1>
                            <a href="{{ url('/admin/orders') }}" class="text-white">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-warning text-white mb-3">
                            <label >This Month Orders</label>
                            <h1>{{ $orderinmonth }}</h1>
                            <a href="{{ url('/admin/orders') }}" class="text-white">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-danger text-white mb-3">
                            <label >This year Orders</label>
                            <h1>{{ $orderinyear }}</h1>
                            <a href="{{ url('/admin/orders') }}" class="text-white">View</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <br>
                    <h3 style="color:darkblue">Users </h3>
                    <br>
                    <br>
                    <div class="col-md-3">
                        <div class="card card-body bg-primary text-white mb-3">
                            <label >Total User</label>
                            <h1>{{ $totauser }}</h1>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-danger text-white mb-3">
                            <label>Users</label>
                            <h1>{{ $users }}</h1>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-success text-white mb-3">
                            <label>Admins</label>
                            <h1>{{ $admins }}</h1>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <br>
                    <h3 style="color:darkblue">Items </h3>
                    <br>
                    <br>
                    <div class="col-md-3">
                        <div class="card card-body bg-primary text-white mb-3">
                            <label >Total Product</label>
                            <h1>{{ $products }}</h1>
                            <a href="{{ url('/admin/product') }}" class="text-white">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-success text-white mb-3">
                            <label >Total Category</label>
                            <h1>{{ $category }}</h1>
                            <a href="{{ url('/admin/category') }}" class="text-white">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-success text-white mb-3">
                            <label >Total Brands</label>
                            <h1>{{ $brands }}</h1>
                            <a href="{{ url('/admin/brands') }}" class="text-white">View</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection
