@extends('layouts.auth.master')
@section('title', 'Login')
@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card border-0 shadow-2-strong bg-light" style="border-radius: 1rem;">
                    <div class="card-body p-5">
                        <h3 class=" text-center">Login</h3>
                        {{-- <img src="{{ asset('illustration/login.png') }}" class="img-thumbnail border-0" alt=""
                            srcset=""> --}}
                        <div class="my-5 text-center">
                            <i class="fa-solid fa-user-lock fa-6x" id="icon-login-register"></i>
                        </div>
                        <form method="POST" action="/login" class="mb-2">
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
                                <input id="password-field" type="password" class=" form-control" name="password" required
                                    placeholder="Passowrd">
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
                        {{-- <p class="text-center p-0 my-2">Or</p> --}}
                        <a href="{{ url('/login/google') }}" class="btn btn-danger btn-user d-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                        <p class="mt-3 mb-0 text-center">Don't Have An Account? <a href="{{ url('register') }}"
                                class="fw-semibold">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
