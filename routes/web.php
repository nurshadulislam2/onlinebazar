<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('backend.pages.dashboard');
});

// category
Route::get('/category', [CategoryController::class, 'index'])
    ->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])
    ->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])
    ->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])
    ->name('category.edit');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])
    ->name('category.update');
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])
    ->name('category.delete');
