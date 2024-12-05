<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $cate = Category::get();
        $products = Product::paginate(8);
        return view('client.home',compact('cate','products'));
    }
    public function detail($id){
        $cate = Category::get();
        $product = Product::find($id);

        return view('client.Detail',compact('cate','product'));
    }
    public function list($id){
        $cate = Category::get();
        $cate_1 = Category::find($id);
        $products = $cate_1->Product()->paginate(8);
        // $products->paginate(8);
        return view('client.list',compact('cate','products'));
    }
    public function search(Request $request){
        $cate = Category::get();
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        // Lấy từ khóa tìm kiếm
        $query = $request->input('query');

        // Tìm kiếm trong bảng posts
        $products = Product::where('name', 'LIKE', "%$query%")
            ->paginate(8);

        // Trả về view kèm kết quả
        return view('client.search',compact('cate','products'));
    }
    
    
}
