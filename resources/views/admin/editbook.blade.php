@extends('admin.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow card">
                    <div class="text-white card-header bg-dark">
                        <h4 class="mb-0">Edit Book</h4>
                    </div>
                    <div class="card-body">
                        {{-- Edit Book Form --}}
                        <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Use PUT for updates --}}

                            {{-- Category Dropdown --}}
                            <div class="mb-4">
                                <label for="Category_Id" class="form-label">Category</label>
                                <select class="form-select @error('Category_Id') is-invalid @enderror" name="Category_Id" id="Category_Id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $book->Category_Id ? 'selected' : '' }}>
                                            {{ $category->CategoryName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('Category_Id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Format Dropdown --}}
                            <div class="mb-4">
                                <label for="Format_Id" class="form-label">Format</label>
                                <select class="form-select @error('Format_Id') is-invalid @enderror" name="Format_Id" id="Format_Id" required>
                                    @foreach ($formats as $format)
                                        <option value="{{ $format->id }}" {{ $format->id == $book->Format_Id ? 'selected' : '' }}>
                                            {{ $format->FormatName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('Format_Id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Image Upload --}}
                            <div class="mb-4">
                                <label for="Image" class="form-label">Image</label>
                                <input class="form-control @error('Image') is-invalid @enderror" type="file" id="Image" name="Image">
                                @error('Image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if ($book->Image)
                                    <img src="{{ asset('images/' . $book->Image) }}" alt="Book Image" width="100" class="mt-2">
                                @endif
                            </div>

                            {{-- Book Title --}}
                            <div class="mb-4">
                                <label for="Title" class="form-label">Book Title</label>
                                <input type="text" class="form-control @error('Title') is-invalid @enderror"
                                    id="Title" name="Title" value="{{ old('Title', $book->Title) }}" placeholder="Enter book title" required>
                                @error('Title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Publication Date --}}
                            <div class="mb-4">
                                <label for="PublicationDate" class="form-label">Publication Date</label>
                                <input type="date" class="form-control @error('PublicationDate') is-invalid @enderror"
                                    id="PublicationDate" name="PublicationDate"
                                    value="{{ old('PublicationDate', \Carbon\Carbon::parse($book->PublicationDate)->format('Y-m-d')) }}" required>
                                @error('PublicationDate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Other Fields --}}
                            @php
                                $fields = [
                                    'Author' => 'Author',
                                    'ISBN' => 'ISBN',
                                    'Publisher' => 'Publisher',
                                    'PrintWeight' => 'Print Weight',
                                    'printWidth' => 'Print Width',
                                    'printLength' => 'Print Length',
                                    'Stock' => 'Stock',
                                    'Cost' => 'Cost',
                                    'Page' => 'Page'
                                ];
                            @endphp
                            @foreach ($fields as $field => $label)
                                <div class="mb-4">
                                    <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                    <input type="{{ is_numeric($book->$field) ? 'number' : 'text' }}" 
                                        class="form-control @error($field) is-invalid @enderror"
                                        id="{{ $field }}" name="{{ $field }}" 
                                        value="{{ old($field, $book->$field) }}" required>
                                    @error($field)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach

                            {{-- Submit and Back Buttons --}}
                            <div class="gap-2 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Save Book
                                </button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
