<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('client.cart', compact('cart'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request)
    {
        $product = $request->only('id', 'name', 'price', 'quantity');
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã có trong giỏ
        if (isset($cart[$product['id']])) {
            $cart[$product['id']]['quantity'] += $product['quantity'];
        } else {
            $cart[$product['id']] = $product;
        }

        session()->put('cart', $cart);
        return back()->with('message', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    // Cập nhật số lượng sản phẩm
    public function update(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('message', 'Cập nhật giỏ hàng thành công.');
    }

    // Xóa một sản phẩm
    public function remove(Request $request)
    {
        $id = $request->input('id');

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('message', 'Xóa sản phẩm thành công.');
    }

    // Xóa toàn bộ giỏ hàng
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('message', 'Giỏ hàng đã được làm trống.');
    }
}
