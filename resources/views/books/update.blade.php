@extends('layouts.main')

@section('navbar')
    @include('partials.navbar')
@endsection

@section('content')
    <div class="container-fluid row mt-4">
        <h1 class="text-center">Edit Book</h1>
        <div class="col-md-6 offset-md-3">
            @if (session()->has('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span style="overflow-wrap: break-word">{{ session('status') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ url("/books/$book->id") }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" required minlength="3" maxlength="255" value="{{ old('title', $book->title) }}" />
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" required value="{{ old('quantity', $book->quantity) }}" />
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category:</label>
                    <select id="category_id" name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="description" name="description" class="form-control" required>{{ old('description', $book->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Upload Cover Image</label>
                    <input class="form-control" type="file" id="cover" name="cover" accept=".jpg,.jpeg,.png" />
                    <small class="text-muted">Leave blank if you do not want to change the cover image.</small>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Upload PDF File</label>
                    <input class="form-control" type="file" id="file" name="file" accept=".pdf" />
                    <small class="text-muted">Leave blank if you do not want to change the PDF file.</small>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Update Book</button>
                </div>
            </form>
        </div>
    </div>
@endsection
