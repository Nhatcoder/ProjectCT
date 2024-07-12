<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryProductController;

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



// Route::get('/admin/index', [IndexController::class, 'index'])->name('admin.index');
Route::get('/', [IndexController::class, 'index'])->name('admin.index');

Route::get('/admin/user', [UserController::class, 'listUser'])->name('admin.user');
Route::get('/admin/user-edit/{id}', [UserController::class, 'editUser'])->name('admin.user.edit');
Route::put('/admin/user-update/{id}', [UserController::class, 'updateUser'])->name('admin.user.update');

Route::resource('/admin/category', CategoryController::class);
Route::post('/category-store', [CategoryController::class, 'storeCategory'])->name('admin.category.store');
Route::post('/category-delete', [CategoryController::class, 'deleteCategory'])->name('admin.category.delete');



Route::post('/category-product-delete', [CategoryProductController::class, 'deleteCategoryProduct'])->name('deleteCategoryProduct');
Route::resource('/admin/category-product', CategoryProductController::class);







