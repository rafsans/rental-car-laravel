<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

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
    return view('landingpage');
});

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/entry', [CategoriesController::class, 'createPage']);
Route::get('/categories/update/entry/{id}',[CategoriesController::class,'updatePage']);

Route::post('/categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('/categories/update',[CategoriesController::class,'updateData'])->name('categories.update');
Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');

