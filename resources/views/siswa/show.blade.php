@extends('layout/aplikasi')

@section('konten')

<style>
    .profile-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        align-items: center;
        justify-content: center;
        padding: 40px;
        background-color: #f0f4ff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .profile-photo {
        flex: 0 0 220px;
        text-align: center;
    }

    .profile-photo img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-info {
        flex: 1;
        max-width: 500px;
    }

    .profile-info h1 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    .profile-info p {
        font-size: 16px;
        margin-bottom: 12px;
        color: #333;
    }

    .back-button {
        margin-top: 20px;
    }
</style>

<div class="profile-wrapper">
    <div class="profile-photo">
        <img src="{{ asset('foto/' . $data->foto) }}" alt="Foto {{ $data->nama }}">
    </div>

    <div class="profile-info">
        <h1>{{ $data->nama }}</h1>
        <p><strong>Nomor Induk:</strong> {{ $data->nomer_induk }}</p>
        <p><strong>Alamat:</strong> {{ $data->alamat }}</p>

        <a href="{{ url('/siswa') }}" class="btn btn-outline-primary back-button">← Kembali</a>
    </div>
</div>

@endsection
