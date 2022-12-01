<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CuponController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WhislistController;
use Illuminate\Support\Facades\Route;


Auth::routes();

// ==========Frontend Route==============

//After Login Home Page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Index page
Route::get('/',[FrontEndController::class,'index'])->name('index');


//product details page
Route::get('/product-details/{product_id}',[FrontEndController::class,'productDetails'])->name('productdetails');


//wishlist controller
Route::get('/wishlists/{product_id}',[WhislistController::class,'addWishlist'])->name('addWishlist');
Route::get('/wishlists',[WhislistController::class,'WishlistPage'])->name('wishlistpage');
Route::get('/wishlist/delete/{wishlist_id}',[WhislistController::class,'deletewishlist'])->name('wishlistdelete');


// Cart Controller
Route::post('/add-to-carts/{product_id}',[CartController::class,'addToCart'])->name('add-to-cart');
Route::get('/carts',[CartController::class,'CartPage'])->name('cart');
Route::put('/carts/update/{cart_id}',[CartController::class,'cartUpdate'])->name('cartUpdate');
Route::get('/carts/delete/{cart_id}',[CartController::class,'cartDelete'])->name('cartDelete');
Route::post('/carts/cupon',[CartController::class,'cupon'])->name('cupon');
Route::get('/carts/cupon/remove',[CartController::class,'cuponremove'])->name('cuponremove');


//checkout controller
Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');

//order controller
Route::post('/place-order',[OrderController::class,'placeOrder'])->name('placeorder');
Route::get('/place-order/success',[OrderController::class,'orderSuccess'])->name('ordersuccess');




// ===============Backend Route===================

// Admin Dashboard/Home Page
Route::get('/admin/home', [AdminController::class, 'dashboard'])->name('admin.home');

// Admin Auth
Route::get('/admin/login', [LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class,'login']);
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

// Admin Category
Route::get('admin/categories', [CategoryController::class, 'index'])->name('category.index');
Route::post('admin/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('admin/categories/edit/{cat_id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('admin/categories/update/{cat_id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('admin/categories/delete/{cat_id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('admin/categories/inactive/{cat_id}', [CategoryController::class, 'inactive'])->name('category.inactive');
Route::get('admin/categories/active/{cat_id}', [CategoryController::class, 'active'])->name('category.active');

//Admin brand
Route::get('admin/brands', [BrandController::class, 'index'])->name('brand.index');
Route::post('admin/brands', [BrandController::class, 'store'])->name('brand.store');
Route::get('admin/brands/edit/{brand_id}', [BrandController::class, 'edit'])->name('brand.edit');
Route::put('admin/brands/update/{brand_id}', [BrandController::class, 'update'])->name('brand.update');
Route::get('admin/brands/delete/{brand_id}', [BrandController::class, 'delete'])->name('brand.delete');
Route::get('admin/brands/inactive/{brand_id}', [BrandController::class, 'inactive'])->name('brand.inactive');
Route::get('admin/brands/active/{brand_id}', [BrandController::class, 'active'])->name('brand.active');

// Admin Product
Route::get('admin/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('admin/products/store', [ProductController::class, 'store'])->name('product.store');
Route::get('admin/products/manage', [ProductController::class, 'manage'])->name('product.manage');
Route::get('admin/products/edit/{product_id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('admin/products/update/{product_id}', [ProductController::class, 'update'])->name('product.update');
Route::get('admin/products/delete/{product_id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('admin/products/inactive/{product_id}', [ProductController::class, 'inactive'])->name('product.inactive');
Route::get('admin/products/active/{product_id}', [ProductController::class, 'active'])->name('product.active');

// Admin Cupon
Route::get('admin/cupons/index', [CuponController::class, 'index'])->name('cupon.index');
Route::post('admin/cupons/store', [CuponController::class, 'store'])->name('cupon.store');
Route::get('admin/cupons/edit/{cupon_id}', [CuponController::class, 'edit'])->name('cupon.edit');
Route::put('admin/cupons/update/{cupon_id}', [CuponController::class, 'update'])->name('cupon.update');
Route::get('admin/cupons/delete/{cupon_id}', [CuponController::class, 'delete'])->name('cupon.delete');
Route::get('admin/cupons/inactive/{cupon_id}', [CuponController::class, 'inactive'])->name('cupon.inactive');
Route::get('admin/cupons/active/{cupon_id}', [CuponController::class, 'active'])->name('cupon.active');



