@extends('layouts.main')
@section('content')
    <div>
        <div class="container-fluid pt-5">
            <div class="row mb-4 mb-lg-5 justify-content-lg-between">
                <div class="col-3 col-md-1 col-lg-2 d-none d-md-flex align-items-center">
                    <div class="lc-block bg-dark" style="">
                        <img class="img-fluid" src="{{ asset('/images/cover/mindset.jpg') }}">
                    </div><!-- /lc-block -->
                </div><!-- /col -->
                <div class="col-4 col-md-3 col-lg-2 d-flex flex-column justify-content-between">
                    <div class="lc-block bg-primary ratio ratio-1x1" style="">
                        <img class="img-fluid" src="{{ asset('/images/cover/mollie.png') }}">
                    </div><!-- /lc-block -->
                    <div class="lc-block">
                        <img class="img-fluid" src="{{ asset('/images/cover/filosofi teras.jpeg') }}">
                    </div><!-- /lc-block -->
                </div><!-- /col -->
                <div class="col-4 col-md-4 col-lg-3"> <img class="img-fluid"
                        src="{{ asset('/images/cover/books.jpeg') }}?\" style="object-fit:cover" alt="Photo by Simone Hutsch">
                </div><!-- /col -->
                <div class="col-4 col-md-3 col-lg-2 d-flex flex-column justify-content-between">
                    <div class="lc-block">
                        <img class="img-fluid" src="{{ asset('/images/cover/atomic habits.jpg') }}"
                            alt="Photo by Simone Hutsch">
                    </div><!-- /lc-block -->
                    <div class="lc-block bg-primary ratio ratio-1x1" style="">
                        <img class="img-fluid" src="{{ asset('/images/cover/tintin.jpeg') }}"
                            alt="Photo by Simone Hutsch">
                    </div><!-- /lc-block -->
                </div><!-- /col -->
                <div class="col-3 col-md-1 col-lg-2 d-none d-md-flex  align-items-center">
                    <div class="lc-block bg-dark " style="">
                        <img class="img-fluid" src="{{ asset('/images/cover/the mind.jpg') }}"
                            alt="Photo by Simone Hutsch">
                    </div><!-- /lc-block -->
                </div><!-- /col -->
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="lc-block text-center col-md-8">
                    <div editable="rich">
                        <h1 class="rfs-25 fw-bold">Welcome to Perpustakan Digital.</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="lc-block text-center col-xxl-6 col-md-8">
                    <div editable="rich">
                        <p class="lead">Explore a world of knowledge with our Digital Library – your gateway to endless books, articles, and resources anytime, anywhere.</p>
                    </div>
                </div><!-- /lc-block -->
            </div>
        </div>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <a href="{{route('login')}}" class="btn btn-primary btn-lg me-2 px-4">Login</a>
                    <a href="{{route('register')}}" class="btn btn-outline-secondary btn-lg">Register</a>
                </div>
            </div>
        </div>
    </div>
@endsection
