<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Models\Category;
use App\Models\Product;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('product')->paginate(10);
        // dd($categories);
        return view('admin.categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriesRequest $request)
    {
        $data = $request->all();
       
        // Lưu sản phẩm
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('message', 'Sản phẩm đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        // Truyền dữ liệu sản phẩm sang view
        return view('admin.categories.detail', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cate = Category::findOrFail($id); // Lấy sản phẩm cần chỉnh sửa
    
        return view('admin.categories.edit', compact( 'cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriesRequest $request, $id)
    {
        $product = Category::findOrFail($id);

        // Validate dữ liệu
        $validatedData = $request->all();
    
        // Xử lý upload file mới nếu có
      
        // Cập nhật dữ liệu sản phẩm
        $product->update($validatedData);
    
        return back()->with('message', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete(); 

        return redirect()->route('admin.categories.index')->with('message', 'Sản phẩm đã được xóa!');
    }
}
