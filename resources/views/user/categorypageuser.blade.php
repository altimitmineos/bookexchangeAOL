@extends('layouts.user')
@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2>Categories</h2>
    <div class="mb-3 button-container">
        <a href="{{ route('categoryuser') }}" class="btn btn-outline-dark btn-lg">All</a>
        @foreach ($categories as $category)
            <a href="{{ route('categoryuser' , ['Category_Id'=>$category->id]) }}" class="btn btn-outline-dark btn-lg">{{ $category->CategoryName }}</a>
        @endforeach
    </div>


    {{-- Book List --}}
    <div class="movies-section">
        <div class="row">
            @foreach ( $books as $book )
            <div class="col-md-2">
                <a href="{{ route('bookdetail-user', $book->id) }}" class="text-decoration-none">
                    <div class="card">
                        <img src="{{ asset($book->Image) }}" class="card-img-top" alt="{{ $book->Title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->Title }}</h5>
                            <p class="card-text">{{ $book->Author }}</p>
                            <p class="card-text">Rp{{ number_format($book->Cost, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            {{ $books->links() }}
        </div>
    </div>
</div>

@endsection
