<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SISWA - Login</title>

    <!-- Custom fonts and styles -->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(to bottom, #A18CD1 0%, #C1DFCB 100%);
        min-height: 100vh;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
        min-height: 100vh;
    }

    .login-box {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 1000px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 1s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-side, .image-side {
        flex: 1 1 50%;
        padding: 40px;
    }

    .form-side h2 {
        font-weight: 700;
        color: #4b3869;
    }

    .form-label {
        font-weight: 600;
        color: #444;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #7a63b9;
        box-shadow: 0 0 8px rgba(122, 99, 185, 0.3);
    }

    .btn-primary {
        background-color: #7a63b9;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #5d4a99;
        transform: scale(1.03);
    }

    .image-side {
        background: url("{{ asset('fotot/gabut4.jpeg') }}") no-repeat center center;
        background-size: cover;
    }

    @media (max-width: 768px) {
        .form-side, .image-side {
            flex: 1 1 100%;
            padding: 30px;
        }

        .image-side {
            height: 200px;
        }
    }
</style>


<body>

    <div class="login-wrapper">
        <div class="login-box">
            <!-- Form Side -->
            <div class="form-side">
                <h2 class="mb-4">Login</h2>
                <form action="/sesi/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3 d-grid">
                        <button name="submit" type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                    <p class="mt-3 text-center">
                        Belum punya akun? <a href="{{ url('/sesi/register') }}" class="text-primary">Register di sini</a>
                    </p>
                </form>
            </div>

            <!-- Image Side -->
            <div class="image-side"></div>
        </div>
    </div>

</body>
</html>
