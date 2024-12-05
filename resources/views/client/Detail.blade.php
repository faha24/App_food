@extends('layout.main')
@section('title','Detail')
@section('content')
<Div>
  <h1>Trang chi tiết </h1>
  <div class="card">
    <div class="card-body">
      <div class="container my-5">
        <div class="row">
          <!-- Hình ảnh Sản phẩm -->
          <div class="col-md-6">
            <img src="{{ $product->image_url ? Storage::url($product->image_url) :  Storage::url('avatars/default-avatar.jpg') }}" class="img-fluid" alt="Product Image">
          </div>

          <!-- Thông tin Sản phẩm -->
          <div class="col-md-6">
            <h2 class="mb-3">{{$product->name}}</h2>

            <h3 class="text-success mb-4">Giá: {{$product->price}}$</h3>

            <p class="mb-4">{{$product->description}}</p>

            <!-- Các Tùy Chọn -->

          


            <form action="{{route('cart.add')}}" method="post">
              @csrf
              <div class="d-flex align-items-center mb-4">
              <label for="quantity" class="me-2">Số lượng:</label>
              <input type="number" id="quantity" name="quantity" class="form-control w-25" value="1" min="1">
            </div>
              <input type="hidden" name="id" value="{{$product->id}}">
              <input type="hidden" name="name" value="{{$product->name}}">
              <input type="hidden" name="price" value="{{$product->price}}">
              
              <button type="submit" class="btn btn-primary btn-lg">Thêm vào giỏ</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</Div>
@endsection