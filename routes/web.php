<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'indexAdmin'])->name('admin');

Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/product/show/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::post('/product/update', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::delete('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');

Route::get('/factura/index', [App\Http\Controllers\FacturaController::class, 'index'])->name('factura.index');
Route::get('/factura/show/{id}', [App\Http\Controllers\FacturaController::class, 'show'])->name('factura.show');
Route::post('/facturar', [App\Http\Controllers\FacturaController::class, 'facturar'])->name('facturar');

Route::post('/compra/store/{id}', [App\Http\Controllers\CompraController::class, 'store'])->name('compra.store');




