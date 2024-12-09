<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookDetail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('stylesbookdetail.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Urbanist' rel='stylesheet'>
</head>
<body>
    <div class="book-detail">
        <div class="book-image">
            <img src="{{ asset($book->Image) }}" alt="{{ $book->Title }}">
        </div>
        <div class="book-info">
            <p class ="author">{{ $book -> Author }}</p>
            <h1 class ="Title">{{ $book->Title }}</h1>
            <h2>{{ $book -> Cost }}</h2>
            <p><strong>{{ $book->category->CategoryName }}</strong></p>
            <p><strong>Format Buku:</strong> {{ $book->format->FormatName }}</p>

            <h3>Detail Buku</h3>
            <ul>
                <li><strong>Penerbit:</strong> {{ $book->Publisher }}</li>
                <li><strong>ISBN:</strong> {{ $book->ISBN }}</li>
                <li><strong>Tanggal Terbit:</strong> {{ \Carbon\Carbon::parse($book->PublicationDate)->format('d/m/Y') }}</li>
                <li><strong>Berat:</strong> {{ $book->PrintWeight }} kg</li>
                <li><strong>Dimensi:</strong> {{ $book->printWidth }} x {{ $book->printLength }} cm</li>
                <li><strong>Stock:</strong> {{ $book->Stock }}</li>
            </ul>
        </div>
    </div>

</body>
</html>
