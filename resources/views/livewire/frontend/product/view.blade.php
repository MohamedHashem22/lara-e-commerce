<div>
    <div class="row">
        <div class="py-3 py-md-2 bg-light">


            <div class="container">
                <div class="row">
                    <div class="col-md-5 mt-1">
                        <?php   $value=  $product->product_images[0]; ?>
                        <div class="bg-white border" wire:ignore ">

                            <div class="exzoom" id="exzoom">

                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul' >
                                        @foreach ($product->product_images as $image)
                                          <li style="width: 100% !important;"><img  style="width: 100% !important;" src="{{ asset("$image->image") }}" /></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->

                                <div class="exzoom_nav"></div>

                                <!-- Nav Buttons -->

                                <p class="exzoom_btn">

                                    <a href="javascript:void(0);" class="exzoom_prev_btn">
                                        < </a>

                                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>

                                </p>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-7 mt-1 ">
                        <div class="product-view">
                            <h4 class="product-name">
                                {{ $product->name }}
                            </h4>
                            <hr>
                            <p class="product-path">
                                Home / {{ $product->category->name }} / {{ $product->name }}
                            </p>
                            <div>
                                <span class="selling-price">${{ $product->selling_price }}</span>
                                <span class="original-price">${{ $product->original_price }}</span>
                            </div>
                            <div>
                                @if($product->quantity > 0)
                                <label class="btn-sm py-1 mt-2 text-white bg-success p-2">In Stock</label>
                                @else
                                <label class="btn-sm py-1 mt-2 text-white bg-danger p-2">Out Stock</label>
                                @endif
                            </div>
                            <div class="mt-3">
                                @if($product->quantity > 0)
                                <div class="input-group">
                                    <button wire:click="decrement" type="button" class="btn btn1"><i
                                            class="fa fa-minus"></i></button>
                                    <input type="text" wire:model="count" value="{{ $this->count }}" readonly
                                        class="input-quantity" />
                                    <button wire:click="increment" type="button" class="btn btn1"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                                @else
                                @endif
                            </div>
                            <div class="mt-3">
                                <button type="button" wire:click="addtoCart({{ $product->id }})" class="btn btn1">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </button>
                                <button type="button" wire:click="addtoWishlist({{ $product->id }})" class="btn btn1">
                                    <i class="fa fa-heart"></i> Add To Wishlist </button>
                            </div>
                            <div class="mt-3">
                                <h4 class="mb-1" style="font-size: 22px ;font-weight:bold;">Small Description</h4>
                                <p>
                                    {!! $product->small_description !!}
                                </p>
                                <br>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4 style="font-size: 22px ;font-weight:bold;">Description</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    {!! $product->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="py-3 py-md-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 style="font-size: 20px; font-weight:bold;">Related Product</h3>
                    <div class="underline" style="margin-left: 0px;"></div>
                </div>

                @forelse ( $productsRelate as $productRelated )
                 @if($productRelated->id != $product->id)
                    <div class="col-md-3">
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">{{ $productRelated->quantity > '0' ? 'New' : 'Out Stock'
                                                }}</label>

                                            <?php   $value=  $productRelated->product_images[0]; ?>

                                            <img style=" height:300px !important;" src="{{ asset("$value->image") }}" alt="{{ $product->category->name }}">
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $product->brand?? "No Brand" }}</p>
                                            <h5 class="product-name">
                                                <a href="{{ url('/collections/'.$productRelated->category->slug.'/'.$productRelated->slug) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $productRelated->original_price }}</span>
                                                <span class="original-price">${{ $productRelated->selling_price }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                    </div>
                    @endif
                @empty
                    <div class="alert alert-primary">No Product Related </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
$(function(){

    $("#exzoom").exzoom({


      "navWidth": 60,
      "navHeight": 60,
      "navItemNum": 5,
      "navItemMargin": 7,
      "navBorder": 1,


      "autoPlay": false,


      "autoPlayTimeout": 2000

    });

  });
</script>
@endpush
