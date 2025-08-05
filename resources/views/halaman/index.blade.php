<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Siswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font Pixel Style -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset('fotot/ini2.jpeg') }}');
 /* Ganti dengan gambar kamu */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            font-family: 'Press Start 2P', cursive;
            color: #ffffff;
            display: flex;
            align-items: center;
        }

        .content {
            max-width: 600px;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.0); /* transparan penuh */
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            font-size: 12px;
            margin-bottom: 30px;
        }

        .btn-custom {
            background-color: #1d3557;
            color: white;
            border: none;
            padding: 10px 25px;
            font-size: 12px;
            text-transform: uppercase;
        }

        .btn-custom:hover {
            background-color: #457b9d;
        }

        @media(max-width: 768px) {
            .content {
                padding: 20px;
            }

            h1 {
                font-size: 18px;
            }

            p {
                font-size: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8 col-lg-6">
                <div class="content">
                    <i class="bi bi-mortarboard-fill display-6 mb-4"></i>
                    <h1>Selamat Datang di Aplikasi Siswa</h1>
                    <p>Kelola data siswa Anda dengan mudah dan aman. Silakan login untuk melanjutkan.</p>
                    <a href="{{ url('/sesi') }}" class="btn btn-custom">Masuk</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
