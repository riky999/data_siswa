<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDF;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */


   public function chartCanvas()
{
    try {
        // Debug auth user dulu
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        // Debug user object
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }
        
        $rawData = \App\Models\Siswa::select('kelas', \DB::raw('count(*) as total'))
            ->groupBy('kelas')
            ->get();

        $labels = $rawData->pluck('kelas');
        $data = $rawData->pluck('total');

        return view('siswa.chart_canvas', compact('labels', 'data'));
        
    } catch (\Exception $e) {
        // Debug error yang sebenarnya
        dd([
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
        ]);
    }
}



    public function cetakPdf(Request $request)
{
    $kelas = $request->input('kelas');

    $query = \App\Models\Siswa::orderBy('nama');

    if ($kelas) {
        $query->where('kelas', $kelas);
    }

    $data = $query->get();

    $pdf = PDF::loadView('siswa.pdf', compact('data'))->setPaper('a4', 'portrait');
    return $pdf->stream('data_siswa.pdf');
}






    // ini untuk mengubah berapa baris tabel
    public function index(Request $request)
{
    $cari = $request->input('cari');
    $kelas = $request->input('kelas');

    $query = \App\Models\Siswa::orderBy('nomer_induk', 'desc');

    if ($cari) {
        $query->where('nama', 'like', '%' . $cari . '%');
    }

    if ($kelas) {
        $query->where('kelas', $kelas);
    }

    $data = $query->paginate(5);

    // Chart data (mengelompokkan jumlah siswa per kelas)
    $chart = DB::table('siswa')
    ->select('kelas', DB::raw('COUNT(*) as jumlah'))
    ->groupBy('kelas')
    ->get();

    $labels = $chart->pluck('kelas');
    $jumlah = $chart->pluck('jumlah');
    


    return view('siswa.index', compact('data', 'labels', 'jumlah'));
}






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Session::flash('nomer_induk', $request->nomer_induk);
        Session::flash('nama', $request->nama);
        session::flash('alamat', $request->alamat);

        $request->validate([
            'nomer_induk' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',

            'foto' => 'required|mimes:jpeg,jpg,png,gif'
        ], [
            'nomer_induk.required' => 'Nomer Induk Wajib diisi',
            'nomer_induk.numeric' => 'Nomer Induk Wajib diisi Dalam Angka',
            'nama.required' => 'Nama Wajib diisi',
            'alamat.required' => 'Alamat Wajib diisi',
            'foto.required' => 'Silahkan Masukan Foto',
            'foto.mimes' => 'foto hanya di bolehkan berekstensi JPEG, JPG, PNG, dan GIF'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'nomer_induk' => $request->input('nomer_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'kelas' => $request->input('kelas'),
            'foto' => $foto_nama
        ];
        siswa::create($data);
        return redirect('siswa')->with('success', 'Berhasil memasukan data');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = siswa::where('nomer_induk', $id)->first();
        return view('siswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Siswa::where('nomer_induk', $id)->first();
        return view('siswa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ], [

            'nomer_induk.numeric' => 'Nomer Induk Wajib diisi Dalam Angka',
            'nama.required' => 'Nama Wajib diisi',
            'alamat.required' => 'Alamat Wajib diisi',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'kelas' => $request->input('kelas'),
            'alamat' => $request->input('alamat'),
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png,gif'
            ], [
                'foto.mimes' => 'foto hanya di bolehkan berekstensi JPEG, JPG, PNG, dan GIF'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            $data_foto = siswa::where('nomer_induk', $id)->first();
            File::delete(public_path('foto') . '/' . $data_foto->foto);

            // $data = [
            //     'foto' => $foto_nama
            // ];

            $data['foto'] = $foto_nama;
        }
        siswa::where('nomer_induk', $id)->update($data);
        return redirect('/siswa')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = siswa::where('nomer_induk', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);
        siswa::where('nomer_induk', $id)->delete();
        return redirect('/siswa')->with('success', 'Berhasil Hapus Data');
    }
    public function detail($id)
{
    try {
        $data = Siswa::find($id);
        
        if (!$data) {
            return redirect('/siswa')->with('error', 'Data siswa tidak ditemukan');
        }
        
        return view('siswa.show', compact('data'));
    } catch (\Exception $e) {
        return redirect('/siswa')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
}
