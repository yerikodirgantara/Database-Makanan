<?php

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
use App\Http\Controllers\ApiController;
    Route::get('/', [ApiController::class, 'index']);
    Route::get('/home', [ApiController::class, 'home']);
    Route::get('/getProduk', [ApiController::class, 'apigetProduk']);
    Route::post('/login', [ApiController::class, 'apiLogin']);
    Route::get('/logout', [ApiController::class, 'apiLogout']);

    Route::get('/createProduk', [ApiController::class, 'tambahProdukForm'])->name('tambahProdukForm');
    Route::post('/createProduk', [ApiController::class, 'tambahProduk']);
    
    Route::get('/produk/edit/{id}', [ApiController::class, 'editprodukForm'])->name('edit.produk.form');
    Route::put('/produk/update/{id}', [ApiController::class, 'updateProduk'])->name('update.produk');
    
    Route::get('/produk/{id}', [ApiController::class, 'getProdukById'])->name('view.produk');
    
    Route::delete('/produk/delete/{id}', [ApiController::class, 'deleteProduk'])->name('delete.produk');


