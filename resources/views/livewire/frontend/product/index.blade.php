<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @foreach ($category->brands as $brand)
                    <label calss="d-block">
                        <input type="checkbox" class="mr-2" wire:model="brandInputs" value="{{ $brand->name }}" />{{ $brand->name }}
                    </label>
                    <br>
                    @endforeach

                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">

                    <label calss="d-block">
                        <input type="radio" class="mr-2" wire:model="priceInputs" value="high-to-low" />High To Low
                    </label>
                    <br>
                    <label calss="d-block">
                        <input type="radio" class="mr-2" wire:model="priceInputs" value="low-to-high" name="priceSort" />Low To High
                    </label>
                </div>
            </div>

        </div>
        <div class="col-md-9">

            <div class="row">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

                @if (session()->has('info'))
                <div class="alert alert-dark ">
                    {{ session('info') }}
                </div>
                @endif

                @if (session()->has('warn'))
                <div class="alert alert-danger ">
                    {{ session('warn') }}
                </div>
                @endif

                @forelse ($products as $product )
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">{{ $product->quantity > '0' ? 'In Stock' : 'Out Stock'
                                }}</label>

                            <?php   $value=  $product->product_images[0]; ?>

                            <img style="height: 300px !important" src="{{ asset("$value->image") }}" alt="{{ $product->category->name }}">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $product->brand?? "NO Brand" }}</p>
                            <h5 class="product-name">
                                <a href="{{ url('/collections/'.$category->slug.'/'.$product->slug) }}">
                                    {{ $product->name }}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">${{ $product->original_price }}</span>
                                <span class="original-price">${{ $product->selling_price }}</span>
                            </div>
                            <div class="mt-2">
                                <button wire:click="addtoCart({{ $product->id }})" type="button" class="btn btn1">Add To Cart</button>
                                <button  wire:click="addToWishList({{ $product->id }})" type="button" class="btn btn1"> <i class="fa fa-heart"></i> </button>
                                <a href="{{ url('/collections/'.$category->slug.'/'.$product->slug) }}" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                <h1> No Product In This Category {{ $category->name }} </h1>
                @endforelse
            </div>

        </div>
    </div>
</div>
