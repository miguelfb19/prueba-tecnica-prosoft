<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::get('/in-progress', [TaskController::class, 'inProgress']);
Route::post('/', [TaskController::class, 'store']);
Route::delete('/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::put('/{id}', [TaskController::class, 'update'])->name('task.update');
