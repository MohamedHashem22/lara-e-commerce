@extends('layouts.app')
@section('title','Fashion')

@section('content')

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 style="font-size:21px; font-weight:700; color:crimson">Fashion</h4>
                <div class="underline" style="margin-left: 0%;"></div>
            </div>
            @foreach ( $productsFashion as $product )
                <div class="col-md-3">
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">{{ $product->quantity > '0' ? 'New' : 'Out Stock'
                                            }}</label>

                                        <?php   $value=  $product->product_images[0]; ?>

                                        <img style=" height:300px !important;" src="{{ asset("$value->image") }}" alt="{{ $product->category->name }}">
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $product->brand?? "No Brand" }}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">${{ $product->original_price }}</span>
                                            <span class="original-price">${{ $product->selling_price }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                </div>
            @endforeach
            {{ $productsFashion->links(); }}
            <div class="text-center">
                <a href="{{ url('/collections') }}" class="btn btn-warning">View More</a>
            </div>
        </div>
    </div>
</div>


@endsection
