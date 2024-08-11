@extends('layouts.main')
@section('content')
<div class="container d-flex align-items-center min-vh-100">
    <div class="row justify-content-center w-100">
        <h1 class="display-4 text-center mb-5 fw-semibold">Perpustakaan Digital</h1>
        <div class="col-md-6">
            @if (session()->has('status'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <span style="overflow-wrap: break-word">{!! session('status') !!}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="POST" action="/login">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>
                    
                    <div class="form-group text-center">
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection