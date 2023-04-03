@extends('auth.partials.master')
@section('content')
    <div class="container-fluid"
        style="background-image: url('/bg/bg.png');
        background-size: cover; background-position: center; min-height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div style="background-color: #0C121E; min-height: 100vh;">
                    <center>
                        <img src="{{ asset('logo/pokersocial.png') }}" class="d-inline-block align-top mt-5 mb-5"
                            style=" height: 50px;" alt="">
                    </center>
                    <div class="card-body justify-content-center align-items-center mt-5 mx-auto">
                        <div>
                            <h3 class="text-center mb-5"
                                style="font-family: 'Russo One', sans-serif; font-size: 1.5rem; color: #fff;">
                                Login</h3>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger mx-lg-5 px-lg-5" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login.post') }}" class="w-100" style="color: #fff;">
                            @csrf

                            <div class="row mb-3 px-lg-5">
                                <div class="px-lg-5">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row mb-3 px-lg-5">
                                <div class="px-lg-5">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="px-lg-5 ">
                                <div class="row mb-3">
                                    <div class=" justify-content-between d-flex px-lg-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        <div>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}"
                                                    style="color: #fff; font-size: 0.8rem; font-weight: 600; text-decoration: none; font-family: 'Poppins', sans-serif;">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row mb-0 px-lg-5">
                                <div class="col-md-12 px-lg-5">
                                    <button type="submit" class="w-100"
                                        style="background: transparent linear-gradient(180deg, #008CF3 0%, #11224A 100%) 0% 0% no-repeat padding-box; border: none; border-radius: 5px; color: #fff; font-size: 1rem; font-weight: 600; padding: 0.5rem 1rem;">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="row mb-0 px-lg-5">
                                <div class="col-md-12 px-lg-5 text-center">
                                    <p style="font-size: 0.8rem; font-weight: 600; font-family: 'Poppins', sans-serif;">
                                        Don't have an account?
                                        <a href="{{ route('register') }}" class="text-center"
                                            style="color: #3ABEFE; font-size: 0.8rem; font-weight: 600; text-decoration: none; font-family: 'Poppins', sans-serif;">
                                            {{ __('Register') }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
