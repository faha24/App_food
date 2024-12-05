<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::latest('id')->paginate(10);

        return view('admin.product.list', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate = Category::all();
        return view('admin.product.create', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->except('image_url');
        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('images/products', 'public');
        }
        // Lưu sản phẩm
        Product::create($data);
        return redirect()->route('admin.product.index')->with('message', 'Sản phẩm đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::withTrashed()->findOrFail($id);

        // Truyền dữ liệu sản phẩm sang view
        return view('admin.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Lấy sản phẩm cần chỉnh sửa
        $cate = Category::all(); // Lấy danh sách danh mục
        return view('admin.product.edit', compact('product', 'cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate dữ liệu
        $validatedData = $request->except('image_url');
    
        // Xử lý upload file mới nếu có
        if ($request->hasFile('image_url')) {
            // Xóa file cũ nếu tồn tại
           
            // Lưu file mới
            $validatedData['image_url'] = $request->file('image_url')->store('images/products', 'public');
        }
    
        // Cập nhật dữ liệu sản phẩm
        $product->update($validatedData);
    
        return back()->with('message', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // Xóa mềm

        return redirect()->route('admin.product.index')->with('message', 'Sản phẩm đã được xóa!');
    }
    public function trash()
    {
        $trashedProducts = Product::onlyTrashed()->paginate(10);

        return view('admin.product.trash', compact('trashedProducts'));
    }
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id); // Tìm trong các bản ghi đã xóa
        $product->restore(); // Khôi phục

        return redirect()->route('admin.product.index')->with('message', 'Sản phẩm đã được khôi phục!');
    }
    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id); // Tìm trong các bản ghi đã xóa
        $product->forceDelete(); // Xóa vĩnh viễn

        return back()->with('message', 'Sản phẩm đã được xóa vĩnh viễn!');
    }
}
