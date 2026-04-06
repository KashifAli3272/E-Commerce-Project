<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EasypaisaController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowsubcategoryproductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UseremailController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('dashboard');

});





// Category Routes
Route::get('/category', [CategoryController::class, 'show'])->name('addcategory');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('admin/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('editcategory');
Route::put('admin/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
//subcategory routes
Route::get('/subcategory', [SubcategoryController::class, 'create'])->name('addsubcategory');
Route::post('subcategory/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
Route::get('admin/subcategories', [SubcategoryController::class, 'index'])->name('subcategory.index');
Route::get('admin/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('editsubcategory');
Route::put('admin/subcategories/{subcategory}', [SubcategoryController::class, 'update'])->name('subcategory.update');
Route::delete('admin/subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');
//brand routes
Route::get('/brand', [BrandController::class, 'create'])->name('addbrand');
Route::post('brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::get('admin/brands', [BrandController::class, 'index'])->name('brand.index');
Route::get('admin/brands/{brand}/edit', [BrandController::class, 'edit'])->name('editbrand');
Route::put('admin/brands/{brand}', [BrandController::class, 'update'])->name('brand.update');
Route::delete('admin/brands/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');
//product routes
Route::get('/product', [ProductController::class, 'create'])->name('addproduct');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('admin/products', [ProductController::class, 'index'])->name('product.index');
Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('editproduct');
Route::put('admin/products/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('admin/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
//routes
Route::get('/about', function () {
    return view('user.about');
})->name('about');
Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');


Route::get('/mainheader', function () {
    return view('user.index1');
})->name('mainheader');


Route::get('/', [ItemsController::class, 'index'])->name('items.index');
Route::post('cart/add/{id}', [ItemsController::class, 'addToCart'])->name('cart.add');
Route::get('cart/view/{id}', [ItemsController::class, 'cart'])->name('cartview');
Route::get('cart', [ItemsController::class, 'cart'])->name('cart.index');
Route::post('cart/remove/{id}', [ItemsController::class, 'remove'])->name('cart.remove');
Route::put('cart/update/', [ItemsController::class, 'updateCart'])->name('updatecart');
Route::match(['get', 'post'],'checkout', [ItemsController::class, 'checkout'])->name('checkout.index');
Route::get('/search', [ItemsController::class, 'search'])->name('search');

//login routes
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
//register routes
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'adduser'])->name('register');
//order routes
Route::post('/order', [OrdersController::class, 'checkoutSubmit'])->name('order');



// easypaisa routes


Route::match(['get','post'],'/easypaisa-payment', [EasypaisaController::class,'payment'])->name('easypaisa.payment');
Route::match(['get', 'post'], '/easypaisa-response', [EasypaisaController::class,'response'])->name('easypaisa.response');
Route::view('/payment-success','user.easypaisa.paymentsucc')->name('payment.success');
Route::view('/payment-failed','user.easypaisa.paymentfailed')->name('payment.failed');
// account route
Route::get('/account',[AccountController:: class ,'view'])->name('viewaccount');
//browsecategory route
Route::get('/navbar',[ItemsController:: class ,'navbar'])->name('navbar');
//useremail
Route::post('/useremail',[UseremailController:: class ,'email'])->name('email');

//email routes
Route::get('/email/form', [UseremailController::class, 'email'])->name('email/form');
Route::post('/send-email', [UseremailController::class, 'sendEmail'])->name('sendemail');
//subscribe email
Route::post('/save-email', [EmailController::class, 'index'])->name('saveemail');
//subcategory product show routes


Route::get('/show/subcategory/product/{id}', [ShowsubcategoryproductController::class, 'index'])->name('showsubproduct');
