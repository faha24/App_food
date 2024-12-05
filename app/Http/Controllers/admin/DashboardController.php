<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Tổng số sản phẩm
        $totalProducts = Product::count();

        // Tổng số sản phẩm của mỗi danh mục
        $productsByCategory = Category::withCount('Product')->get();

        // Tổng số hàng được bán
        $totalSold = OrderItem::select(DB::raw('SUM(quantity) as total_sold'))
    ->first()
    ->total_sold ?? 0;

        // Dữ liệu truyền sang view
        return view('admin.dashboard', compact('totalProducts', 'productsByCategory', 'totalSold'));
    }
}
