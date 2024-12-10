@extends('layouts.app')  

@section('content')  
<div class="container">  
    <h1>{{ $book->Title }}</h1>  
    <img src="{{ asset($book->Image) }}" alt="{{ $book->Title }}" class="img-fluid">  
    <p><strong>Author:</strong> {{ $book->Author }}</p>  
    <p><strong>Price:</strong> {{ $book->Cost }}</p>  
    <p><strong>Description:</strong> {{ $book->Description }}</p>  
    <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>  
</div>  
@endsection