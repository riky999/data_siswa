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
            'email.unique' => 'Email Sudah Pernah di gunakan silahkan pilih email yang lain',
            'password.required' => 'Password Wajib diisi',
            'password.min' => 'Minimum Password yang di izinkan adalah 6 karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            return redirect('siswa')->with('success', Auth::user()->name . 'Berhasil Login');
        } else {
            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid');

        }
    }

}

