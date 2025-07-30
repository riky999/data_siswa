@extends('layout/aplikasi')

@section('konten')
    <h1>{{ $judul}}</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus, earum voluptatibus! Tempora similique aliquam doloribus.</p>
        <p>
            <ul>
                <li>
                    email: {{  $kontak['email'] }}
                </li>
                <li>
                    youtube: {{  $kontak['youtube'] }}
                </li>

            </ul>
        </p>
    
@endsection
