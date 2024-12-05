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

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Lưu danh mục</button>
    </form>
        </div>
    </div>

</Div>

@endsection