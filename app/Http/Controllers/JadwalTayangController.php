<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalTayangController extends Controller
{
    public function index()
    {
        $data = DB::table('jadwal_tayang')->select('jadwal_tayang.*', 'film.judul', 'teater.nama as nama_teater')
            ->join('film', 'film.id', 'id_film')
            ->join('teater', 'teater.id', 'id_teater')
            ->orderBy('tanggal', 'desc')
            ->get();
        return view('jadwal-tayang.data-jadwal', ['data' => $data]);
    }

    public function form()
    {
        $teater = DB::table('teater')->where('status', 'aktif')->get();
        $film = DB::table('film')->where('tanggal_akhir', '>=', date('Y-m-d'))->get();
        $data = array(
            'teater' => $teater,
            'film' => $film,
        );
        return view('jadwal-tayang.tambah-jadwal', $data);
    }

    public function simpan(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['created_at'] = now();
        
        //mengambil jam selesai
        $durasi = DB::table('film')->find($data['id_film'])->durasi;

        // Menambahkan waktu yang dibutuhkan
        $data['jam_selesai'] = date("H:i", strtotime("+$durasi minutes", strtotime(date('H:i', strtotime($data['jam_mulai'])))));

        //validasi tanggal
        if ($data['tanggal'] < date('Y-m-d')){
            return redirect()->back()->withInput()->with('alert', 'Tanggal tidak valid');
        }

        //cek jadwal yang sudah ada
        $cek = DB::table('jadwal_tayang')->where(['tanggal' => $data['tanggal'], 'id_teater' => $data['id_teater']])
            ->get();

        if ($cek) {
            foreach($cek as $c){
                //validasi jam mulai
                if ($data['jam_mulai'] <= $c->jam_selesai && $data['jam_mulai'] >= $c->jam_mulai){
                    return redirect()->back()->withInput()->with('alert', "Jadwal Sudah Terisi, perhatikan jam mulai dan selesai film");
                }   
            }
        }
        
        //simpan database
        $simpan = DB::table('jadwal_tayang')->insert($data);
        if ($simpan) {
            return redirect('/jadwal-tayang');
        } else {
            return redirect()->back()->withInput()->with('alert', 'Gagal Menyimpan Data');
        }
    }

    public function hapus($id)
    {
        $hapus = DB::table('jadwal_tayang')->delete($id);
        if ($hapus) {
            return redirect('/jadwal-tayang');
        } else {
            return redirect()->back()->with('alert', 'Gagal Menghapus Data');
        }
    }

    public function apiJadwal(Request $request)
    {
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            $list = [];
            $data = DB::table('jadwal_tayang')->where(['tanggal' => $request->tanggal, 'id_film' => $request->id_film])->get();
            foreach($data as $d) {
                $d->jam_mulai = date('H:i', strtotime($d->jam_mulai));

                // Mengecualikan jadwal yang kadaluarsa
                if ( $d->jam_mulai < date('H:i')) {
                    continue;
                }

                $list[] = $d;
            }

            $code = 200;
            $resp = array(
                'status' => 'success',
                'data' => $list,
            );
        } catch (\Throwable $th) {
            $code = 400;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }
}
