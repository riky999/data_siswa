<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aplikasi Siswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .welcome-section {
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .hero-icon {
            font-size: 4rem;
            color: #2575fc;
        }

        .btn-primary {
            background-color: #2575fc;
            border: none;
        }

        .btn-outline-secondary {
            border-color: #2575fc;
            color: #2575fc;
        }

        .btn-outline-secondary:hover {
            background-color: #2575fc;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="text-center mb-5">
            <i class="bi bi-mortarboard-fill hero-icon mb-3"></i>
            <h1 class="display-5 fw-bold text-white">Selamat Datang di Aplikasi Siswa</h1>
            <p class="lead text-white-50">Kelola data siswa Anda dengan mudah dan efisien.</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="welcome-section text-center">
                    <p class="lead mb-4">
                        Aplikasi ini memudahkan Anda untuk mengelola data siswa dengan fitur-fitur unggulan. Daftar sekarang dan nikmati kemudahan pengelolaan!
                    </p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="{{ url('/sesi/register') }}" class="btn btn-primary btn-lg px-4 gap-3">Daftar Sekarang</a>
                        <a href="{{ url('/sesi') }}" class="btn btn-outline-secondary btn-lg px-4">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
