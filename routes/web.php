<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('dashboard')->group(function(){
    
    Route::get('/payment',[OrderDetailController::class,'checkUserPayment'])->middleware('adminKaryawan')->name('payment.check');
    Route::put('/payment/{orderdetails:id}',[OrderDetailController::class,'changeStatusPayment'])->middleware('adminKaryawan')->name('payment.change');
    Route::get('/payment/order/{orderdetails:id}',[PaymentController::class,'show'])->middleware('adminKaryawan')->name('payment.showUser');
    Route::get('/payment/history',[OrderDetailController::class,'userHistory'])->name('payment.history');
    Route::get('/payment/history/{orderdetails:id}',[OrderDetailController::class, 'createUploadPembayaran'])->name('payment.createpayment');
    Route::post('/payment/history/',[OrderDetailController::class, 'uploadPembayaran'])->middleware('adminKaryawan')->name('payment.uploadpayment');

    Route::resource('product', ProductController::class)->middleware('adminKaryawan');
    Route::resource('users', UserController::class)->middleware('IsAdmin');

    Route::get('/category',[CategoryController::class, 'index'])->middleware('IsAdmin')->name('category.index');
    Route::get('/category/create',[CategoryController::class, 'create'])->middleware('IsAdmin')->name('category.create');
    Route::post('/category/create',[CategoryController::class,'store'])->middleware('IsAdmin')->name('category.store');
    Route::delete('/category/{category:id}',[CategoryController::class,'delete'])->middleware('IsAdmin')->name('category.destroy');

});
