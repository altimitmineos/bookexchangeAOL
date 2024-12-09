<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Akun</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="register-container row mx-auto">
        <!-- Left Side (Image) -->
        <div class="col-md-6 register-left">
            <img src="{{ asset('images/4957136.jpg') }}" alt="Illustration">
        </div>

        <!-- Right Side (Form) -->
        <div class="col-md-6 register-right">
            <h4 class="mb-4">Masuk ke Akun bookexchange</h4>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan kata sandi">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
            <p class="footer-text text-center">
                Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
            </p>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
