@extends('admin.admin')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow card">
                    <div class="text-white card-header bg-dark">
                        <h4 class="mb-0">Add New Book</h4>
                    </div>
                    <div class="card-body">
                        <form action="/store-book" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="Category" class="form-label">Category</label>
                                <select class="form-select" aria-label="Default select example" name="CategoryName">
                                    <option value="0">--Select a Category--</option>
                                  @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->CategoryName}}</option>
                                  @endforeach
                                </select>
                                @error('Category')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control @error('Image') is-invalid @enderror" type="file" id="formFile" name="Image">
                                @error('Image')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="Title" class="form-label">Book Title</label>
                                <input type="text" class="form-control @error('Title') is-invalid @enderror"  
                                    id="Title" name="Title" value="{{old('Title')}}" 
                                    placeholder="Enter movie title">
                                @error('title')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Publication Date</label>
                                <input type="date" value="{{old('PubDate')}}" class="form-control @error('PublicationDate') is-invalid @enderror" id="exampleInputPassword1" name="PubDate">
                                @error('publish_date')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Author</label>
                                <input type="text" value="{{old('Author')}}" class="form-control @error('Author') is-invalid @enderror" id="exampleInputPassword1" name="Author">
                                @error('Author')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">ISBN</label>
                                <input type="text" value="{{old('ISBN')}}" class="form-control @error('ISBN') is-invalid @enderror" id="exampleInputPassword1" name="ISBN">
                                @error('ISBN')
                                <div class="alert alert-danger"role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Publisher</label>
                                <input type="text" value="{{old('Publisher')}}" class="form-control @error('Publisher') is-invalid @enderror" id="exampleInputPassword1" name="Publisher">
                                @error('Publisher')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Print Weight</label>
                                <input type="number" value="{{old('PrintWeight')}}" class="form-control @error('PrintWeight') is-invalid @enderror" id="exampleInputPassword1" name="PrintWeight">
                                @error('PrintWeight')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Print Width</label>
                                <input type="number" value="{{old('PrintWidth')}}" class="form-control @error('PrintWidth') is-invalid @enderror" id="exampleInputPassword1" name="PrintWidth">
                                @error('PrintWidth')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Print Length</label>
                                <input type="number" value="{{old('PrintLength')}}" class="form-control @error('PrintLength') is-invalid @enderror" id="exampleInputPassword1" name="PrintLength">
                                @error('PrintLength')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Stock</label>
                                <input type="number" value="{{old('Stock')}}" class="form-control @error('Stock') is-invalid @enderror" id="exampleInputPassword1" name="Stock">
                                @error('Stock')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Publisher</label>
                                <input type="text" value="{{old('Publisher')}}" class="form-control @error('Publisher') is-invalid @enderror" id="exampleInputPassword1" name="Publisher">
                                @error('Publisher')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Cost</label>
                                <input type="text" value="{{old('Cost')}}" class="form-control @error('Cost') is-invalid @enderror" id="exampleInputPassword1" name="Cost">
                                @error('Cost')
                                <div class="alert alert-danger" role="alert">{{$message}}</div>
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