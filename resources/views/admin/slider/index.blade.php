@extends('layouts.admin')

@section('content')

<div>


    <div class="row">
        <div class="col-md-12 ">
            @if(session('message'))
            <div class="alert alert-success">{{session('message') }} </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>
                        Sliders
                        <a href="{{ url('admin/slider/creates') }}" class="btn btn-primary btn-sm  float-end">Add
                            Slider</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                                <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ substr($slider->title,0,50) }}...</td>
                                <td>{{ substr($slider->description,0,50) }}...</td>
                                <td>{{ $slider->status == '1'? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <img src="{{ asset("$slider->image") }}" alt='img' style="width:60px; height:60px; border-radius:50%;"
                                </td>
                                <td>
                                    <a href="{{ url('admin/slider/'.$slider->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty

                            <tr>
                                <td>No Slider</td>
                            </tr>

                            @endforelse

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>

</div>


@endsection
