<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasirController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

Route::get('/', function() {
    return view('index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/user', [AdminController::class, 'user'])->middleware('userAkses:admin');
    Route::post('/user/store', [AdminController::class, 'createUser'])->middleware('userAkses:admin');
    Route::get('/barang', [AdminController::class, 'barang'])->middleware('userAkses:admin');
    Route::get('/jenisbarang', [AdminController::class, 'jenisbarang'])->middleware('userAkses:admin');

    Route::get('/kasir', [KasirController::class, 'index'])->middleware('userAkses:kasir');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});



