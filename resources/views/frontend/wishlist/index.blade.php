@extends('layouts.app')

@section('title','WishList')


@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4" id="category">My WishList</h4>
            </div>
             <livewire:frontend.wishlistshow  />


        </div>
    </div>
</div>


@endsection
