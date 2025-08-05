@extends('layout.aplikasi')

@section('konten')
<h3 class="mb-4 text-gray-800">Pengumuman</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@auth
@if(auth()->user()->role === 'admin')
    <a href="{{ route('pengumuman.create') }}" class="btn btn-primary mb-4">
        <i class="fas fa-plus"></i> Tambah Pengumuman
    </a>
@endif
@endauth

<div class="row">
    @foreach($data as $item)
        <div class="col-lg-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 px-3">
                <div class="card-body">
                    <h5 class="font-weight-bold text-primary">{{ $item->title }}</h5>
                    <div class="text-xs text-muted mb-2">
                        <i class="fas fa-calendar-alt"></i> {{ $item->date }} &nbsp; | &nbsp; No: {{ $item->no }}
                    </div>
                    <p class="text-gray-800">{{ $item->content }}</p>

                    @if(auth()->user()->role === 'admin')
                    <div class="mt-3">
                        <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
