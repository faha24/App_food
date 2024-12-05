<?php

use App\Http\Controllers\Authen\AuthenticateController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\client\UserController;
use App\Http\Middleware\CheckActive;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [AuthenticateController::class, 'loginForm'])->name('login');
Route::post('login', [AuthenticateController::class, 'login'])->name('loginUser');
Route::get('register', [AuthenticateController::class, 'registerForm'])->name('register');
Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');
Route::middleware(CheckActive::class)->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('Detail/{id}', [HomeController::class, 'detail'])->name('Detail');
    Route::get('list/{id}', [HomeController::class, 'list'])->name('list');
   
    Route::post('createUser', [AuthenticateController::class, 'register'])->name("createUser");
    Route::post('search', [HomeController::class, 'search'])->name("search");
    
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    
    Route::get('/checkOut', [OrderController::class, 'showCheckOutForm'])->name('checkout');
    Route::post('/checkOut', [OrderController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/checkoutsuccess/{order}', [OrderController::class, 'success'])->name('checkout.success');
    
});
Route::middleware('auth',CheckActive::class)->group(function () {
   
    Route::get('/profile', [UserController::class,'profile'])->name('profile');
    Route::get('/profile/update', [UserController::class,'edit'])->name('update.profile');
    Route::put('/profile/update', [UserController::class,'update'])->name('update.profile');
    Route::get('/profile/password', [UserController::class,'showChagePass'])->name('update.password');
    Route::put('/profile/password', [UserController::class,'updatePass'])->name('update.password');
});

Route::middleware(['auth', CheckAuth::class])->prefix('/admin')->group(function () {
    Route::prefix('product')->name('admin.product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index'); // Danh sách sản phẩm
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('show'); // Hiển thị chi tiết
        Route::get('/create', [ProductController::class, 'create'])->name('create'); // Form tạo mới
        Route::post('/create', [ProductController::class, 'store'])->name('store'); // Lưu sản phẩm mới
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy'); // Xóa mềm
        Route::get('/trash', [ProductController::class, 'trash'])->name('trash'); // Danh sách sản phẩm bị xóa mềm
        Route::put('/restore/{id}', [ProductController::class, 'restore'])->name('restore'); // Khôi phục
        Route::delete('/forceDelete/{id}', [ProductController::class, 'forceDelete'])->name('forceDelete'); // Xóa vĩnh viễn
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit'); // Form chỉnh sửa
        Route::put('/{id}/edit', [ProductController::class, 'update'])->name('update'); // Cập nhật sản phẩm
    });
    Route::prefix('categories')->name('admin.categories.')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('index'); // Danh sách sản phẩm
        Route::get('/show/{id}', [CategoriesController::class, 'show'])->name('show'); // Hiển thị chi tiết
        Route::get('/create', [CategoriesController::class, 'create'])->name('create'); // Form tạo mới
        Route::post('/create', [CategoriesController::class, 'store'])->name('store'); // Lưu sản phẩm mới
        Route::delete('/destroy/{id}', [CategoriesController::class, 'destroy'])->name('destroy'); // Xóa mềm
        Route::get('/{id}/edit', [CategoriesController::class, 'edit'])->name('edit'); // Form chỉnh sửa
        Route::put('/{id}/edit', [CategoriesController::class, 'update'])->name('update'); // Cập nhật sản phẩm
    });
    Route::prefix('user')->name('admin.user.')->group(function () {
        Route::get('/',[AdminUserController::class,'listUser'])->name('index');
        Route::get('/ban/{id}',[AdminUserController::class,'ban'])->name('ban');
        Route::get('/Unban/{id}',[AdminUserController::class,'unBan'])->name('unBan');
    });
    Route::prefix('order')->name('admin.orders.')->group(function () {
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('index');
        Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('show');
        Route::put('/orders/{id}/update-status', [AdminOrderController::class, 'updateStatus'])->name('update-status');
        // Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    });
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

});
