<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <!-- Menggunakan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/styleV1.css') }}">
</head>

<body>
    <div class="register-container">
        <!-- Kiri (Gambar) -->
        <div class="col-md-6 register-left">
            <img src="{{ asset('images/4957136.jpg') }}" alt="Illustration">
        </div>

        <!-- Kanan (Formulir) -->
        <div class="col-md-6 register-right">
            <h4 class="text-center text-xl font-semibold mb-4">Daftar Akun bookexchange</h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email">
                    @error('email')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama lengkap">
                    @error('name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kata Sandi -->
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Masukkan kata sandi">
                    @error('password')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Konfirmasi Kata Sandi -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Konfirmasi kata sandi">
                </div>

                <!-- Checkbox Persetujuan -->
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms">
                    <label class="form-check-label" for="terms">
                        Dengan mendaftar, kamu menyetujui <a href="#">Kebijakan Privasi</a> bookexchange.
                    </label>
                </div>

                <!-- Tombol Daftar -->
                <button type="submit" class="btn btn-primary w-100">
                    Daftar
                </button>
            </form>

            <!-- Tautan ke Halaman Login -->
            <p class="text-center mt-3">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none text-primary">Masuk</a>
            </p>
        </div>
    </div>
</body>

</html>
