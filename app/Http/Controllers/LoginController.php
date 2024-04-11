<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                $request->session()->regenerate();
                return redirect('/');
            } else {
                return back()->withErrors([
                    'email' => 'Akses Ditolak, Anda Bukan Admin!',
                ])->onlyInput('email');
            }
        }
 
        return back()->withErrors([
            'email' => 'Email atau Password Salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function apiLogin(Request $request)
    {
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            $credentials = $request->only('email', 'password');
            
            if (!Auth::attempt($credentials)) {
                throw new Error('Username atau Password Salah');
            }
            
            if (Auth::user()->role == 'admin') {
                throw new Error('Anda Login Sebagai admin!');
            }

            $code = 200;
            $resp = array(
                'status' => 'success',
                'data' => array(
                    'name' => Auth::user()->name,
                    'id' => Auth::user()->id
                )
            );
        } catch (\Throwable $th) {
            $code = 401;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }
    
    public function apiDaftar(Request $request)
    {
        $code = 500;
        $resp = array('status' => 'fail');
        try {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
                'name' => ['required'],
            ]);

            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'created_at' => now()
            ]);

            $code = 200;
            $resp = array(
                'status' => 'success',
                'message' => 'Berhasil'
            );
        } catch (\Throwable $th) {
            $code = 401;
            $resp['message'] = $th->getMessage();
        }
        return response()->json($resp, $code);
    }
        
}
