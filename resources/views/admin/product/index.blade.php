@extends('layouts.admin')

@section('content')

<div>

    <div class="row">
        <div class="col-md-12 ">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')  }} </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>
                        Products
                        <a href="{{ url('admin/product/createp') }}" class="btn btn-primary btn-sm  float-end">Add
                            Product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Ctaegory</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product )
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->status == '0'?'visible':'hidden' }}</td>
                                <td>
                                    <a href="{{ url('admin/product/'.$product->id.'/edit') }}" class="btn btn-success m-2 " style="font-weight: 500;">Edit</a>
                                    <a href="{{ url('admin/product/'.$product->id.'/delete') }}" class="btn btn-danger m-2 " style="font-weight: 500; " onclick="return confirm('Are You Sure,You Want Delete Product')">Delete</a>
                                </td>
                            </tr>

                            @empty
                                <tr>
                                    <td> NO PRODUCT</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
