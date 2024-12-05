@extends('admin.layout')
@section('title','order')

@section('content')
<div class="container mt-4">
    <h1>Chi tiết đơn hàng #{{ $order->id }}</h1>
    <p><strong>Khách hàng:</strong> {{ $order->customer_name }}</p>
    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
    <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
    <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 2) }} VND</p>
    <p><strong>Trạng thái:</strong> {{ ucfirst($order->status) }}</p>

    <h3>Danh sách sản phẩm</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }} VND</td>
                    <td>{{ number_format($item->price * $item->quantity, 2) }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
