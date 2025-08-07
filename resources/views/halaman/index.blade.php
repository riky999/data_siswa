<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        /* Pattern overlay using SVG base64 */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 10 10' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='1' cy='1' r='0.5' fill='%23ffffff22' /%3E%3C/svg%3E");
            opacity: 0.3;
            z-index: 0;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            background-color: #ffffff;
        }

        .card-header {
            background-color: #4e73df;
            color: white;
            border-radius: 1rem 1rem 0 0;
            text-align: center;
        }

        .btn-primary-custom {
            background-color: #4e73df;
            border-color: #4e73df;
            font-size: 0.875rem;
            padding: 0.6rem 1.2rem;
            text-transform: uppercase;
            font-weight: bold;
        }

        .btn-primary-custom:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header py-4">
                        <h3><i class="bi bi-mortarboard-fill me-2"></i> Aplikasi Siswa</h3>
                    </div>
                    <div class="card-body text-center">
                        <p class="mb-4">Selamat datang! Kelola data siswa dengan mudah, cepat, dan aman.</p>
                        <a href="{{ url('/sesi') }}" class="btn btn-primary-custom">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
