<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{

        function index()
        {
            if (Auth::check()) {
                return redirect('siswa');
            }

            return view("sesi/index");
        }

    function login(Request $request)
    {
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib diisi',
            'password.required' => 'Password Wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            return redirect('siswa')->with('success', 'Berhasil Login');
        } else {
            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid');

        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('succes', 'Berhasil Logout');
    }
    function register()
    {
        return view('sesi/register');
    }
    function create(Request $request)
{
    Session::flash('name', $request->name);
    Session::flash('email', $request->email);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ], [
        'name.required' => 'Name Wajib diisi',
        'email.required' => 'Email Wajib diisi',
        'email.email' => 'Silahkan Masukan Email Yang valid',
        'email.unique' => 'Email Sudah Pernah digunakan, silahkan pilih email lain',
        'password.required' => 'Password Wajib diisi',
        'password.min' => 'Minimum Password adalah 6 karakter',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user' // tambahkan role user
    ];

    User::create($data);

    $infologin = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::attempt($infologin)) {
        // 🔁 Cek apakah user sudah punya data siswa
        $user = Auth::user();
        $sudahPunyaSiswa = \App\Models\Siswa::where('user_id', $user->id)->exists();

        if (!$sudahPunyaSiswa) {
            return redirect()->route('siswa.create')->with('success', 'Silahkan lengkapi data siswa Anda');
        } else {
            return redirect()->route('siswa.index');
        }
    } else {
        return redirect('sesi')->withErrors('Login gagal setelah register');
    }
}

}

