<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\hypertensi;
use App\Models\diabetes;

use Phpml\Classification\KNearestNeighbors;
use App\Models\analisis_diabetes;
use App\Models\analisis_hypertensi;

class AuthControler extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function register_store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255',
        ]);
        $validated['password'] = bcrypt($validated['password']) ;
        User::create($validated);
        
        $user_id = DB::table('users')->latest('id')->first()->id;
        echo $user_id;
        hypertensi::insert([
            'id_user'=> $user_id,
            'usia' => 'kosong',
            'BB' => 'kosong',
            'TB' => 'ksong',
            'riwayat_diri_hypertensi' => 'kosong',
            'riwayat_keluarga_hypertensi' => 'kosong',
            'konsumsi_makanan' => 'kosong',
            'tingkat_stres' => 'kosong',
        ]);

        diabetes::insert([
            'id_user'=> $user_id,
            'usia' => 'kosong',
            'kendali_makanan' => 'kosong',
            'riwayat_keluarga' => 'kosong',
            'konsumsi_gula' => 'kosong',
            'BB' => 'kosong',
            'TB' => 'kosong',
            'aktivitas' => 'kosong',
            'hypertensi' => 'kosong'
        ]);
        $request->session()->flash('status', 'registrasi Berhasil!');
        return redirect('/login');
    } 
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('status', 'Selamat Datang !');
            return redirect()->intended('/user');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
