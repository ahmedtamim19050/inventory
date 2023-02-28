<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/product-store', [HomeController::class, 'productStore'])->name('product.store');
Route::post('/product-edit', [HomeController::class, 'productEdit'])->name('product.edit');
Route::post('/product-delete/{product}', [HomeController::class, 'productDelete'])->name('product.delete');
Route::get('/histories/{product}', [HomeController::class, 'histories'])->name('history.index');
Route::post('/history-store/{product}', [HomeController::class, 'historyStore'])->name('history.store');
Route::post('/history-delete/{history}', [HomeController::class, 'historyDelete'])->name('history.delete');
