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
            <li class="{{ request()->routeIs('product.index') ? 'active' : '' }}">
                <a href="{{ route('product.index') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <h5>List of Products</h5>
                </a>
            </li>
            <li class="{{ request()->routeIs('product.create') ? 'active' : '' }}">
                <a href="{{ route('product.create') }}">
                    <i class="now-ui-icons ui-1_simple-add"></i>
                    <h5>Add Products</h5>
                </a>
            </li>
            <li class="{{ request()->routeIs('category.index') ? 'active' : '' }}">
                <a href="{{ route('category.index') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <h5>List of Categories</h5>
                </a>
            </li>
            <li class="{{ request()->routeIs('category.create') ? 'active' : '' }}">
                <a href="{{ route('category.create') }}">
                    <i class="now-ui-icons ui-1_simple-add"></i>
                    <h5>Add Categories</h5>
                </a>
            </li>
            <li class="{{ request()->routeIs('roles.index') ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <h5>User Roles</h5>
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