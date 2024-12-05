@extends('admin.layout')
@section('title','Products')
@section('content')
<Div class="mt-5 container">

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Tạo sản phẩm</h1>
            
        </div>
      
        <div class="card-body">
      
    <form method="POST" action="" enctype="multipart/form-data">
      <!-- CSRF Token -->
  @csrf

      <!-- Name -->
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" >
      </div>
      @error('name')
      <div class="text-danger">{{ $message }}</div>
    @enderror

      <!-- Description -->
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4">{{old('description')}} </textarea>
      </div>
      @error('description')
      <div class="text-danger">{{ $message }}</div>
    @enderror

      <!-- Price -->
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" step="0.01"  value="{{old('price')}}" >
      </div>
      @error('price')
      <div class="text-danger">{{ $message }}</div>
    @enderror

      <!-- Stock -->
      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="0" value="{{old('stock')}}" >
      </div>
      @error('stock')
      <div class="text-danger">{{ $message }}</div>
    @enderror

      <!-- Category -->
      <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" id="category_id" name="category_id" >
          <option value="" disabled selected>Select Category</option>
          <!-- Categories options -->
           @foreach ($cate as $key )
           <option value="{{$key->id}}"> {{$key->name}}</option>
           @endforeach
        
        </select>
        @error('category_id')
      <div class="text-danger">{{ $message }}</div>
    @enderror
      </div>


      <!-- Image -->
      <div class="mb-3">
        <label for="image_url" class="form-label">Product Image</label>
        <input type="file" class="form-control" id="image_url" name="image_url">
        @error('image_url')
      <div class="text-danger">{{ $message }}</div>
    @enderror
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Save Product</button>
    </form>
        </div>
    </div>

</Div>

@endsection