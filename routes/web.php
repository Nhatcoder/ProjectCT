<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;

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



Route::get('/admin/index', [AdminIndexController::class, 'index'])->name('admin.index');

Route::get('/admin/user', [UserController::class, 'listUser'])->name('admin.user');
Route::get('/admin/user-edit/{id}', [UserController::class, 'editUser'])->name('admin.user.edit');
Route::put('/admin/user-update/{id}', [UserController::class, 'updateUser'])->name('admin.user.update');

Route::resource('/admin/category', CategoryController::class);
Route::post('/category-store', [CategoryController::class, 'storeCategory'])->name('admin.category.store');
Route::post('/category-delete', [CategoryController::class, 'deleteCategory'])->name('admin.category.delete');

Route::resource('/admin/product', ProductController::class);
Route::post('admin/product-delete', [ProductController::class, 'deleteProduct'])->name('admin.product.delete');


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/product-detail/{id}', [IndexController::class, 'productDetail'])->name('product.detail');

Route::post('/order', [OrderController::class, 'order'])->name('order');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/check-login', [AuthController::class, 'checkLogin'])->name('check.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');








