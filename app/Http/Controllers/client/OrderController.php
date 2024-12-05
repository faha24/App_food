<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showCheckOutForm()
    {
        $cart = session()->get('cart', []);
        return view('client.checkout', compact('cart'));
    }
    public function success($order)
    {
        $orderDetails = Order::findOrFail($order);
     
        // Trả về view "checkout.success"
        return view('client.checkoutsuccess', compact('orderDetails'));
    }
    public function processCheckout(Request $request)
    {
        // Validate thông tin thanh toán
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        // Lấy giỏ hàng từ session
        $cart = session()->get('cart');
        $totalAmount = 0;

        foreach ($cart as $item) {
            $totalAmount += $item['quantity'] * $item['price'];
        }

        // Tạo đơn hàng trong cơ sở dữ liệu
        $order = Order::create([
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'total_amount' => $totalAmount,
            // Trạng thái đơn hàng ban đầu
        ]);

        // Lưu các sản phẩm trong đơn hàng
        foreach ($cart as $productId => $item) {
            $order->items()->create([
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Xóa giỏ hàng khỏi session
        session()->forget('cart');

        // Điều hướng đến trang thành công với thông tin đơn hàng
        return redirect()->route('checkout.success', ['order' => $order->id]);
    }
}
