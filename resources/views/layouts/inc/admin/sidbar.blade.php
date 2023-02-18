<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/order') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-view-list menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/category/createc') }}">Add Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/category') }}">View Category</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#pr-basic" aria-expanded="false"
                aria-controls="pr-basic">
                <i class="mdi mdi-view-list menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>


            </a>
            <div class="collapse" id="pr-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/product/createp') }}">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/product') }}">View Product</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href={{ url('/admin/brands') }}>
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/slider') }}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/setting') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Setting</span>
            </a>
        </li>
    </ul>
</nav>
