<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Klinik Kecantikan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fce4ec;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #ec407a !important;
        }

        .navbar-brand, .nav-link {
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ffebee !important;
        }

        .card {
            background: #ffffff;
            border-radius: 20px;
        }

        .btn-pink {
            background-color: #ec407a;
            border: none;
        }

        .btn-pink:hover {
            background-color: #d81b60;
        }

        h2 {
            color: #d81b60;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Klinik Kecantikan</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('crud.index') }}">Paket Kecantikan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bold text-warning" href="{{ route('logout') }}">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>


<div class="container py-5 text-center">
    <div class="card shadow-lg p-4">
        <h2 class="mb-3">Selamat Datang, {{ session('user') }} 💗</h2>

        <p class="text-muted">
            Anda berhasil masuk ke Dashboard Sistem Klinik Kecantikan.
        </p>

        <a href="{{ route('crud.index') }}" class="btn btn-pink mt-3 px-4 py-2 rounded-3">
            Lihat Data Paket Kecantikan
        </a>
    </div>
</div>

</body>
</html>
