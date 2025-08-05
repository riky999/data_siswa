@extends('layout.aplikasi')

@section('konten')
<h3 class="mb-4">Pengumuman</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@auth
@if(auth()->user()->role === 'admin')
    <a href="{{ route('pengumuman.create') }}" class="btn btn-primary mb-3">+ Tambah Pengumuman</a>
@endif
@endauth

<div class="row">
    @foreach($data as $item)
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm p-3">
                <h5 class="mb-1">{{ $item->title }}</h5>
                <small class="text-muted">{{ $item->date }} | No: {{ $item->no }}</small>
                <p class="mt-2">{{ $item->content }}</p>

                @if(auth()->user()->role === 'admin')
                <div>
                    <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
