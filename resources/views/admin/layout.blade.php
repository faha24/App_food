<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @include('layout.css')

</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="notificationModalLabel">Thông báo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{ session('message') }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar bg-body-tertiary ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Trang admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Trang admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('admin.dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('admin.product.index')}}">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.categories.index')}}">categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.user.index')}}">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.orders.index')}}">Orders</a>
            </li>
            @auth

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href=""> {{ Auth::user()->name }} </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Đăng xuất</a>
              </li>

            </ul>
            @endauth
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
  </nav>

  <div>
    @yield('content')
  </div>



</body>
@include('layout.js')
@if (session('message'))
<script>
  document.addEventListener('DOMContentLoaded', function() {

    var notificationModal = new bootstrap.Modal(document.getElementById('notificationModal'));
    notificationModal.show();

  });
</script>
@endif

</html>