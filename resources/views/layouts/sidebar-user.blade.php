<div class="sidebar" data-color="green"><!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
    <div class="logo">
        <img src="{{ url('images/csb-logo-final.png') }}" alt="csb-logo" width="60">
        <img src="{{ url('images/unboxed.png') }}" alt="unboxed-logo" width="150">
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">  
                <a href="{{ route('home') }}">
                    <i class="now-ui-icons business_bank"></i>
                    <h5>Home</h5>
                </a>
            </li>
            <li class="{{ request()->routeIs('shop.shop') ? 'active' : '' }}">
                <a href="{{ route('shop.shop') }}">
                    <i class="now-ui-icons shopping_shop"></i>
                    <h5>Shop</h5>
                </a>
            </li>
            <li class="{{ request()->routeIs('cart.index') ? 'active' : '' }}">
                <a href="{{ route('cart.index') }}">
                    <i class="now-ui-icons shopping_cart-simple"></i>
                    <h5>Cart <span class="badge badge-pill badge-warning">{{Cart::count()}}</span></h5>
                </a>
            </li>
            <li class="{{ request()->routeIs('shop.wishlist') ? 'active' : '' }}">
                <a href="{{ route('shop.wishlist') }}">
                    <i class="now-ui-icons files_paper"></i>
                    <h5>Wishlist <span class="badge badge-pill badge-warning">{{App\Wishlist::count()}}</span></h5>
                </a>
            </li>
            <li class="active-pro {{ request()->routeIs('contact') ? 'active' : '' }}">
                <a href="{{ route('contact') }}">
                  <i class="now-ui-icons location_world"></i>
                  <p>Contact Us</p>
                </a>
            </li>
        </ul>
    </div>
</div>