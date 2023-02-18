@extends('layouts.app')

@section('title')
{{ $product->name }}
@endsection

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4" id="category">{{ $product->name }}</h4>
            </div>
            <livewire:frontend.product.view :category="$category" :product="$product" :productsRelate="$productsRelate"/>


        </div>
    </div>
</div>


@endsection
