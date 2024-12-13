@extends('admin.admin')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Books Section -->
        <div class="movies-section">
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>cover</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>
                                        <img src="{{ asset($book->Image) }}" alt="" width="80px">
                                    </td>
                                    <td>{{$book->Title}}</td>
                                    <td>{{$book->category->CategoryName}}</td>
                                    <td>{{$book->Cost }}</td>
                                    <td><a class="btn btn-outline-dark" href="{{ route('bookdetail', ['book'=>$book->id]) }}">detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$books->links()}} --}}
                </div>
            </div>
        </div>

        {{-- <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{$books->links('pagination::bootstrap-4')}}
        </div> --}}
    </div>
@endsection