@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <!-- Tổng số sản phẩm -->
        <div class="col-md-4 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title text-primary">Tổng số sản phẩm</h5>
                    <p class="display-4 text-dark">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>

        <!-- Tổng số sản phẩm theo danh mục -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title text-success">Số sản phẩm theo danh mục</h5>
                    <ul class="list-group">
                        @foreach($productsByCategory as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $category->name }}
                            <span class="badge bg-success">{{ $category->product_count }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tổng số hàng đã bán -->
        <div class="col-md-4 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title text-danger">Tổng số hàng đã bán</h5>
                    <p class="display-4 text-dark">{{ $totalSold ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Thêm các thông tin khác nếu cần -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Thống kê khác</h5>
                    <p class="text-muted">Bạn có thể thêm biểu đồ hoặc thông tin khác tại đây.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
