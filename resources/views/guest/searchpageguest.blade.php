@extends('layouts.guest')
@section('content')
<div class="container">
    {{-- @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}

    <div class="movies-section">
        <div class="row">
            @foreach ( $books as $book )
            <div class="col-md-2">
                <a href="{{ route('bookdetail-guest', $book->id) }}" class="text-decoration-none">
                    <div class="card">
                        <img src="{{ asset($book->Image) }}" class="card-img-top" alt="{{ $book->Title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->Title }}</h5>
                            <p class="card-text">{{ $book->Author }}</p>
                            <p class="card-text">{{ $book->Cost }}</p>
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