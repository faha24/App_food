@extends('admin.layout')
@section('title','Products')
@section('content')
<Div class="mt-5 container">

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Trang Danh chi tiết Sản phẩm</h1>
        </div>

        <div class="card-body">
        <p><strong>tên :</strong> {{ $product->name ?? 'Không có mô tả' }}</p>
        <p><strong>Mô tả:</strong> {{ $product->description ?? 'Không có mô tả' }}</p>
            <p><strong>Giá:</strong> {{ number_format($product->price, 2) }} VNĐ</p>
            <p><strong>Tồn kho:</strong> {{ $product->stock }}</p>
            <p><strong>Danh mục:</strong> {{ $product->category->name ?? 'Không rõ' }}</p>
            <p><strong>Ngày tạo:</strong> {{ $product->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Ngày cập nhật:</strong> {{ $product->updated_at->format('d/m/Y H:i') }}</p>
            @if($product->trashed())
                <p class="text-danger"><strong>Trạng thái:</strong> Đã bị xóa</p>
            @else
                <p class="text-success"><strong>Trạng thái:</strong> Đang hoạt động</p>
            @endif
            @if($product->image_url)
                <p><strong>Hình ảnh:</strong></p>
                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 300px;">
            @else
                <p><strong>Hình ảnh:</strong> Không có hình ảnh</p>
            @endif
            
        </div>
        <div class="m-4">
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
        
    </div>

</Div>

@endsection