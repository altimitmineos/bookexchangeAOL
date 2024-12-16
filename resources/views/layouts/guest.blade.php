<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookExchange</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesbookdetail.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Urbanist' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: ;
            color: #727C9E !important;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }

        footer {
            background-color: #D4D7D9;
            color: black;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .main-content {
            min-height: calc(100vh - 200px);
        }

        .nav-item-icon{
            margin-top: 10px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .nav-item{
            margin-left:20px;
            margin-right:20px;
        }

    </style>
</head>
<body>
    <nav class="mb-4 bg-white navbar navbar-expand-lg navbar-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                bookexchange.com
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <form class="d-flex" action="{{ route('guestsearch') }}" method="GET">
                        <input class="text me-2" name="search" placeholder="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    <li class="nav-item">
                        <a class="nav-link" href="">Category</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-outline-primary" type="login">Login</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">
        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>bookexchange</h5>
                    <p>The largest, most complete and most trusted online bookstore in Indonesia</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Follow Us</h5>
                    <div class="social-links">
                        <a href="#" class="text-black me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-black me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-black"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4">
            <div class="text-center">
                <p>&copy; 2024 PT bookexchange</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>