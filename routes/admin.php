<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PDFGenerateController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    //User
    Route::resource('user', UserController::class);
    //product
    Route::resource('product', ProductController::class);
    //inventory
    Route::resource('inventory', InventoryController::class)->except('store', 'create', 'edit', 'update', 'destroy');

    //sales
    Route::resource('sale', SaleController::class);
    //generate pdf
    Route::get('generate-pdf', [PDFGenerateController::class, 'index'])->name('generate');


    //logount
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
