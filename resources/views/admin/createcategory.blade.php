@extends('admin.admin')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow card">
                    <div class="text-white card-header bg-dark">
                        <h4 class="mb-0">Add New Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="/store-category" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="Category" class="form-label">Category</label>
                                <input type="text" class="form-control @error('CategoryName') is-invalid @enderror" id="exampleInputPassword1" name="CategoryName">
                                @error('CategoryName')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="gap-2 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Save Book
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Home
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
