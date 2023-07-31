<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
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

// subcategory
Route::get('/subcategory', [SubcategoryController::class, 'index'])
    ->name('subcategory.index');
Route::get('/subcategory/create', [SubcategoryController::class, 'create'])
    ->name('subcategory.create');
Route::post('/subcategory/store', [SubcategoryController::class, 'store'])
    ->name('subcategory.store');
Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'edit'])
    ->name('subcategory.edit');
Route::put('/subcategory/update/{id}', [SubcategoryController::class, 'update'])
    ->name('subcategory.update');
Route::delete('/subcategory/delete/{id}', [SubcategoryController::class, 'destroy'])
    ->name('subcategory.delete');
