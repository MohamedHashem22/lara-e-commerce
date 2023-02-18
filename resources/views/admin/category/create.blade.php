@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Category
                    <a href="{{ url('admin/category') }}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" />
                            @error('name')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" />
                            @error('slug')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" />
                            @error('description')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" />
                            @error('image')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status"  />
                            @error('status')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                            <div class="col-md-12 mb-3">
                                <h3>SEO tags</h3>
                            </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Title</label><br>
                            <input type="text" name="meta_title" class="form-control" />
                            @error('meta_title')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Keyword</label><br>
                            <textarea name="meta_keyword" class="form-control" rows="3"></textarea>
                            @error('meta_danger')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label><br>
                            <textarea name="meta_description" class="form-control" rows="3"></textarea>
                            @error('meta_description')<small class="text-danger"> {{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary float-end" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection
