<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeaterController extends Controller
{
    public function index()
    {
        return view('teater.data-teater', ['data' => DB::table('teater')->get()]);
    }

    public function form()
    {
        return view('teater.tambah-teater');
    }

    public function simpan(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['created_at'] = now();

        //simpan database
        $simpan = DB::table('teater')->insert($data);
        if ($simpan) {
            return redirect('/teater');
        } else {
            return redirect()->back()->withInput()->with('alert', 'Gagal Meyimpan Data');
        }
    }

    public function detail($id)
    {
        $data = DB::table('teater')->find($id);
        return view('teater.detail-teater', ['data' => $data]);
    }
    
    public function edit($id)
    {
        $data = DB::table('teater')->find($id);
        return view('teater.edit-teater', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['updated_at'] = now();

        //update database
        $update = DB::table('teater')->where('id', $request->id)->update($data);
        if ($update) {
            return redirect('/teater');
        } else {
            return redirect()->back()->withInput()->with('alert', 'Gagal Merubah Data');
        }
    }

    public function hapus($id)
    {
        $hapus = DB::table('teater')->delete($id);
        if ($hapus) {
            return redirect('/teater');
        } else {
            return redirect()->back()->with('alert', 'Gagal Menghapus Data');
        }
    }
}
