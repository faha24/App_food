@extends('admin.layout')
@section('title','order')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Quản lý đơn hàng</h1>
  
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->customer_email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ number_format($order->total_amount, 2) }} VND</td>
                <td>
                    <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                            <option value="chuẩn bị" {{ $order->status === 'chuẩn bị' ? 'selected' : '' }}>Chuẩn bị</option>
                            <option value="bị hủy" {{ $order->status === 'bị hủy' ? 'selected' : '' }}>Bị hủy</option>
                            <option value="đang giao" {{ $order->status === 'đang giao' ? 'selected' : '' }}>Đang giao</option>
                            <option value="thành công" {{ $order->status === 'thành công' ? 'selected' : '' }}>Thành công</option>
                            <option value="thất bại" {{ $order->status === 'thất bại' ? 'selected' : '' }}>Thất bại</option>
                        </select>
                    </form>
                </td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary btn-sm">Xem</a>
                    <!-- <form action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
</div>
@endsection