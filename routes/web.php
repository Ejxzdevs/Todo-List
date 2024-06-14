<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::prefix('product')->group(function () {
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/{product}', [ProductController::class, 'viewDetails'])->name('product.details');
    Route::put('/{product}/edit', [ProductController::class, 'editDetails'])->name('product.edit');
    Route::get('/{product}/delete', [ProductController::class, 'deleteDetails'])->name('product.delete');
});