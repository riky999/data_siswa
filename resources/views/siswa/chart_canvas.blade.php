@extends('layout/aplikasi')

@section('konten')
<div class="container mt-5">
    <h4 class="text-center mb-4">Jumlah Siswa per Kelas</h4>
    <canvas id="kelasChart" height="100"></canvas>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('kelasChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Jumlah Siswa',
                data: {!! json_encode($data) !!},
                backgroundColor: [
                    '#007bff',
                    '#28a745',
                    '#ffc107',
                    '#dc3545',
                    '#17a2b8'
                ],
                borderWidth: 1,
                borderColor: '#000'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
@endsection
