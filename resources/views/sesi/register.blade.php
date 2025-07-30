<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset("template/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset("template/css/sb-admin-2.min.css")}}" rel="stylesheet">

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

    body {
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(to bottom, #0D1B2A, #1B263B, #5D3FD3);


        min-height: 100vh;
        margin: 0;
        padding: 0;
    }

    .register-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
        min-height: 100vh;
    }

    .register-box {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        max-width: 1000px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
    }

    .form-side,
    .image-side {
        flex: 1 1 50%;
        padding: 40px;
    }

    .form-side {
        background-color: #ffffff;
    }

    .form-side h2 {
        font-weight: 700;
        color: #333;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #ccc;
    }

    .btn-primary {
        border-radius: 10px;
        font-weight: 600;
    }

    .image-side {
        background: url("{{ asset('fotot/animasi2.gif') }}") no-repeat center center;
        background-size: cover;
    }

    @media (max-width: 768px) {

        .form-side,
        .image-side {
            flex: 1 1 100%;
            padding: 30px;
        }

        .image-side {
            height: 200px;
        }
    }
</style>

<body>


    <div class="register-wrapper">
        <div class="register-box">
            <div class="form-side">
                <h2 class="mb-4">Daftar Akun</h2>
                <form action="/sesi/create" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" value="{{ Session::get('name') }}" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                    <p class="mt-3 text-center">
                        Sudah punya akun?
                        <a href="{{ url('/sesi') }}">Login di sini</a>
                    </p>
                </form>
            </div>
            <div class="image-side"></div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset("template/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{ asset("template/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset("template/vendor/jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset("template/js/sb-admin-2.min.js")}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset("templatevendor/chart.js/Chart.min.js")}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset(path: "template/demo/chart-area-demo.js")}}"></script>
    <script src="{{ asset("template/js/demo/chart-pie-demo.js")}}"></script>
</body>

</html>