<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function admin()
    {
        //mengambil data user dengan role admin
        $data = DB::table('users')->where('role', 'admin')->get();
        return view('akun.data-admin', ['data' => $data]);
    }
    
    public function user()
    {
        //mengambil data user dengan role user
        $data = DB::table('users')->where('role', 'user')->get();
        return view('akun.data-user', ['data' => $data]);
    }

    public function form()
    {
        return view('akun.tambah-admin');
    }

    public function simpan(Request $request)
    {
        //simpan database
        $simpan = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'created_at' => now()
        ]);
        if ($simpan) { //jika tersimpan akan redirect ke /akun/admin
            return redirect('/akun/admin');
        } else {
            //jika gagal tersimpan akan redirect kembali dengan inputan asal dan notif alert
            return redirect()->back()->withInput()->with('alert', 'Gagal Menyimpan Data');;
        }
    }

    public function edit($id)
    {
        //mengambil data user berdasarkan id
        $data = DB::table('users')->find($id);
        return view('akun.edit-admin', ['data' => $data]);
    }

    public function update(Request $request)
    {
        //update database
        $update = DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'updated_at' => now()
        ]);
        if ($update) { //jika tersimpan akan redirect ke /akun/admin
            return redirect('/akun/admin'); 
        } else {
            //jika gagal tersimpan akan redirect kembali dengan inputan asal dan notif alert
            return redirect()->back()->withInput()->with('alert', 'Gagal Merubah Data');
        }
    }

    public function hapus($id)
    {
        $hapus = DB::table('users')->delete($id);
        if (!$hapus) {
            //jika gagal akan redirect kembali dengan inputan asal dan notif alert
            return redirect()->back()->with('alert', 'Gagal Menghapus Data');
        }
        //ketika berhasil akan redirect kembali
        return redirect()->back();
    }
}
