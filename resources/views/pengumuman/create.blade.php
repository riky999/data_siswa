@extends('layout.aplikasi')

@section('konten')
<h3 class="mb-4">{{ isset($pengumuman) ? 'Edit' : 'Tambah' }} Pengumuman</h3>

<form method="POST" action="{{ isset($pengumuman) ? route('pengumuman.update', $pengumuman->id) : route('pengumuman.store') }}">
    @csrf
    @if(isset($pengumuman)) @method('PUT') @endif

    <div class="mb-3">
        <label>No</label>
        <input type="text" name="no" class="form-control" value="{{ $pengumuman->no ?? '' }}" required>
    </div>

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" value="{{ $pengumuman->title ?? '' }}" required>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="date" class="form-control" value="{{ $pengumuman->date ?? '' }}" required>
    </div>

    <div class="mb-3">
        <label>Isi</label>
        <textarea name="content" class="form-control" rows="4" required>{{ $pengumuman->content ?? '' }}</textarea>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
