<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Klinik Kecantikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffdde1 0%, #ee9ca7 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            font-family: "Poppins", sans-serif;
        }

        .card {
            background: #fff;
            border: none;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .btn-pink {
            background-color: #ff7aa2;
            color: white;
            font-weight: 600;
            border-radius: 10px;
        }

        .btn-pink:hover {
            background-color: #ff4d85;
            color: white;
        }

        .form-label {
            font-weight: 600;
            color: #d6336c;
        }

        h4 {
            font-weight: 700;
            color: #d6336c;
        }

        .footer {
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow-lg">
                <div class="card-body">

                    <h4 class="text-center mb-4">Login Admin</h4>

                    @if(session('error'))
                        <div class="alert alert-danger text-center py-2">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-pink w-100">Login</button>
                    </form>

                </div>
            </div>

            <p class="text-center mt-3 footer">© {{ date('Y') }} Klinik Kecantikan</p>
        </div>
    </div>
</div>

</body>
</html>
