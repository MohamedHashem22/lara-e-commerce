@extends('layouts.admin')

@section('content')
<div class="row">
    @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="col-md-12 grid-margin">
        <form action="{{ url('/admin/setting') }}" method="POST">
            @csrf
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Website Name</label>
                            <input type="text" name="website_name" class="form-control" value="{{ $setting->website_name ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Website Url</label>
                            <input type="text" name="website_url" class="form-control" value="{{ $setting->website_url?? '' }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Page Title</label>
                            <input type="text" name="page_title" class="form-control" value="{{ $setting->page_title ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Meta Keyword</label>
                            <input type="text" name="meta_keywords" class="form-control" value="{{ $setting->meta_keywords ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Meta Description</label>
                            <input type="text" name="meta_description" class="form-control" value="{{ $setting->meta_description ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website-Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control" rows="3">{{ $setting->address ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone 1</label>
                            <input name="phone1" class="form-control" value="{{ $setting->phone1 ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone 2</label>
                            <input name="phone2" class="form-control" value="{{ $setting->phone2 ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email ID 1</label>
                            <input name="email1" class="form-control" value="{{ $setting->email1 ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email ID 2</label>
                            <input name="email2" class="form-control" value="{{ $setting->email2 ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website-Socail Media</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Face Book (optional)</label>
                            <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Twitter (optional)</label>
                            <input type="text" name="twiter" class="form-control" value="{{ $setting->twiter ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Instgram (optional)</label>
                            <input type="text" name="inst" class="form-control" value="{{ $setting->inst ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>YouTube (optional)</label>
                            <input type="text" name="youtube" class="form-control" value="{{ $setting->youtube ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary text-white">Save Setting</button>
            </div>
        </form>
    </div>
</div>

@endsection
