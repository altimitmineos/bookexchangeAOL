@extends('admin')
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
            <h2 class="text-center mb-4">Book List</h2>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>cover</th>
                                <th>name</th>
                                <th>category</th>
                                <th>detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>
                                        <img src="{{ asset($book->Image) }}" alt="" width="80px">
                                    </td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->category->name}}</td>
                                    <td><a class="btn btn-outline-dark" href=" ">detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$books->links()}}
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{$books->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection