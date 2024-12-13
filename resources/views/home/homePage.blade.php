@extends('home.user')
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
