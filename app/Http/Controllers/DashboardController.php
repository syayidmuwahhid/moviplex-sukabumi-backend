<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //mengambil jumlah dari setiap data
        $jml_film = DB::table('film')->count();
        $jml_teater = DB::table('teater')->where('status', 'aktif')->count();
        $jml_transaksi = DB::table('transaksi')->count();
        $laba = DB::table('transaksi')->sum('total');

        //mengambil jadwal tayang hari ini
        $jadwal = DB::table('jadwal_tayang')->select('jadwal_tayang.*', 'film.judul', 'film.foto', 'teater.nama as nama_teater')
            ->where('tanggal', date('Y-m-d'))
            ->join('film', 'film.id', 'id_film')
            ->join('teater', 'teater.id', 'id_teater')
            ->orderBy('jam_mulai', 'asc')
            ->get();
            
        $data = array(
            'jml_film' => $jml_film,
            'jml_teater' => $jml_teater,
            'jml_transaksi' => $jml_transaksi,
            'laba' => $laba,
            'jadwal' => $jadwal,
        );
        return view('dashboard', $data);
    }
}
