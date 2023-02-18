<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <span class="brand-name">Funda Ecom</span>
                </div>
                <div class="col-md-5 my-auto">
                    <form role="search" action="{{ url('/search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="search" placeholder="Search your product" class="form-control" name="search" value="{{ Request::get('search') }}" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/cart') }}">
                                <i class="fa fa-shopping-cart"></i> Cart (<livewire:frontend.cart.cart-count :/>)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/wishlist') }}">
                                <?php use App\Models\Wishlist; ?>
                                <i class="fa fa-heart"></i> Wishlist ( {{ Auth::check()? WishList::where('user_id',Auth::user()->id)->count() : '0' }} )
                            </a>
                        </li>
                        @if (Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">


                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                            class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="{{ url('/orders') }}"><i class="fa fa-list"></i> My Orders</a></li>
                                <li><a class="dropdown-item" href="{{ url('/wishlist') }}"><i class="fa fa-heart"></i> My Wishlist</a></li>
                                <li><a class="dropdown-item" href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> My Cart</a>
                                </li>

                                <li>
                                    <a href="route('logout')" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"
                                        class="dropdown-item">
                                        <i class="fa fa-sign-out"></i> {{ __('Log Out') }}
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>





                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                        @endif


                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                Funda Ecom
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections') }}">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('new-arrival') }}">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('featured') }}">Featured Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('fashion') }}">Fashions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections/accessories') }}">Accessories</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
