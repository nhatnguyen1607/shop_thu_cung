<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{
    AdminController, BannerController, ProductController, DanhmucController, OrderController, MemberController 
};
use App\Http\Controllers\{
    HomeController,
    AccountController,
    AuthController,
    OrdersController,
    OrderViewController,
    CartController,
    ForgotPasswordController, 
    ResetPasswordController,
    EvaluateController
};

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and assigned to the
| "web" middleware group. Make something great!
*/

// Frontend Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/sanpham/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/thucung', [HomeController::class, 'thucung']);
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/viewAll', [HomeController::class, 'viewAll'])->name('viewAll');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/profile',[AccountController::class, 'index'])->name('profile');
Route::put('/profile',[AccountController::class, 'update'])->name('profile.update');
// Cart Routes
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
    Route::patch('update', [CartController::class, 'update'])->name('update_cart');
    Route::delete('remove', [CartController::class, 'remove'])->name('remove_from_cart');
    Route::match(['get', 'post'], 'checkoutfromcart', [CartController::class, 'checkoutfromcart'])->name('checkoutfromcart');
    Route::match(['get', 'post'], 'order_from_cart', [CartController::class, 'orderfromcart'])->name('order_from_cart');
    Route::post('vnpayfromcart', [CartController::class, 'vnpayfromcart'])->name('vnpayfromcart');
    Route::get('thongbaodathang', [CartController::class, 'thongbaodathang'])->name('thongbaodathang');
});
Route::get('order/{id}', [OrdersController::class, 'order'])->name('order');
Route::match(['get', 'post'], 'checkout', [OrdersController::class, 'checkout'])->name('checkout');
Route::post('vnpay', [OrdersController::class, 'vnpay'])->name('vnpay');
// Order Routes
Route::prefix('donhang')->group(function () {
    Route::get('/', [OrderViewController::class, 'donhang'])->name('donhang');
    Route::get('xemDonHang/{id}', [OrderViewController::class, 'xemDonHang'])->name('donhang.xemdonhang');
    Route::post('donhang/huy/{id}', [OrdersController::class, 'huyDonHang'])->name('donhang.huy');
    Route::post('donhang/nhanhang/{id}', [OrdersController::class, 'nhanHang'])->name('donhang.nhanhang');
    Route::get('danhgia/{id}', [EvaluateController::class, 'create'])->name('donhang.danhgia');
    Route::post('luudanhgia', [EvaluateController::class, 'store'])->name('danhgia.store');

});

// Authentication Routes
Route::prefix('/')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'loginPost']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerPost'])->name('register');
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');


    // Password Reset Routes
    Route::get('reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Admin Routes
Route::prefix('/')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/signinDashboard', [AdminController::class, 'signin_dashboard']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('p', [AdminController::class, 'admin_logout'])->name('admin_logout');
});
Route::prefix('admin')->group(function () {
    // Product Routes
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('search', [AdminController::class, 'search'])->name('adminSearch');
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/', [ProductController::class, 'store'])->name('product.store');
        Route::get('edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('update/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    });

    Route::prefix('banner')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('banner.index');
        Route::get('create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/', [BannerController::class, 'store'])->name('banner.store');
        Route::get('edit/{banner}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::put('update/{banner}', [BannerController::class, 'update'])->name('banner.update');
        Route::delete('{banner}/delete', [BannerController::class, 'delete'])->name('banner.delete');
    });
    
    // Danh Muc Routes
    Route::prefix('danhmuc')->group(function () {
        Route::get('/', [DanhmucController::class, 'index'])->name('danhmuc.index');
        Route::get('create', [DanhmucController::class, 'create'])->name('danhmuc.create');
        Route::post('/', [DanhmucController::class, 'store'])->name('danhmuc.store');
        Route::get('edit/{danhmuc}', [DanhmucController::class, 'edit'])->name('danhmuc.edit');
        Route::put('update/{danhmuc}', [DanhmucController::class, 'update'])->name('danhmuc.update');
        Route::delete('{danhmuc}/destroy', [DanhmucController::class, 'destroy'])->name('danhmuc.destroy');
    });

    // Order Management Routes
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('edit/{orders}', [OrderController::class, 'edit'])->name('orders.edit');
        Route::put('update/{orders}', [OrderController::class, 'update'])->name('orders.update');
    });

    // Member Management Routes
    Route::prefix('thanhvien')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('admin.thanhvien.index');
        Route::post('lock/{id}', [MemberController::class, 'lock'])->name('admin.thanhvien.lock');
        Route::post('unlock/{id}', [MemberController::class, 'unlock'])->name('admin.thanhvien.unlock');
    });
});
