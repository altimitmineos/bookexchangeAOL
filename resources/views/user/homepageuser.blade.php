@extends('layouts.user')
@section('content')
<div class="container">
    @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif

    <div class="mb-5 text-center hero-section">
        <div class="position-relative">
            <img src= "{{ asset('images/LibraryHero.jpg') }}" alt="Hero" class="rounded shadow img-fluid" style="max-height: 400px; width: 100%; object-fit: cover;">
            <div class="text-white position-absolute top-50 start-50 translate-middle">
                <h1 class="display-4 fw-bold">Welcome to BookExchange</h1>
                <p class="lead">The largest, most complete and most trusted online bookstore in Indonesia</p>
            </div>
        </div>
    </div>
    
    <h2>New Releases ({{ now()->year }})</h2>
    @if($newReleases->count() > 0)
        <div class="row">
            @foreach($newReleases as $book)
                <div class="col-md-2">
                    <a href="{{ route('bookdetail-user', $book->id) }}" class="text-decoration-none">
                    <div class="card">
                        <img src="{{ asset('images/' . $book->Image) }}" class="card-img-top" alt="{{ $book->Title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->Title }}</h5>
                            <p class="card-text">{{ $book->Author }}</p>
                            <p class="card-text">Rp{{ number_format($book->Cost, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p>No new releases available.</p>
    @endif

    <h2>Best Sellers</h2>
    @if($bestSellers->count() > 0)
        <div class="row">
            @foreach($bestSellers as $book)
                <div class="col-md-2">
                    <a href="{{ route('bookdetail', $book->id) }}" class="text-decoration-none">
                    <div class="card">
                        <img src="{{ asset('images/' . $book->Image) }}" class="card-img-top" alt="{{ $book->Title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->Title }}</h5>
                            <p class="card-text">{{ $book->Author }}</p>
                            <p class="card-text">Rp{{ number_format($book->Cost, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p>No best sellers available.</p>
    @endif
</div>
@endsection
