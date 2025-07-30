@extends('layout/aplikasi')

@section('konten')
<!-- tombol kembali -->

<form method="post" action="{{  '/siswa/'.$data->nomer_induk }}" 
enctype="multipart/form-data">

    @csrf
    @method('PUT')
  <div class="mb-3">
    <h1>Nomer Induk {{ $data->nomer_induk }}</h1>
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" name='nama' id="nama" value="{{ $data->nama }}">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea class="form-control" name="alamat">{{ $data->alamat }}</textarea>
  </div>

  <div class="mb-3">
    <label for="kelas" class="form-label">Kelas</label>
    <select name="kelas" class="form-control" id="kelas">
        <option value="">-- Pilih Kelas --</option>
        <option value="RPL" {{ $data->kelas == 'RPL' ? 'selected' : '' }}>RPL</option>
        <option value="TKJ" {{ $data->kelas == 'TKJ' ? 'selected' : '' }}>TKJ</option>
        <option value="DKV" {{ $data->kelas == 'DKV' ? 'selected' : '' }}>DKV</option>
        <option value="TKR" {{ $data->kelas == 'TKR' ? 'selected' : '' }}>TKR</option>
    </select>
</div>


  @if ($data->foto)
  <div class="mb-3">
    <img style="max-width: 70px;max-height:70px" src="{{ url('foto').'/'.$data->foto }}"/>
  </div>
  
  @endif
  <div class="mb-3">
    <label for="foto" class="form-label">foto</label>
    <input type="file" class="form-control" name="foto" id="foto">
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">UPDATE</button>
    <a href="/siswa" class="btn btn-secondary"> Kembali</a>
  </div>
</form>
@endsection