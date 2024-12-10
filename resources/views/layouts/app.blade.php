<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Toko Buku</title>  
    @vite('resources/css/app.css')  
    @vite('resources/js/app.js')  
    
    {{-- Bootstrap CSS --}}  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>  
<body>  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">  
        <div class="container">  
             
            <div class="navbar-nav">  
                 
                {{-- Tambahkan menu lain --}}  
            </div>  
        </div>  
    </nav>  

    @yield('content')  

    {{-- Bootstrap JS --}}  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>