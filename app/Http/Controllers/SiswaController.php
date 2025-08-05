<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function chartCanvas()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $rawData = Siswa::select('kelas', DB::raw('count(*) as total'))
            ->groupBy('kelas')
            ->get();

        $labels = $rawData->pluck('kelas');
        $data = $rawData->pluck('total');

        return view('siswa.chart_canvas', compact('labels', 'data'));
    }

    public function cetakPdf(Request $request)
    {
        $kelas = $request->input('kelas');
        $query = Siswa::orderBy('nama');

        if ($kelas) {
            $query->where('kelas', $kelas);
        }

        $data = $query->get();
        $pdf = PDF::loadView('siswa.pdf', compact('data'))->setPaper('a4', 'portrait');
        return $pdf->stream('data_siswa.pdf');
    }

    public function index(Request $request)
    {
        $cari = $request->input('cari');
        $kelas = $request->input('kelas');
        $user = Auth::user();

        $query = Siswa::orderBy('nomer_induk', 'desc');

        if ($user->role !== 'admin') {
            $query->where('user_id', $user->id);
        }

        if ($cari) {
            $query->where('nama', 'like', '%' . $cari . '%');
        }

        if ($kelas) {
            $query->where('kelas', $kelas);
        }

        $data = $query->paginate(5);

        $labels = collect();
        $jumlah = collect();

        if ($user->role === 'admin') {
            $chart = DB::table('siswa')
                ->select('kelas', DB::raw('COUNT(*) as jumlah'))
                ->groupBy('kelas')
                ->get();

            $labels = $chart->pluck('kelas');
            $jumlah = $chart->pluck('jumlah');
        }

        return view('siswa.index', compact('data', 'labels', 'jumlah'));
    }

    public function create()
{
    $user = Auth::user();

    // Hanya batasi jika role-nya 'user'
    if ($user->role === 'user' && Siswa::where('user_id', $user->id)->exists()) {
        return redirect()->route('siswa.index')->with('warning', 'Anda sudah mengisi data sebelumnya.');
    }

    return view('siswa/create');
}

public function store(Request $request)
{
    Session::flash('nomer_induk', $request->nomer_induk);
    Session::flash('nama', $request->nama);
    Session::flash('alamat', $request->alamat);

    $request->validate([
        'nomer_induk' => 'required|numeric|unique:siswa,nomer_induk',
        'nama' => 'required',
        'alamat' => 'required',
        'kelas' => 'required',
        'foto' => 'required|mimes:jpeg,jpg,png,gif'
    ], [
        'nomer_induk.required' => 'Nomer Induk Wajib diisi',
        'nomer_induk.numeric' => 'Nomer Induk harus berupa angka',
        'nama.required' => 'Nama Wajib diisi',
        'alamat.required' => 'Alamat Wajib diisi',
        'foto.required' => 'Silakan masukkan foto',
        'foto.mimes' => 'Foto hanya boleh JPEG, JPG, PNG, GIF'
    ]);

    // Upload foto
    $foto_file = $request->file('foto');
    $foto_nama = date('ymdhis') . "." . $foto_file->extension();
    $foto_file->move(public_path('foto'), $foto_nama);

    $user = Auth::user();

    // Jika user adalah 'user', simpan user_id miliknya
    // Jika admin, bisa simpan kosong atau sesuai kebutuhan
    $data = [
        'user_id' => $user->role === 'user' ? $user->id : null,
        'nomer_induk' => $request->nomer_induk,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'kelas' => $request->kelas,
        'foto' => $foto_nama
    ];

    Siswa::create($data);

    return redirect('siswa')->with('success', 'Data siswa berhasil ditambahkan.');
}

    public function show(string $id)
    {
        $data = Siswa::where('nomer_induk', $id)->first();
        return view('siswa/show')->with('data', $data);
    }

    public function edit($id)
    {
        $data = Siswa::where('nomer_induk', $id)->first();
        return view('siswa/edit')->with('data', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
        ]);

        $data = [
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png,gif'
            ], [
                'foto.mimes' => 'Foto hanya diperbolehkan JPEG, JPG, PNG, dan GIF'
            ]);

            $foto_file = $request->file('foto');
            $foto_nama = date('ymdhis') . "." . $foto_file->extension();
            $foto_file->move(public_path('foto'), $foto_nama);

            $data_foto = Siswa::where('nomer_induk', $id)->first();
            File::delete(public_path('foto') . '/' . $data_foto->foto);

            $data['foto'] = $foto_nama;
        }

        Siswa::where('nomer_induk', $id)->update($data);
        return redirect('/siswa')->with('success', 'Berhasil memperbarui data');
    }

    public function destroy(string $id)
    {
        $data = Siswa::where('nomer_induk', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);
        Siswa::where('nomer_induk', $id)->delete();
        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }

    public function detail($id)
    {
        $data = Siswa::find($id);

        if (!$data) {
            return redirect('/siswa')->with('error', 'Data siswa tidak ditemukan');
        }

        return view('siswa.show', compact('data'));
    }
}
