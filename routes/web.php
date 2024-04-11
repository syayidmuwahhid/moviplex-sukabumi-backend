<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\JadwalTayangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeaterController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Hash;
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


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index']);
    
    Route::get('/film', [FilmController::class, 'index']);
    Route::get('/film/tambah', [FilmController::class, 'form']);
    Route::post('/film/simpan', [FilmController::class, 'simpan']);
    Route::get('/film/detail/{id}', [FilmController::class, 'detail']);
    Route::get('/film/edit/{id}', [FilmController::class, 'edit']);
    Route::post('/film/update', [FilmController::class, 'update']);
    Route::get('/film/hapus/{id}', [FilmController::class, 'hapus']);

    Route::get('/teater', [TeaterController::class, 'index']);
    Route::get('/teater/tambah', [TeaterController::class, 'form']);
    Route::post('/teater/simpan', [TeaterController::class, 'simpan']);
    Route::get('/teater/detail/{id}', [TeaterController::class, 'detail']);
    Route::get('/teater/edit/{id}', [TeaterController::class, 'edit']);
    Route::post('/teater/update', [TeaterController::class, 'update']);
    Route::get('/teater/hapus/{id}', [TeaterController::class, 'hapus']);
    
    Route::get('/jadwal-tayang', [JadwalTayangController::class, 'index']);
    Route::get('/jadwal-tayang/tambah', [JadwalTayangController::class, 'form']);
    Route::post('/jadwal-tayang/simpan', [JadwalTayangController::class, 'simpan']);
    Route::get('/jadwal-tayang/hapus/{id}', [JadwalTayangController::class, 'hapus']);
    
    Route::get('/harga', [HargaController::class, 'index']);
    Route::get('/harga/edit', [HargaController::class, 'edit']);
    Route::post('/harga/update', [HargaController::class, 'update']);

    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'detailTransaksi']);
    
    Route::get('/akun/admin', [AkunController::class, 'admin']);
    Route::get('/akun/admin/tambah', [AkunController::class, 'form']);
    Route::post('/akun/admin/simpan', [AkunController::class, 'simpan']);
    Route::get('/akun/admin/edit/{id}', [AkunController::class, 'edit']);
    Route::post('/akun/admin/update', [AkunController::class, 'update']);
    Route::get('/akun/hapus/{id}', [AkunController::class, 'hapus']);
    Route::get('/akun/user', [AkunController::class, 'user']);

});