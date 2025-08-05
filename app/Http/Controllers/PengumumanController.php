<?php
// app/Http/Controllers/PengumumanController.php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $data = Pengumuman::latest()->get();
        return view('pengumuman.index', compact('data'));
    }

    public function create()
    {
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no' => 'required|string',
            'title' => 'required|string',
            'date' => 'required|date',
            'content' => 'required|string',
        ]);

        Pengumuman::create($request->all());
        return redirect()->route('pengumuman.index')->with('success', '');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update($request->all());
        return redirect()->route('pengumuman.index')->with('success', '');
    }

    public function destroy($id)
    {
        Pengumuman::findOrFail($id)->delete();
        return redirect()->route('pengumuman.index')->with('success', '');
    }
}
