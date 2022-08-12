<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\UserController;
use App\Models\category;
use App\Models\product;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->name('trangchu.')->group(function () {
    Route::get('/', [IndexController::class, 'trangchu']);
    Route::get('/chitietsanpham/{product_id}', [IndexController::class, 'detail_product']);
    Route::post('/cart_save', [IndexController::class, 'cart_save'])->name('cart_save');
});

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/', [productController::class, 'index'])->name('list'); //name: users.list
        Route::delete('/delete/{id_product}', [productController::class, 'delete'])->name('delete');
        Route::get('/search', [productController::class, 'search']);
        Route::get('/create', [productController::class, 'create'])->name('create');
        Route::post('/store', [productController::class, 'store'])->name('store');
        Route::get('/edit/{product}', [productController::class, 'edit'])->name('edit');
        Route::put('/update/{product}', [productController::class, 'update'])->name('update');
    });
    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/', [categoryController::class, 'index'])->name('list');
        Route::get('create', [categoryController::class, 'create'])->name('create');
        Route::delete('/delete/{id_category}', [categoryController::class, 'delete'])->name('delete');
    });
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('list');
        Route::delete('/delete/{id_category}', [categoryController::class, 'delete'])->name('delete');
    });
});
//login chỉ được vào khi người dùng chưa đăng nhập
Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
});
Route::middleware('auth')->get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/getsignup', [AuthController::class, 'getSignup'])->name('.getSignup');
Route::get('/signup', [AuthController::class, 'postSignup'])->name('.postSignup');