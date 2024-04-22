<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function(){
    Route::get('/', [UserController::class, 'index']);                  //menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);               //menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);           //menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);                  //menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);               //menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);          //menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);             //menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);         //menghapus data user
});

Route::group(['prefix' => 'level'], function(){
    Route::get('/', [LevelController::class, 'index']);                  //menampilkan halaman awal 
    Route::post('/list', [LevelController::class, 'list']);               //menampilkan data dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']);           //menampilkan halaman form tambah 
    Route::post('/', [LevelController::class, 'store']);                  //menyimpan data baru
    Route::get('/{id}', [LevelController::class, 'show']);               //menampilkan detail 
    Route::get('/{id}/edit', [LevelController::class, 'edit']);          //menampilkan halaman form edit 
    Route::put('/{id}', [LevelController::class, 'update']);             //menyimpan perubahan data
    Route::delete('/{id}', [LevelController::class, 'destroy']);         //menghapus data 
});

Route::group(['prefix' => 'kategori'], function(){
    Route::get('/', [KategoriController::class, 'index']);                  //menampilkan halaman awal 
    Route::post('/list', [KategoriController::class, 'list']);               //menampilkan data dalam bentuk json untuk datatables
    Route::get('/create', [KategoriController::class, 'create']);           //menampilkan halaman form tambah 
    Route::post('/', [KategoriController::class, 'store']);                  //menyimpan data baru
    Route::get('/{id}', [KategoriController::class, 'show']);               //menampilkan detail 
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);          //menampilkan halaman form edit 
    Route::put('/{id}', [KategoriController::class, 'update']);             //menyimpan perubahan data
    Route::delete('/{id}', [KategoriController::class, 'destroy']);         //menghapus data 
});

Route::group(['prefix' => 'barang'], function(){
    Route::get('/', [BarangController::class, 'index']);                  //menampilkan halaman awal 
    Route::post('/list', [BarangController::class, 'list']);               //menampilkan data dalam bentuk json untuk datatables
    Route::get('/create', [BarangController::class, 'create']);           //menampilkan halaman form tambah 
    Route::post('/', [BarangController::class, 'store']);                  //menyimpan data baru
    Route::get('/{id}', [BarangController::class, 'show']);               //menampilkan detail 
    Route::get('/{id}/edit', [BarangController::class, 'edit']);          //menampilkan halaman form edit 
    Route::put('/{id}', [BarangController::class, 'update']);             //menyimpan perubahan data
    Route::delete('/{id}', [BarangController::class, 'destroy']);         //menghapus data 
});

Route::group(['prefix' => 'stok'], function(){
    Route::get('/', [StokController::class, 'index']);                  //menampilkan halaman awal 
    Route::post('/list', [StokController::class, 'list']);               //menampilkan data dalam bentuk json untuk datatables
    Route::get('/create', [StokController::class, 'create']);           //menampilkan halaman form tambah 
    Route::post('/', [StokController::class, 'store']);                  //menyimpan data baru
    Route::get('/{id}', [StokController::class, 'show']);               //menampilkan detail 
    Route::get('/{id}/edit', [StokController::class, 'edit']);          //menampilkan halaman form edit 
    Route::put('/{id}', [StokController::class, 'update']);             //menyimpan perubahan data
    Route::delete('/{id}', [StokController::class, 'destroy']);         //menghapus data 
});

Route::group(['prefix' => 'penjualan'], function(){
    Route::get('/', [PenjualanController::class, 'index']);                  //menampilkan halaman awal 
    Route::post('/list', [PenjualanController::class, 'list']);               //menampilkan data dalam bentuk json untuk datatables
    Route::get('/create', [PenjualanController::class, 'create']);           //menampilkan halaman form tambah 
    Route::post('/', [PenjualanController::class, 'store']);                  //menyimpan data baru
    Route::get('/{id}', [PenjualanController::class, 'show']);               //menampilkan detail 
    Route::get('/{id}/edit', [PenjualanController::class, 'edit']);          //menampilkan halaman form edit 
    Route::put('/{id}', [PenjualanController::class, 'update']);             //menyimpan perubahan data
    Route::delete('/{id}', [PenjualanController::class, 'destroy']);         //menghapus data 
});

Route::get('login', [AuthController::class, 'index'])->name('login'); 
Route::get('register', [AuthController::class, 'register'])->name('register'); 
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout'); 
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register'); 

// kita atur juga untuk middleware menggunakan group pada routing
// didalamnya terdapat group untuk mengecek kondisi login
// jika user yang login merupakan admin maka akan diarahkan ke AdminController
// jika user yang login merupakan manager maka akan diarahkan ke ManagerController

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::resource('manager', ManagerController::class);
    });
});