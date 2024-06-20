<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class,'index'])->name('index');
Route::prefix('task')->group(function () {
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/{task}', [TaskController::class, 'viewDetails'])->name('tasks.details');
    Route::put('/{task}/edit', [TaskController::class, 'editDetails'])->name('tasks.edit');
    Route::get('/{task}/delete', [TaskController::class, 'deleteDetails'])->name('tasks.delete');
});