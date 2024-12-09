@extends('admin.admin')
@section('content')
    <div class="book-detail">
        <div class="book-image">
            <img src="{{ asset($book->Image) }}" alt="{{ $book->Title }}">
        </div>
        <div class="book-info">
            <p class ="author">{{ $book -> Author }}</p>
            <h1 class ="Title">{{ $book->Title }}</h1>
            <h2>{{ $book -> Cost }}</h2>
            <p><strong>{{ $book->category->CategoryName }}</strong></p>
            {{-- <p><strong>Format Buku:</strong> {{ $book->format->FormatName }}</p --}}
            <p class = "formatbuks">Format Buku</p>
            <button type="button" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"></path>
                </svg>
                {{ $book->format->FormatName }}
                </button>
            <h3>Detail Buku</h3>
            {{-- <ul>
                <li><strong>Penerbit:</strong> {{ $book->Publisher }}</li>
                <li><strong>ISBN:</strong> {{ $book->ISBN }}</li>
                <li><strong>Tanggal Terbit:</strong> {{ \Carbon\Carbon::parse($book->PublicationDate)->format('d/m/Y') }}</li>
                <li><strong>Berat:</strong> {{ $book->PrintWeight }}</li>
                <li><strong>Dimensi:</strong> {{ $book->printWidth }} x {{ $book->printLength }}</li>
                <li><strong>Stock:</strong> {{ $book->Stock }}</li>
            </ul> --}}
            <div class="container-love" style = " display: flex;justify-content: space-between;align-items: center;gap: 80px flex-wrap: wrap;">
                <div class="left">
                    <div class="yuhu">
                        <p><strong>Penerbit:</strong></p>
                            {{ $book->Publisher }}
                    </div>
                    <div class="yuhu">
                        <p><strong>ISBN:</strong></p>
                            {{ $book->ISBN }}
                    </div>
                    <div class="yuhu">
                        <p><strong>Tanggal Terbit:</strong></p>
                            {{ \Carbon\Carbon::parse($book->PublicationDate)->format('d/m/Y') }}
                    </div>
                </div>
                <div class="right">
                    <div class="yuhu">
                        <p><strong>Berat:</strong></p>
                            {{ $book->PrintWeight }}
                    </div>
                    <div class="yuhu">
                        <p><strong>Dimensi:</strong></p>
                            {{ $book->printWidth }} x {{ $book->printLength }}
                    </div>
                    <div class="yuhu">
                        <p><strong>Stock:</strong></p>
                            {{ $book->Stock }}
                    </div>
                </div>
            </div>
            <div class="d-grid">
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Home
                </a>
            </div>
        </div>
    </div>
    @endsection
