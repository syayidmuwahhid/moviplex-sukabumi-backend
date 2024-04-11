<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\JadwalTayangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/film', [FilmController::class, 'apiFilm']);
Route::get('/film/upcoming', [FilmController::class, 'apiFilmUpcoming']);
Route::get('/film/playing', [FilmController::class, 'apiFilmPlaying']);
Route::post('/film/detail', [FilmController::class, 'apiFilmDetail']);

Route::post('/login', [LoginController::class, 'apiLogin']);
Route::post('/daftar', [LoginController::class, 'apiDaftar']);

Route::post('/jadwal', [JadwalTayangController::class, 'apiJadwal']);

Route::post('/cek-kursi', [TransaksiController::class, 'apiKursi']);

Route::post('/beli-tiket', [TransaksiController::class, 'apiBeliTiket']);

Route::post('/riwayat-transaksi', [TransaksiController::class, 'apiRiwayatTransaksi']);

Route::post('/detail-transaksi', [TransaksiController::class, 'apiDetailTransaksi']);

Route::post('/bayar', [TransaksiController::class, 'apiBayarTransaksi']);