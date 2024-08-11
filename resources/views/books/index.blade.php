@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection

@section('content')
    <div class="container m-4 mx-auto">
        <h1 class="text-center mb-4">Books</h1>
        @if (session()->has('status'))
            <div class="alert alert-primary alert-dismissible fade show px-4" role="alert">
                <span style="overflow-wrap: break-word">{!! session('status') !!}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mb-3 px-4">
            <select id="category" name="category" class="form-select" onchange="location = this.value;" required>
                <option value="" disabled {{ request()->has('category') ? '' : 'selected' }}>
                    {{ request()->has('category') ? request()->get('category') : 'Select Category' }}
                </option>
                <option value="/books">All Category</option>
                @foreach ($categories as $category)
                    <option value="/books?category={{ $category->name }}"
                        {{ request()->get('category') === $category->name ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

        </div>
        <div class="row px-4">
            @foreach ($books as $book)
                <div class="col-md-3 mb-4"> <!-- Ubah col-md-4 menjadi col-md-3 -->
                    <div class="card" style="width: 100%;"> <!-- Mengubah lebar card menjadi 100% -->
                        <img src="{{ asset("storage/$book->cover") }}" class="card-img-top" alt="{{ $book->title }}"
                            style="max-height: 300px; object-fit: cover; object-position: center;">
                        <div class="card-body">
                            <h5 class="card-title"
                                style="max-height: 4.5em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;">
                                {{ $book->title }}</h5>
                            <p class="card-text"
                                style="max-height: 4.5em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;">
                                {{ $book->description }}
                            </p>
                            @if (Auth::user()->role == 'admin' || $book->uploader_id == Auth::user()->id)
                                <a href="{{ "/books/$book->id" }}" class="btn btn-primary">Detail</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
