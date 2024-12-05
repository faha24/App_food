<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10); // Lấy danh sách đơn hàng mới nhất, phân trang
        return view('admin.order.index', compact('orders'));
    }

    // Hiển thị chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('admin.orders.index')->with('message', 'Cập nhật trạng thái thành công!');
    }

    // Xóa đơn hàng
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('message', 'Xóa đơn hàng thành công!');
    }
}
