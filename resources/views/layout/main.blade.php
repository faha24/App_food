<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @include('layout.css')

</head>

<body>
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

  <nav class="navbar navbar-expand-lg mb-4" style="background-color: #87CEFA;">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Trang chủ</a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="d-flex" class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('cart.index')}}"> Giỏ Hàng </a>
          </li>

        </ul>
        @if (!Auth::check())
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('register')}}"> Đăng ký </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
          </li>

        </ul>

        @endif
        @auth
   
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/profile"> {{ Auth::user()->name }} </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Đăng xuất</a>
          </li>

        </ul>
        @endauth
      </div>
    </div>
  </nav>

  <div class="row m-0">
  @if (isset($cate))
    <div class="col-2 ">
   
     
      <div class="card mt-5">
        <div class=" h3 card-header">
          Loại Đồ Ăn
        </div>
        <ul class=" list-group list-group-flush">

          @foreach ($cate as $key )
          <li class="list-group-item"><a href="{{route('list',$key->id)}}" class="h6 text-decoration-none">{{$key -> name}}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="card mt-3">
  <div class="card-body">
  <form class="d-flex" action="{{route('search')}}" method="post" role="search">
    @csrf
        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
</div>
     
     
    

    </div>
     @endif
    <div @if(isset($cate)) class="col-10 " @endif >

    
      @yield('content')
    </div>
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