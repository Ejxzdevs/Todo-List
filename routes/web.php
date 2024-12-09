<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
 
Route::get('/', [TaskController::class,'index'])->name('index');
Route::prefix('task')->group(function () {
    Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/update', [TaskController::class, 'updateDetails'])->name('tasks.update');
    Route::get('/delete/{id}', [TaskController::class, 'deleteDetails'])->name('tasks.delete');
});
