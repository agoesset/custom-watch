<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/filter-products', [HomeController::class, 'filterProducts'])->name('filter.products');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.show');
Route::get('/product/{id}/detail', [HomeController::class, 'showProductDetail'])->name('product.detail');
Route::get('/configurator', [HomeController::class, 'configurator'])->name('configurator');
Route::get('/configurator/load-parts/{watchTypeId}', [HomeController::class, 'loadParts'])->name('configurator.load');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::get('/history', [HomeController::class, 'history'])->name('history');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
