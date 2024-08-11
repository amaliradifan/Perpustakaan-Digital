@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        .image-container {
            height: 100%;
            /* Ubah tinggi sesuai kebutuhan */
            overflow: hidden;
            /* Menyembunyikan bagian gambar yang berlebih */
        }

        .image-container img {
            width: 300px;
            /* Mengisi lebar */
            height: auto;
            /* Mempertahankan rasio aspek */
            object-fit: cover;
            /* Memastikan gambar menutupi area */
        }
    </style>

    <div class="container">
        @if (session()->has('status'))
            <div class="alert alert-danger alert-dismissible fade show px-4" role="alert">
                <span style="overflow-wrap: break-word">{!! session('status') !!}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h3 class="card-title mb-3">{{ $book->title }}</h3>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="image-container text-center">
                            <img src="{{ asset('/storage/' . $book->cover) }}" class="img-fluid" alt="Rounded Chair">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Book description</h4>
                        <p>{{ $book->description }}</p>
                        <h2 class="mt-5 mb-3">
                            <small class="text-success">{{ $book->quantity }}</small> Books Available
                        </h2>
                        @if (Auth::user()->role == 'admin' || $book->uploader_id == Auth::user()->id)
                        <a href="{{ route('download.file', $book->file) }}" class="btn btn-dark btn-rounded mr-1">
                            Download File
                        </a>
                        <button class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Delete
                        </button>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-primary">Edit</a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are You Sure Want To Delete This Book?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
