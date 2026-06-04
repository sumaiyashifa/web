@extends('layouts.app')

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('asset/images/hero_1.jpg') }}');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Log In</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Log In</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                {{-- <div class="card-header">
                    <h1 class="card-title">Login</h1>
                </div> --}}
                <div class="card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email"
                                @if (Session::has('user_email')) value="{{ Session::get('user_email') }}" @endif
                                class="form-control" id="email" placeholder="name@example.com" autocomplete="off"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password"
                                @if (Session::has('user_password')) value="{{ Session::get('user_password') }}" @endif
                                class="form-control" id="password" autocomplete="new-password" required>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="checkbox">
                            <label for="password" class="form-label">Remember me </label>

                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Login</button>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <a href="{{ route('forgot') }}">Forgot Password?</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
