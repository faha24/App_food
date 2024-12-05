@extends('layout.main')
@section('title','Detail')
@section('content')
<div class="container">
    <h1>Giỏ hàng</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (!empty($cart))
        <table class="table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['price'], 0, ',', '.') }} đ</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                            </form>
                        </td>
                        <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} đ</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Làm trống giỏ hàng</button>
            </form>
            <a href="{{route('checkout')}}" class="btn btn-success">Thanh toán</a>
        </div>
    @else
        <p>Giỏ hàng của bạn đang trống.</p>
    @endif
</div>
@endsection
