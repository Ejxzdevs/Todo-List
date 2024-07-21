<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
 
Route::get('/', [TaskController::class,'index'])->name('index');
Route::prefix('task')->group(function () {
    Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('/{task}', [TaskController::class, 'viewDetails'])->name('tasks.details');
    Route::get('/delete/{id}', [TaskController::class, 'deleteDetails'])->name('tasks.delete');
    Route::patch('/done/{id}', [TaskController::class, 'doneT'])->name('task.done');
    Route::put('/{task}/edit', [TaskController::class, 'editDetails'])->name('tasks.edit');
   
});
