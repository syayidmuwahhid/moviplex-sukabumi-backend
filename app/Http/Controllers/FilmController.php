<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function index()
    {
        //mengambil data film dan mengurutkannya berdasarkan tanggal terbaru
        $data = DB::table('film')->orderBy('tanggal_awal', 'desc')->get();

        foreach($data as $d){ //menentukan status berdasarkan tanggal film
            if($d->tanggal_awal <= date('Y-m-d') && $d->tanggal_akhir >= date('Y-m-d')) {
                $d->status = 'Playing';
            } elseif($d->tanggal_awal > date('Y-m-d')){
                $d->status = 'Upcoming';
            } else {
                $d->status = 'Expired';
            }
        }
        return view('film.data-film', ['data' => $data]);
    }

    public function form()
    {
        return view('film.tambah-film');
    }

    public function simpan(Request $request)
    {
        $data = $request->all(); //menyimpan semua request
        unset($data['_token']); //menghapus array _token
        $data['created_at'] = now(); //mengisi array created_At dengan waktu saat ini

        //simpan foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = date('Ymd') . '_' . $file->getClientOriginalName();
            
            //menyimpan file
            $request->file('foto')->move(public_path('foto'), $fileName);
            $data['foto'] = '/foto/'.$fileName;
        }

        //simpan database
        $simpan = DB::table('film')->insert($data);
        if ($simpan) {
            return redirect('/film');
        } else {
            return redirect()->back()->withInput()->with('alert', 'Gagal Meyimpan Data');
        }
    }

    public function detail($id)
    {
        $data = DB::table('film')->find($id);
        if($data->tanggal_awal <= date('Y-m-d') && $data->tanggal_akhir >= date('Y-m-d')) {
            $data->status = 'Playing';
        } elseif($data->tanggal_awal > date('Y-m-d')){
            $data->status = 'Upcoming';
        } else {
            $data->status = 'Expired';
        }
        return view('film.detail-film', ['data' => $data]);
    }
    
    public function edit($id)
    {
        $data = DB::table('film')->find($id);
        return view('film.edit-film', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['updated_at'] = now();

        //simpan foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = date('Ymd') . '_' . $file->getClientOriginalName();
            //menyimpan file
            $request->file('foto')->move(public_path('foto'), $fileName);
            $data['foto'] = '/foto/'.$fileName;
        }

        //update database
        $update = DB::table('film')->where('id', $request->id)->update($data);
        if ($update) {
            return redirect('/film');
        } else {
            return redirect()->back()->with('alert', 'Gagal Mengupdate Data');
        }
    }

    public function hapus($id)
    {
        $hapus = DB::table('film')->delete($id);
        if ($hapus) {
            return redirect('/film');
        } else {
            return redirect()->back()->with('alert', 'Gagal Menghapus Data');
        }
    }

    public function apiFilm(){
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            $code = 200;
            $resp = array(
                'status' => 'success',
                'data' => DB::table('film')->get()
            );
        } catch (\Throwable $th) {
            $code = 400;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }

    public function apiFilmPlaying()
    {
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            $qry = DB::table('film')->get();
            $data = array();
            foreach ($qry as $q) {
                if($q->tanggal_awal <= date('Y-m-d') && $q->tanggal_akhir >= date('Y-m-d')) {
                    array_push($data, $q);
                }
            }
            $code = 200;
            $resp = array(
                'status' => 'success',
                'data' => $data
            );
        } catch (\Throwable $th) {
            $code = 400;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }
    
    public function apiFilmUpcoming()
    {
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            $qry = DB::table('film')->get();
            $data = array();
            foreach ($qry as $q) {
                if($q->tanggal_awal > date('Y-m-d')) {
                    array_push($data, $q);
                }
            }
            $code = 200;
            $resp = array(
                'status' => 'success',
                'data' => $data
            );
        } catch (\Throwable $th) {
            $code = 400;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }

    public function apiFilmDetail(Request $request){
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            $code = 200;
            $resp = array(
                'status' => 'success',
                'data' => DB::table('film')->where('id', $request->id)->first()
            );
        } catch (\Throwable $th) {
            $code = 400;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }
}
