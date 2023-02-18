@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Product
                    <a href="{{ url('admin/product') }}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif
              <form action="{{ url('admin/product/store') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">
                            Home
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane"
                            aria-selected="false">
                            SEO Tags
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane"
                            aria-selected="false">
                            Details
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                            data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane"
                            aria-selected="false">
                            Image
                        </button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade border p-3 show active " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        <br>
                        <div class="mb-3">
                            <label>Category</label>
                            <br>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category )
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>{ Product Name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Enter Product Name"/ >
                        </div>
                        <div class="mb-3">
                            <label>{ Product Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Enter Product Slug" / >
                        </div>
                        <div class="mb-3">
                            <label>Brand Name</label>
                            <br>
                            <select name="brand" class="form-control">
                                <option value="">-- Select Brand</option>
                                @foreach ($Brands as $Brand )
                                <option value="{{$Brand->name}}">{{$Brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>{ Small Description (500 words)</label>
                            <textarea name="small_description" rows="4" class="form-control" placeholder="Enter Small Description For Product"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>{ Description</label>
                                <textarea name="description" rows="4" class="form-control" placeholder="Enter Description For Product"></textarea>
                        </div>
                    </div>


                    <div class="tab-pane fade border p-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input name="meta_title" type="text" class="form-control" placeholder="Enter Meta Title">
                        </div>
                        <div class="mb-3">
                            <label>{ Meta Keywords</label>
                                <textarea name="meta_keyword" rows="4" class="form-control" placeholder="Enter Meta Keyword"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>{ Meta Description</label>
                                <textarea name="meta_description" rows="4" class="form-control" placeholder="Enter Meta Description"></textarea>
                        </div>
                    </div>


                    <div class="tab-pane fade border p-3" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <div class="mb-3">
                            <label>Original Price</label>
                            <input name="original_price" type="number" class="form-control" placeholder="Enter Original Price">
                        </div>
                        <div class="mb-3">
                            <label>Selling Price</label>
                            <input name="selling_price" type="number" class="form-control" placeholder="Enter Selling Price">
                        </div>
                        <div class="mb-3">
                            <label>Quantity</label>
                            <input name="quantity" type="number" class="form-control" placeholder="Enter Quantity">
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <input name="status" type="checkbox" >
                        </div>
                        <div class="mb-3">
                            <label>Trending</label>
                            <input name="trending" type="checkbox"  >
                        </div>
                        <div class="mb-3">
                            <label>Featured</label>
                            <input name="featured" type="checkbox"  >
                        </div>
                    </div>

                    <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                      <div class="mb-3">
                        <label>Upload Product Image</label>
                        <input type="file" name="image[]" class="form-control" multiple />
                      </div>
                    </div>

                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
            </div>


        </div>

    </div>
</div>

@endsection
