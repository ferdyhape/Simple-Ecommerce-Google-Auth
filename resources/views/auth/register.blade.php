@extends('layouts.auth.master')
@section('title', 'Register')
@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card border-0 shadow-2-strong bg-light" style="border-radius: 1rem;">
                    <div class="card-body p-5">
                        <h3 class="text-center">Register</h3>
                        <div class="my-5 text-center">
                            <i class="fa-solid fa-user-plus fa-6x" id="icon-login-register"></i>
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
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    placeholder="Password">
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
                        <p class="mt-3 mb-0 text-center">Already Have An Account? <a href="{{ url('login') }}"
                                class="fw-semibold">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
