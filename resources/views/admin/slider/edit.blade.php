@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>
                    Edit Slider
                    <a href="{{ url('admin/slider') }}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/slider/'.$slider->id.'/update') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control mt-2" value="{{ $slider->title }}"/>
                            @error('title')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label>Description</label><br>
                            <textarea name="description" class="form-control mt-2" rows="3">{{ $slider->description }}</textarea>
                            @error('description')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>

                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control mt-2" /><br>
                            <img src="{{ asset("$slider->image") }}">
                            <br>
                            @error('image')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label>Status</label><br><br>
                            <input type="checkbox" name="status" style="width: 30px; height:30px;" {{ $slider->status == '1'? "checked": "" }}/><br> <br>
                            Checked=Hidden , Unchecked=Visible
                            @error('status')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary float-end" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection
