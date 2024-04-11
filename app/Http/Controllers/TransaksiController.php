<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = DB::table('transaksi')
                ->select('transaksi.*', 'judul', 'name', 'email')
                ->join('jadwal_tayang as jt', 'jt.id', 'transaksi.id_jadwal')
                ->join('film', 'film.id', 'jt.id_film')
                ->join('users', 'users.id', 'transaksi.user_id')
                ->orderBy('transaksi.id', 'desc')
                ->get();
        return view('transaksi.data-transaksi', ['data' => $data]);
    }

    public function detailTransaksi(Request $request) {
        $transaksi = DB::table('transaksi')
                ->select('transaksi.*', 'jt.tanggal as tanggal_tayang', 'jam_mulai', 'jam_selesai', 'judul', 'teater.nama as teater')
                ->join('jadwal_tayang as jt', 'jt.id', 'transaksi.id_jadwal')
                ->join('film', 'film.id', 'jt.id_film')
                ->join('teater', 'teater.id', 'jt.id_teater')
                ->where('transaksi.id', $request->id)
                ->first();
            
            $detailTransaksi = DB::table('detail_transaksi')->where('id_transaksi', $transaksi->id)->get();
            $kursi = array();
            foreach($detailTransaksi as $dt) {
                array_push($kursi, $dt->kursi);
            }

            $transaksi->jam_tayang = date('H:i', strtotime($transaksi->jam_mulai))." - ".date('H:i', strtotime($transaksi->jam_selesai));
            $transaksi->kursi = implode( ", ", $kursi);

        return view('transaksi.detail-transaksi', ['data' => $transaksi]);
    }

    public function apiKursi(Request $request)
    {
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            
            //get harga tiket
            $tanggal = $request->tanggal;
            $harga = DB::table('harga')->find(date('N', strtotime($tanggal)))->harga;

            //cek transaksi sesuai jadwal
            $transaksi = DB::table('transaksi')->where('id_jadwal', $request->id_jadwal)->get();
            
            $kursiDipesan = [];

            if(count($transaksi) != 0) { //sudah ada transaksi
                foreach($transaksi as $trans){
                    $detailTransaksi = DB::table('detail_transaksi')->where('id_transaksi', $trans->id)->get();

                    //menyimpan data kursi
                    foreach($detailTransaksi as $dt)
                    array_push($kursiDipesan, $dt->kursi);
                }
            }
            $code = 200;
            $resp = array(
                'status' => 'success',
                'data' => array(
                    'harga_tiket' => $harga,
                    'harga_tambahan' => 5000,
                    'kursi_dipesan' => $kursiDipesan,
                )
            );
        } catch (\Throwable $th) {
            $code = 400;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }

    public function apiBeliTiket(Request $request) {
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            //data request
            $requestData = array(
                'tanggal' => date('Y-m-d'),
                'id_jadwal' => $request->id_jadwal,
                'harga_tiket' => $request->harga_tiket,
                'jumlah' => $request->jumlah,
                'harga_tambahan' => $request->harga_tambahan,
                'total' => $request->total,
                'user_id' => $request->user_id,
                'status_bayar' => 'belum bayar',
                'created_at' => now()
            );

            $transaksi = DB::table('transaksi')->insert($requestData);

            //jika transaksi berhasil
            if ($transaksi) {
                //mengambil id transaksi
                $id_transaksi = DB::table('transaksi')->where($requestData)->first()->id;

                foreach($request->kursi as $k) {
                    //menyimpan data kursi
                    DB::table('detail_transaksi')->insert([
                        'id_transaksi' => $id_transaksi,
                        'kursi' => $k,
                        'created_at' => now()
                    ]);
                }

            } else {
                throw new Error('Data Gagal disimpan');
            }
            
            $code = 201;
            $resp = array(
                'status' => 'success',
                'message' => 'Transaksi Berhasil, silakan lakukan pembayaran',
                'id_transaksi' => $id_transaksi
            );
        } catch (\Throwable $th) {
            $code = 400;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }

    public function apiRiwayatTransaksi(Request $request) {
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            $transaksi = DB::table('transaksi')
                ->select('transaksi.*', 'jt.tanggal as tanggal_tayang', 'jam_mulai', 'jam_selesai', 'judul', 'teater.nama as teater')
                ->join('jadwal_tayang as jt', 'jt.id', 'transaksi.id_jadwal')
                ->join('film', 'film.id', 'jt.id_film')
                ->join('teater', 'teater.id', 'jt.id_teater')
                ->where('transaksi.user_id', $request->user_id)
                ->orderBy('transaksi.id', 'desc')
                ->get();
            
            foreach($transaksi as $t) {
                $detailTransaksi = DB::table('detail_transaksi')->where('id_transaksi', $t->id)->get();
                $t->kursi = array();
                foreach($detailTransaksi as $dt) {
                    array_push($t->kursi, $dt->kursi);
                }
    
                $t->jam_tayang = date('H:i', strtotime($t->jam_mulai))." - ".date('H:i', strtotime($t->jam_selesai));
            }
            
            $code = 200;
            $resp = array(
                'status' => 'success',
                'data' => $transaksi
            );
        } catch (\Throwable $th) {
            $code = 400;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }
    
    public function apiDetailTransaksi(Request $request) {
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            $transaksi = DB::table('transaksi')
                ->select('transaksi.*', 'jt.tanggal as tanggal_tayang', 'jam_mulai', 'jam_selesai', 'judul', 'teater.nama as teater')
                ->join('jadwal_tayang as jt', 'jt.id', 'transaksi.id_jadwal')
                ->join('film', 'film.id', 'jt.id_film')
                ->join('teater', 'teater.id', 'jt.id_teater')
                ->where('transaksi.id', $request->id_transaksi)
                ->first();
            
            $detailTransaksi = DB::table('detail_transaksi')->where('id_transaksi', $transaksi->id)->get();
            $kursi = array();
            foreach($detailTransaksi as $dt) {
                array_push($kursi, $dt->kursi);
            }

            $transaksi->jam_tayang = date('H:i', strtotime($transaksi->jam_mulai))." - ".date('H:i', strtotime($transaksi->jam_selesai));
            $transaksi->kursi = implode( ", ", $kursi);

            $code = 200;
            $resp = array(
                'status' => 'success',
                'data' => $transaksi
            );
        } catch (\Throwable $th) {
            $code = 400;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }

    public function apiBayarTransaksi(Request $request) {
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            //cek
            $cek = DB::table('transaksi')->find($request->id)->status_bayar;
            if ($cek == "lunas") {
                throw new Error("Tiket Sudah dibayar");
            }
            DB::table('transaksi')->where('id', $request->id)->update([
                'status_bayar' => 'lunas',
                'tanggal_pembayaran' => now(),
                'updated_at' => now()
            ]);

            $code = 200;
            $resp = array(
                'status' => 'success',
                'message' => 'Berhasil Membayar'
            );
        } catch (\Throwable $th) {
            $code = 400;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }
}
