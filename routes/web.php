<?php

use App\Models\ProductProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ApiUsageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\ProductProviderController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/docs', [DocsController::class, 'index'])->name('docs.index');


Route::middleware('auth')->group(function (){
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/api-usage', [ApiUsageController::class, 'index'])->name('apiUsage.index');

    Route::post('/api-usage/getAll', [ApiUsageController::class, 'getAll'])->name('apiUsage.getAll');

    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::put('/products', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products', [ProductsController::class, 'delete'])->name('products.delete');

    Route::get('/providers', [ProvidersController::class, 'index'])->name('providers.index');
    Route::post('/providers', [ProvidersController::class, 'store'])->name('providers.store');
    Route::put('/providers', [ProvidersController::class, 'update'])->name('providers.update');
    Route::delete('/providers', [ProvidersController::class, 'delete'])->name('providers.delete');

    Route::get('/products-providers', [ProductProviderController::class, 'index'])->name('products-providers.index');
    Route::post('/products-providers', [ProductProviderController::class, 'store'])->name('products-providers.store');
    Route::put('/products-providers', [ProductProviderController::class, 'update'])->name('products-providers.update');
    Route::delete('/products-providers', [ProductProviderController::class, 'delete'])->name('products-providers.delete');
});
