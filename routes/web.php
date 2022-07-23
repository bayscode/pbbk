<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\NoteIqbalController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index']);
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'process']);
Route::get('catalog', [CatalogController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
  Route::get('logout', [LoginController::class, 'logout']);
  Route::get('user', [UserController::class, 'index']);
  Route::get('add-user', [UserController::class, 'add']);
  Route::post('add-user', [UserController::class, 'add_process']);

  Route::get('edit-user/{id}', [UserController::class, 'edit']);
  Route::post('edit-user/{id}', [UserController::class, 'edit_process']);
  Route::get('delete-user/{id}', [UserController::class, 'del_process'])->name('delete-user');

  Route::get('category', [CategoryController::class, 'index']);
  Route::get('add-category', [CategoryController::class, 'add']);
  Route::post('add-category', [CategoryController::class, 'add_process']);

  Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
  Route::post('edit-category/{id}', [CategoryController::class, 'edit_process']);
  Route::get('delete-category/{id}', [CategoryController::class, 'del_process'])->name('delete-category');

  Route::get('product', [ProductController::class, 'index']);
  Route::get('add-product', [ProductController::class, 'add']);
  Route::post('add-product', [ProductController::class, 'add_process']);

  Route::get('edit-product/{id}', [ProductController::class, 'edit']);
  Route::post('edit-product/{id}', [ProductController::class, 'edit_process']);
  Route::get('delete-product/{id}', [ProductController::class, 'del_process'])->name('delete-product');

  // SLIDER
  Route::get('slider', [SliderController::class, 'index']);
  Route::get('add-slider', [SliderController::class, 'add']);
  Route::post('add-slider', [SliderController::class, 'add_process']);

  Route::get('edit-slider/{id}', [SliderController::class, 'edit']);
  Route::post('edit-slider/{id}', [SliderController::class, 'edit_process']);
  Route::get('delete-slider/{id}', [SliderController::class, 'del_process'])->name('delete-slider');

  // NOTE
  Route::get('note', [NoteIqbalController::class, 'index']);
  Route::get('add-note', [NoteIqbalController::class, 'add']);
  Route::post('add-note', [NoteIqbalController::class, 'add_process']);

  Route::get('edit-note/{id}', [NoteIqbalController::class, 'edit']);
  Route::post('edit-note/{id}', [NoteIqbalController::class, 'edit_process']);
  Route::get('delete-note/{id}', [NoteIqbalController::class, 'del_process'])->name('delete-note');

});
