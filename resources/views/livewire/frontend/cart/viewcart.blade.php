<div>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($carts as $cart)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{ url('/collections/'.$cart->product->category->slug.'/'.$cart->product->slug) }}">
                                        <label class="product-name">
                                            <img src="{{ asset($cart->product->product_images[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                            {{ $cart->product->name }}
                                        </label>
                                        <label></label>
                                    </a>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">${{ $cart->product->selling_price }} </label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">

                                            <input type="text" value="{{ $cart->quantity }}" class="input-quantity" />

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">${{ $cart->product->selling_price * $cart->quantity }} </label>
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button  wire:click="deletefromcart({{ $cart->id }})" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            No Product In Your Carts
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h4 style="font-size: 22px; font-weight:bold">
                        Get The Best Deals & Offers <a href="{{ url('/collections') }}" style="color:blue; text-decoration:underline;">Shop Now</a>
                    </h4>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="shadow-sm bg-white p-3">
                        <h4 style="font-size: 22px; font-weight:bold" >Total:
                            <span class="float-end">${{ $totalprice }}</span>
                        </h4>
                        <br>
                        <hr>
                        <a class="btn btn-warning mt-3 w-100 " style="height:40px;" href="{{ url('/checkout') }}">CheckOut</a>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>
