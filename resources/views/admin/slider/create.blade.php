@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Slider
                    <a href="{{ url('admin/slider') }}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/slider') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control mt-2" />
                            @error('title')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label>Description</label><br>
                            <textarea name="description" class="form-control mt-2" rows="3"></textarea>
                            @error('description')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>

                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control mt-2" /><br>
                            @error('image')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label>Status</label><br><br>
                            <input type="checkbox" name="status" style="width: 30px; height:30px;" /><br> <br>
                            Checked=Hidden , Unchecked=Visible
                            @error('status')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary float-end" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection
