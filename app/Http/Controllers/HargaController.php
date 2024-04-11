<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HargaController extends Controller
{
    public function index()
    {
        return view('harga.data-harga', ['data' => DB::table('harga')->get()]);
    }
    
    public function edit()
    {
        return view('harga.edit-harga', ['data' => DB::table('harga')->get()]);
    }

    public function update(Request $request)
    {
        for ($i = 0; $i<7; $i++){
            //update database
            $update = DB::table('harga')->where('id', ($i+1))->update(['harga' => $request->hari[$i], 'updated_at' => now()]);
        }
        
        if ($update) {
            return redirect('/harga');
        } else {
            return redirect()->back()->withInput()->with('alert', 'Gagal Merubah Data');
        }

    }
}
