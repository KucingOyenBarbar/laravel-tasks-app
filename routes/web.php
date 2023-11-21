<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', HomeController::class);

Route::redirect('/', 'tasks');

// Task Route Group
Route::middleware(['auth', 'verified'])->prefix('tasks')->group(function () {
    Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
    Route::post('/', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
    Route::get('/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
    Route::get('/{task}', [App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');
    Route::put('/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/{task}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/{task}/completed', [App\Http\Controllers\TaskController::class, 'updateCompletedTask'])->name('tasks.completed');
    Route::put('/{task}/undo', [App\Http\Controllers\TaskController::class, 'updateUndoTask'])->name('tasks.undo');
});
