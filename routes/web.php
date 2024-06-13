<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/',[ProductController::class ,'index'] )->name('index');
Route::get('/product/create', [ProductController::class ,'create'] )->name('product.create');
Route::post('/product/store', [ProductController::class ,'store'] )->name('product.store');