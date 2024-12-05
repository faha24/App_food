@extends('layout.main')
@section('title','Detail')
@section('content')

<div class="container">
        <h2 class="mt-5">Thanh Toán</h2>
        
        <div class="row">
            <!-- Cột bên trái: Giỏ hàng -->
            <div class="col-md-6">
                <div class="cart-details">
                    <h4>Giỏ Hàng</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart as $id => $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>{{ number_format($item['price'], 2) }} VND</td>
                                    <td>{{ number_format($item['quantity'] * $item['price'], 2) }} VND</td>
                                </tr>
                                @php
                                    $total += $item['quantity'] * $item['price'];
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <h4>Tổng cộng: {{ number_format($total, 2) }} VND</h4>
                </div>
            </div>

            <!-- Cột bên phải: Thông tin thanh toán -->
            <div class="col-md-6">
                <h4>Thông tin thanh toán</h4>
                <form method="POST" action="">
                    @csrf
                    <div class="form-group">
                        <label for="customer_name">Họ và tên</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="customer_email">Email</label>
                        <input type="email" class="form-control" id="customer_email" name="customer_email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Địa chỉ giao hàng</label>
                        <textarea class="form-control" id="address" name="address" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Thanh Toán</button>
                </form>
            </div>
        </div>
    </div>
@endsection
