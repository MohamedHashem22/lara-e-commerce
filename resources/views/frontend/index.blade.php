@extends('layouts.app')

@section('title','Home')

@section('content')


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
            <div class="carousel-item {{ $key==0 ? 'active' : ''}}">
                <img src="{{ asset("$slider->image") }}" class="d-block w-100 h-100" id="slider" alt="..." >

                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {!! $slider->title !!}
                        </h1>
                        <p>
                            {{ $slider->description }}
                        </p>
                        <div>
                            <a href="#" class="btn btn-slider">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <span style="font-size:21px; font-weight:700">Welcome To Lara of Web E-commerce</span>
                    <div class="underline text-center " style="margin-left: 40%;"></div>
                    <p class="mt-4">
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="font-size:21px; font-weight:700; color:crimson">Trending Products

                    </h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme trendingproject">

                        @foreach ( $trendingProduct as $product )
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">{{ $product->quantity > '0' ? 'New' : 'Out Stock'
                                            }}</label>

                                        <?php   $value=  $product->product_images[0]; ?>

                                        <img style=" height:300px !important; " src="{{ asset("$value->image") }}" alt="{{ $product->category->name }}">
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $product->brand ?? "No Brand" }}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">${{ $product->original_price }}</span>
                                            <span class="original-price">${{ $product->selling_price }}</span>
                                        </div>
                                        <div class="mt-2">
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" class="btn btn1"> View </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="font-size:21px; font-weight:700; color:crimson">New Arrival
                        <a href="{{ url('new-arrival') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme trendingproject">

                        @foreach ( $newarrival as $product )
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">{{ $product->quantity > '0' ? 'New' : 'Out Stock'
                                            }}</label>

                                        <?php   $value=  $product->product_images[0]; ?>

                                        <img style=" height:300px !important;" src="{{ asset("$value->image") }}" alt="{{ $product->category->name }}">
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $product->brand ?? "No Brand" }}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">${{ $product->original_price }}</span>
                                            <span class="original-price">${{ $product->selling_price }}</span>
                                        </div>
                                        <div class="mt-2">
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" class="btn btn1"> View </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="font-size:21px; font-weight:700; color:crimson; ">Featured Products
                        <a href="{{ url('/featured') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme trendingproject">

                        @foreach ( $featuredproduct as $product )
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">{{ $product->quantity > '0' ? 'New' : 'Out Stock'
                                            }}</label>

                                        <?php   $value=  $product->product_images[0]; ?>

                                        <img style=" height:300px !important; " src="{{ asset("$value->image") }}" alt="{{ $product->category->name }}">
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $product->brand ?? "No Brand" }}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">${{ $product->original_price }}</span>
                                            <span class="original-price">${{ $product->selling_price }}</span>
                                        </div>
                                        <div class="mt-2">
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" class="btn btn1"> View </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>



@endsection



@section('script')
<script>
$('.trendingproject').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})

</script>
@endsection
