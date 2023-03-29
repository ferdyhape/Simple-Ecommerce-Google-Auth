@extends('layouts.auth.master')
@section('title', 'Login')
@section('content')

    <style>
        .nav-item .active {
            border: 0;
            background-color: #F1EEEE !important;
            border-radius: 10%;
        }

        .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:hover {
            border-radius: 10%;
        }
    </style>
    <section class="ftco-section">
        <div class="container my-5">
            <div class="justify-content-center row">
                <div class="col-lg-5 col-sm-7 px-0">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if ($message = Session::get('LoginFailed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5 col-sm-7 shadow p-5">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs d-flex justify-content-center border-0 gap-2" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Register</button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            <p class="h2 text-center my-4">LOGIN PAGE</p>
                            <div class="login-icon text-center m-0 p-0" style="font-size: 150px;">
                                <i class="fa-solid fa-house-lock text-dark"></i>
                            </div>
                            <form method="POST" action="/login">
                                @csrf
                                <div class="form-group mt-3">
                                    <input type="text" class=" form-control @error('email') is-invalid @enderror"
                                        name="email" required placeholder="Email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <input id="password-field" type="password" class=" form-control" name="password"
                                        required placeholder="Passowrd">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Login</button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <p class="h2 text-center my-4">REGISTER PAGE</p>
                            <div class="login-icon text-center m-0 p-0" style="font-size: 150px;">
                                <i class="fa-solid fa-address-card  text-dark"></i>
                            </div>
                            <form method="POST" action="/register" class="signin-form">
                                @csrf
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" required placeholder="Name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" required placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <input id="password-confirm" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Password Confirm">
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{--  batas  --}}

                </div>
            </div>
        </div>
    </section>
@endsection
