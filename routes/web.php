<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PaymentNoticationController;
use App\Http\Controllers\ProfileController;

Route::get('/', HomeController::class)->name('home');

Route::get('products/me', [ProductController::class, 'mine'])->middleware('auth')->name('products.mine');
Route::resource('products', ProductController::class);
// Route::resource('profile', ProfileController::class);
// Route::get('/u/{user:username},[]');
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('history', HistoryController::class)->name('history');
    // Route::get('/{user:username}', [ProfileController::class, 'index']);

    Route::controller(InvoiceController::class)->group(function () {
        Route::post('invoice', 'store');
        Route::get('invoice/{invoice:order_id}', 'show')->name('invoice.show');
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('carts', 'index');
        Route::delete('carts/delete/{cart}', 'destroy')->name('cart.delete');
        Route::post('carts/add-to-cart/{product:slug}', 'store')->name('cart.store');
    });

    Route::controller(ProfileController::class)->group(function () {
        
        Route::get('profile/edit', 'edit')->name('profile.edit');
        Route::patch('profile/edit', 'update')->name('profile.update');
    });
    
});
// Route::resource('profile' ,ProfileController::class)->only('update', 'edit');

Route::post('api/notification/handling', [PaymentNoticationController::class, 'hit']);
require __DIR__.'/auth.php';
