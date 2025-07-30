@extends('layout/aplikasi')

@section('konten')
<form method="post" action="/siswa" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="nomer_induk" class="form-label">Nomer Induk</label>
    <input type="text" class="form-control" name='nomer_induk' id="nomer_induk" value="{{ Session::get('nomer_induk') }}" >
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" name='nama' id="nama" value="{{ Session::get('nama') }}">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea class="form-control" name="alamat">{{ Session::get('alamat') }}</textarea>
  </div>
  <div class="mb-3">
    <label for="kelas" class="form-label">Kelas</label>
    <select class="form-control" name="kelas" id="kelas">
        <option value="">-- Pilih Kelas --</option>
        <option value="RPL">RPL</option>
        <option value="TKJ">TKJ</option>
        <option value="DKV">DKV</option>
        <option value="TKR">TKR</option>
    </select>
</div>

  <div class="mb-3">
    <label for="foto" class="form-label">foto</label>
    <input type="file" class="form-control" name="foto" id="foto">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">SIMPAN</button>
    <a href="/siswa" class="btn btn-secondary"> Kembali</a>
  </div>
</form>
@endsection