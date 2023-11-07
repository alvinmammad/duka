<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.pages.index');
});
Route::prefix('admin')->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/save',[CategoryController::class,'save'])->name('category.save');
    Route::post('category/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('category/{id}/move', [CategoryController::class, 'move'])->name('categories.move');
    Route::delete('category/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
});
