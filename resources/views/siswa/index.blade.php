@extends('layout/aplikasi')

@section('konten')

    <!-- buat userrr -->
    <div class="mt-3 mb-4">
        <div class="alert alert-primary shadow-sm border-left-primary">
            <i class="fas fa-user-shield"></i>
            Anda login sebagai: <strong>{{ ucfirst(auth()->user()->role) }}</strong>
            @if(auth()->user()->role !== 'admin')
                <span class="text-muted">(Akses terbatas)</span>
            @else
                <span class="text-success">(Akses penuh)</span>
            @endif
        </div>
    </div>

    <!-- bootstrap card -->
    <div class="card shadow rounded-lg border-0">
        <div class="card-header bg-gradient-primary text-white">
            <h5 class="mb-0 text-center"><i class="fas fa-users"></i> Data Siswa Terdaftar</h5>
        </div>
        <div class="card-body p-0">


            <!-- buat tabel -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle mb-0">
                    <thead class="bg-light text-center text-dark">
                        <tr>
                            <th>Foto</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr class="text-center">
                                <td>
                                    @if ($item->foto)
                                        <img src="{{ url('foto/' . $item->foto) }}" class="rounded-circle"
                                            style="width: 55px; height: 55px; object-fit: cover; border: 2px solid #007bff;">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>{{ $item->nomer_induk }}</td>
                                <td class="text-capitalize">{{ $item->nama }}</td>
                                <td class="text-start">{{ $item->alamat }}</td>
                                <td class="text-uppercase">{{ $item->kelas }}</td> {{-- Tambahkan ini --}}
                                <td>
                                    <a href="{{ url('/siswa', $item->nomer_induk) }}" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ url('/siswa/' . $item->nomer_induk . '/edit') }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ '/siswa/' . $item->nomer_induk }}" method="post" class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>




            </div>


        </div>
    </div>

    <br>




    <div class="d-flex justify-content-between align-items-center mt-4">
        <!-- Tombol Cetak PDF -->
        <a href="{{ route('siswa.pdf', ['kelas' => request('kelas')]) }}" class="btn btn-danger" target="_blank">
            Cetak PDF Kelas {{ request('kelas') ?? 'Semua' }}
        </a>

        <!-- Pagination -->
        <div>
            {{ $data->links() }}
        </div>
    </div>




    <!-- Pie Chart -->
    <div class="container mt-5">
        <div class="row">
            <!-- Bar Chart -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header bg-primary text-white">
                        <h6 class="m-0 font-weight-bold">Jumlah Siswa per Kelas</h6>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div style="height: 300px;">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header bg-success text-white">
                        <h6 class="m-0 font-weight-bold">Jumlah Siswa per Kelas</h6>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div style="height: 300px;">
                            <canvas id="pieChart"></canvas>
                        </div>
                        <div class="mt-3 text-center small">
                            @foreach($labels as $index => $label)
                                <span class="mr-2">
                                    <i class="fas fa-circle"
                                        style="color: {{ ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'][$index % 4] }}"></i>
                                    {{ $label }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart Rendering -->
    <script>
        const labels = {!! json_encode($labels) !!};
        const data = {!! json_encode($jumlah->map(fn($j) => round($j))) !!};

        const backgroundColors = ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'];
        const hoverColors = ['#2e59d9', '#17a673', '#2c9faf', '#dda20a'];

        // Bar Chart
        new Chart(document.getElementById('barChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah',
                    data: data,
                    backgroundColor: backgroundColors,
                    hoverBackgroundColor: hoverColors,
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: value => Math.round(value)
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Pie Chart
        new Chart(document.getElementById('pieChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: backgroundColors,
                    hoverBackgroundColor: hoverColors,
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('kelasPieChart').getContext('2d');
        const pieChart = new Chart(ctx, {
            // pie atau bar
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    data: {!! json_encode($jumlah) !!},
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#dda20a'],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                // cutout: '60%' // ben koyo donat
            }
        });
    </script>




@endsection