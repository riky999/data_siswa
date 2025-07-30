<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController_ extends Controller
{
    //
    function index(){
        // $data = siswa::all();
        $data = siswa::orderBy('nomer_induk', 'desc')->paginate(1);
        return view('siswa/index')->with('data',$data);
    }
    function detail($id)
    {
        // return "<h1>saya siswa dari controller dengan id $id</h1>";

        $data = siswa::where('nomer_induk', $id)->first();
        return view('siswa/show')->with('data', $data);
    }
    function create(){

    }

    function delate(){

    }
}
