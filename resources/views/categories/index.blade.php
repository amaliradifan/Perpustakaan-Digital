@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Categories</h1>
        @if (session()->has('status'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <span style="overflow-wrap: break-word">{!! session('status') !!}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('errorDelete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span style="overflow-wrap: break-word">{!! session('errorDelete') !!}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Auth::user()->role == 'admin')
            <div class="mb-3 px-4">
                <button id="toggleForm" class="btn btn-primary">Add New Category</button>
            </div>
            <div id="categoryForm" class="mb-3 px-4" style="display: none;">
                <form action="/categories" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        @endif

        <div class="row">
            @if (Auth::user()->role == 'admin')
                @foreach ($categories as $category)
                    <div class="col-md-6 mb-3">
                        <div class="shadow p-3 bg-body-tertiary rounded d-flex justify-content-between align-items-center">
                            <a href={{ "/books?category=$category->name" }} class="category-name"
                                id="category-name-{{ $category->id }}">{{ $category->name }}</a>

                            <div>
                                <button class="btn btn-warning btn-sm edit-button"
                                    data-id="{{ $category->id }}">Edit</button>
                                <form action="/categories/{{ $category->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div id="edit-form-{{ $category->id }}" class="edit-form" style="display: none;">
                            <form action="/categories/{{ $category->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                                        required>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach ($categories as $category)
                    <div class="col-md-6 mb-3">
                        <a href={{ "/books?category=$category->name" }}>
                            <div class="shadow p-3 bg-body-tertiary rounded">
                                <h3 class="text-center">{{ $category->name }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

    <script>
        document.getElementById('toggleForm').addEventListener('click', function() {
            var form = document.getElementById('categoryForm');
            form.style.display = form.style.display === 'none' || form.style.display === '' ? 'block' : 'none';
        });

        const editButtons = document.querySelectorAll('.edit-button');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.getAttribute('data-id');
                const nameDisplay = document.getElementById(`category-name-${categoryId}`);
                const editForm = document.getElementById(`edit-form-${categoryId}`);
                const isEditing = editForm.style.display === 'block';

                document.querySelectorAll('.edit-form').forEach(form => {
                    form.style.display = 'none';
                });

                editForm.style.display = isEditing ? 'none' : 'block';
                nameDisplay.style.display = isEditing ? 'inline' : 'none';
            });
        });
    </script>
@endsection
