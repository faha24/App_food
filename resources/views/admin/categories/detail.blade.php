@extends('admin.layout')
@section('title','Products')
@section('content')
<Div class="mt-5 container">

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Trang Danh chi tiết Sản phẩm</h1>
        </div>

        <div class="card-body">
        <p><strong>tên :</strong> {{ $category->name ?? 'Không có mô tả' }}</p>
        <p><strong>Mô tả:</strong> {{ $category->description ?? 'Không có mô tả' }}</p>
            
           
            
        </div>
        <div class="m-4">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
        
    </div>

</Div>

@endsection