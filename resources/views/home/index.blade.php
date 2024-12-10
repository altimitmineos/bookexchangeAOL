@extends('layouts.app')  
<header class="bg-white shadow-sm">
    <div class="container d-flex justify-content-between align-items-center py-4">
        <div class="d-flex align-items-center">
            <img alt="Book Exchange Logo" class="h-10 w-10" src="https://placehold.co/40x40" />
            <span class="ml-2 fs-4 fw-semibold">bookexchange.com</span>
        </div>
        <div class="d-flex align-items-center">
            <button class="btn btn-outline-secondary me-2">Kategori</button>
            <div class="position-relative">
                <input class="form-control rounded-pill ps-4" placeholder="" type="text"/>
                <i class="fas fa-search position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
            </div>
            <i class="fas fa-shopping-cart ms-3 text-muted"></i>
            <div class="d-flex align-items-center ms-3">
                <img alt="User Avatar" class="h-10 w-10 rounded-circle" src="https://placehold.co/40x40"/>
                <span class="ms-2 text-muted">Hi, Kevin!</span>
            </div>
        </div>
    </div>
    </header>
@section('content')  
    <div class="container">  
        <h2>New Releases</h2>  
        @if($newReleases->count() > 0)  
            <div class="row">  
                @foreach($newReleases as $book)  
                    <div class="col-md-2">  
                        <div class="card">  
                            <img src="{{ asset($book->Image) }}" class="card-img-top" alt="{{ $book->Title }}">  
                            <div class="card-body">  
                                <h5 class="card-title">{{ $book->Title }}</h5>  
                                <p class="card-text">{{ $book->Author }}</p>  
                                <p class="card-text">{{ $book->Cost }}</p>  
                            </div>  
                        </div>  
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
                        <div class="card">  
                            <img src="{{ asset($book->Image) }}" class="card-img-top" alt="{{ $book->Title }}">  
                            <div class="card-body">  
                                <h5 class="card-title">{{ $book->Title }}</h5>  
                                <p class="card-text">{{ $book->Author }}</p>  
                                <p class="card-text">{{ $book->Cost }}</p>  
                            </div>  
                        </div>  
                    </div>  
                @endforeach  
            </div>  
        @else  
            <p>No best sellers available.</p>  
        @endif  
    </div>  
@endsection