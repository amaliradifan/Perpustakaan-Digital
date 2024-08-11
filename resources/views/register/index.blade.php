@extends('layouts.main')
@section('content')
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row justify-content-center w-100">
            <h1 class="display-4 text-center mb-5 fw-semibold">Perpustakaan Digital</h1>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('store') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required>
                                @error('email')
                                    <i class='bx bx-error-circle text-danger element-to-hide'
                                        style="margin-top: 35px; font-size: 13px"></i>
                                    <p class="text-danger me-3 element-to-hide" style="font-size: 13px">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @error('password')
                                    <i class='bx bx-error-circle text-danger element-to-hide'
                                        style="margin-top: 35px; font-size: 13px"></i>
                                    <p class="text-danger me-3 element-to-hide" style="font-size: 13px">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary w-100">Register</button>
                            </div>
                        </form>

                        <div class="form-group text-center">
                            <a href="{{ route('login') }}">Already have an account? Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
