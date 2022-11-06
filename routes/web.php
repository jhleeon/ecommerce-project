<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ==========Frontend Route==============
Route::get('/',[FrontEndController::class,'index'])->name('index');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// ===============Backend Route===================

// Admin Auth
Route::get('/admin/home', [AdminController::class, 'dashboard'])->name('admin.home');
Route::get('/admin/login', [LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class,'login']);
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

// Category
Route::get('admin/categories', [CategoryController::class, 'index'])->name('category.index');
Route::post('admin/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('admin/categories/edit/{cat_id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('admin/categories/update/{cat_id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('admin/categories/delete/{cat_id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('admin/categories/inactive/{cat_id}', [CategoryController::class, 'inactive'])->name('category.inactive');
Route::get('admin/categories/active/{cat_id}', [CategoryController::class, 'active'])->name('category.active');
