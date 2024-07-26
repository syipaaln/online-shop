<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index'])->name('index');

//route resource for products
Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::get('user/search', [ProductController::class, 'search'])->name('search');

Auth::routes();

Route::middleware(['auth', 'user-access:superadmin'])->group(function () {
    Route::get('/home', [HomeController::class, 'dashboard'])->name('home');
    Route::get('/manage-user', [HomeController::class, 'manageUser'])->name('manageUser');
    Route::get('/manage-user/create', [HomeController::class, 'manageUserCreate'])->name('manageUserCreate');
    Route::post('/regiter-user', [HomeController::class, 'registerUser'])->name('registerUser');
    Route::get('/manage-user/edit/{user}', [HomeController::class, 'manageUserEdit'])->name('manageUserEdit');
    Route::delete('/delete-user/{user}', [HomeController::class, 'manageUserDelete'])->name('manageUserDelete');
    Route::put('/update-user{user}', [HomeController::class, 'manageUserUpdate'])->name('manageUserUpdate');
    Route::get('/manage-product', [ProductController::class, 'superadminProduct'])->name('superadminProduct');
    Route::get('/manage-product/create', [ProductController::class, 'superadminProductCreate'])->name('superadminProductCreate');
    Route::get('/manage-product/edit/{user}', [ProductController::class, 'superadminProductEdit'])->name('superadminProductEdit');
    Route::get('/sales-report', [PembelianController::class, 'salesReport'])->name('superadmin.salesReport');
    Route::get('/search-product', [ProductController::class, 'superadminSearch'])->name('superadminSearch');
    Route::get('/search-user', [HomeController::class, 'superadminSearchUser'])->name('superadminSearchUser');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/manage-user', [HomeController::class, 'adminManageUser'])->name('adminManageUser');
    Route::get('/admin/manage-user/create', [HomeController::class, 'adminManageUserCreate'])->name('adminManageUserCreate');
    Route::post('/admin/regist-user', [HomeController::class, 'adminRegistUser'])->name('adminRegistUser');
    Route::get('/admin/manage-user/edit/{user}', [HomeController::class, 'adminManageUserEdit'])->name('adminManageUserEdit');
    Route::delete('/delete-user/{user}', [HomeController::class, 'manageUserDelete'])->name('manageUserDelete');
    Route::put('/admin/update-user{user}', [HomeController::class, 'adminManageUserUpdate'])->name('adminManageUserUpdate');
    Route::get('/admin/manage-product', [ProductController::class, 'adminProduct'])->name('adminProduct');
    Route::get('/admin/manage-product/create', [ProductController::class, 'adminProductCreate'])->name('adminProductCreate');
    Route::get('/admin/manage-product/edit/{user}', [ProductController::class, 'adminProductEdit'])->name('adminProductEdit');
    Route::get('/admin/sales-report', [PembelianController::class, 'salesReport'])->name('admin.salesReport');
    // Route::get('/search-product', [ProductController::class, 'adminSearch'])->name('adminSearch');
    Route::get('/admin/search-user', [HomeController::class, 'adminSearchUser'])->name('adminSearchUser');
});


Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/home', [ProductController::class, 'productUser'])->name('userProduct');
    Route::get('/user/checkout', [PembelianController::class, 'checkoutUser'])->name('userCheckout');
    Route::put('/user/checkout/update/{id}', [PembelianController::class, 'checkoutUpdate'])->name('checkoutUpdate');
    Route::post('/user/checkout/{id}', [PembelianController::class, 'addToCheckout'])->name('addToCheckout');
    Route::get('/user/profil', [UserController::class, 'profil'])->name('profil');
    Route::put('/user/profil/update', [UserController::class, 'profilUpdate'])->name('profilUpdate');
    Route::get('/user/payment', [PembelianController::class, 'paymentUser'])->name('userPayment');
    Route::post('/user/payment/process', [PembelianController::class, 'paymentProcess'])->name('paymentProcess');
    Route::get('/user/payment/bill', [PembelianController::class, 'paymentBill'])->name('paymentBill');
    Route::get('/user/history/{id}', [PembelianController::class, 'getUserHistory'])->name('user.history');
});


