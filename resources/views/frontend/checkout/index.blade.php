@extends('layouts.app')

@section('title','Checkout')


@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4" id="category">Check Out</h4>
            </div>

             <livewire:frontend.checkout.checkout-show />

        </div>
    </div>
</div>


@endsection
