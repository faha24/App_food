@extends('layout.main')
@section('title','Detail')
@section('content')

<div class="container text-center mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="text-success mb-4">🎉 Thanh toán thành công! 🎉</h1>
                <p>Cảm ơn bạn đã mua hàng tại cửa hàng của chúng tôi.</p>
                <p>Mã đơn hàng của bạn: <strong>{{ $orderDetails ->id }}</strong></p>
                <p>Chúng tôi sẽ xử lý đơn hàng và giao hàng trong thời gian sớm nhất.</p>
                <a href="/" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
            </div>
        </div>
    </div>
@endsection
