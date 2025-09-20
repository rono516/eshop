<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo {{Request::is('dashboard')? 'active': ''}}"><a href="{{url('/')}}" class="simple-text logo-normal">
        Mega E-shop
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard')? 'active':'' }}"  >
          <a class="nav-link" href="{{ route('filament.superadmin.pages.dashboard') }}">
{{--            <i class="material-icons">dashboard</i>--}}
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('categories')? 'active':'' }}">
          <a class="nav-link" href="{{ route('admin.categories') }}">
            <p>Categories</p>
          </a>
        </li>
        {{-- <li class="nav-item {{ Request::is('add-category')? 'active':'' }}">
          <a class="nav-link" href="{{url ('add-category')}}">
            <p>Add Category</p>
          </a>
        </li> --}}
        <li class="nav-item {{ Request::is('products')? 'active':'' }}">
          <a class="nav-link" href="{{ route('admin.products') }}">
            <p>Products</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('products')? 'active':'' }}">
          <a class="nav-link" href="{{ route('admin.orders') }}">
            <p>Orders</p>
          </a>
        </li>
        {{-- <li class="nav-item {{ Request::is('add-products')? 'active':'' }}">
          <a class="nav-link" href="{{url ('add-products')}}">
            <p>Add Products</p>
          </a>
        </li> --}}

          {{-- <li class="nav-item {{ Request::is('manage_users')? 'active':'' }}">
              <a class="nav-link" href="{{url ('manage_users')}}">
                  <p>Manage Users</p>
              </a>
          </li> --}}

      </ul>
    </div>
  </div>
