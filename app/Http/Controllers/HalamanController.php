<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index()
    {
        return view("halaman/index");
    }
    function tentang()
    {
        return view("halaman/tentang");
    }
    function kontak()
    {
        $judul = 'ini adalah halaman kontak';
        $data = [
            'judul' => 'ini adalah halaman kontak',
            'kontak' => [
                'email' => 'dirumahriky@gmail.com',
                'youtube' => 'programming di rumah riky'
            ]
        ];
        return view("halaman/kontak")->with($data);
    }

}
