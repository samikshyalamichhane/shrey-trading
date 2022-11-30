<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ClientLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AdminLoginController::class,'home'])->name('home');
Route::get('/admin-login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin-login', [AdminLoginController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin-logout/', [AdminLoginController::class, 'logout'])->name('admin.logout');
Route::get('dashboard',[AdminLoginController::class,'dashboard'])->name('dashboard');

//client's Route
Route::group(['prefix'=> 'admin'], function(){
Route::resource('/users',UserController::class);
Route::resource('/clients',ClientController::class);
Route::resource('/products',ProductController::class);
});

Route::group(['prefix' => 'client'], function () {
    Route::get('login', [ClientLoginController::class,'form'])->name('client.login-form');
    Route::post('login', [ClientLoginController::class,'submit'])->name('client.login');
    Route::post('logout', [ClientLoginController::class,'logout'])->name('client.logout');
});

Route::group(['prefix'=> 'carts'], function(){
    Route::post('/add', [CartController::class,'CartAdd'])->name('addNewCart');
    Route::post('/udpate-cart/', [CartController::class,'updateToCart'])->name('updateToCart');
    Route::post('/delete-cart/', [CartController::class,'DeleteCart'])->name('delete-cart');
    Route::post('/submit-order/', [OrderController::class,'submitOrder'])->name('submitOrder');


});
Route::get('/orders/', [OrderController::class,'index'])->name('orders.index');
Route::get('/view-order/{id}', [OrderController::class,'show'])->name('orders.show');
Route::delete('/orders/{id}', [OrderController::class,'delete'])->name('orders.destroy');
Route::post('/orders/', [OrderController::class,'updateStatus'])->name('updateStatus');
Route::post('print-order',[OrderController::class,'printOrder'])->name('printOrder');
Route::get('export/{id}', [ExportController::class, 'export'])->name('export');




