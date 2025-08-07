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
        transition: all 0.3s ease;
    }

    /* Dark theme support untuk profile wrapper */
    [data-theme="dark"] .profile-wrapper {
        background-color: #1e293b !important;
        color: #cbd5e1 !important;
        box-shadow: 0 10px 30px rgba(15, 20, 25, 0.4) !important;
        border: 1px solid #334155;
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
        transition: all 0.3s ease;
    }

    /* Dark theme support untuk foto */
    [data-theme="dark"] .profile-photo img {
        box-shadow: 0 4px 10px rgba(15, 20, 25, 0.3) !important;
        border: 2px solid #334155;
    }

    .profile-info {
        flex: 1;
        max-width: 500px;
    }

    .profile-info h1 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
        transition: all 0.3s ease;
    }

    /* Dark theme support untuk heading */
    [data-theme="dark"] .profile-info h1 {
        color: #f1f5f9 !important;
    }

    .profile-info p {
        font-size: 16px;
        margin-bottom: 12px;
        color: #333;
        transition: all 0.3s ease;
    }

    /* Dark theme support untuk paragraf */
    [data-theme="dark"] .profile-info p {
        color: #cbd5e1 !important;
    }

    /* Dark theme support untuk text strong/bold */
    [data-theme="dark"] .profile-info p strong {
        color: #f1f5f9 !important;
    }

    .back-button {
        margin-top: 20px;
    }

    /* Dark theme support untuk button */
    [data-theme="dark"] .btn-outline-primary {
        border-color: #4e73df !important;
        color: #4e73df !important;
        background-color: transparent !important;
    }

    [data-theme="dark"] .btn-outline-primary:hover {
        background-color: #4e73df !important;
        color: #ffffff !important;
        border-color: #4e73df !important;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .profile-wrapper {
            flex-direction: column;
            padding: 20px;
            gap: 20px;
        }

        .profile-photo {
            flex: none;
        }

        .profile-photo img {
            width: 150px;
            height: 150px;
        }

        .profile-info h1 {
            font-size: 24px;
            text-align: center;
        }

        .profile-info {
            text-align: center;
            max-width: 100%;
        }
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