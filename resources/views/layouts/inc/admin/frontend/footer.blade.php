<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">Lara E-Commerce</h4>
                    <div class="footer-underline"></div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industrys standard dummy text ever since the 1500s
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{ url('/aboutus') }}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{ url('/contact') }}" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="{{ url('/sitemaps') }}" class="text-white">Sitemaps</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="{{ url('new-arrival') }}" class="text-white">New Arrivals Products</a></div>
                    <div class="mb-2"><a href="{{ url('featured') }}" class="text-white">Featured Products</a></div>
                    <div class="mb-2"><a href="{{ url('cart') }}" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{ $site_settings->address }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $site_settings->phone1?? Phone }} - {{ $site_settings->phone2 }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i>  {{ $site_settings->email2 }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2022 - Mohamed Abdo - Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        @if($site_settings->facebook)
                        <a href="{{ $site_settings->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($site_settings->twiter)
                        <a href="{{ $site_settings->twiter }}"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($site_settings->insta)
                        <a href="{{ $site_settings->insta }}"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if($site_settings->youtube)
                        <a href="{{ $site_settings->youtube }}"><i class="fa fa-youtube"></i></a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
