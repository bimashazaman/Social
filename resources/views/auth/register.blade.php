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
                    <div class="card-body justify-content-center align-items-center mt-3 mx-auto">
                        <div>
                            <h3 class="text-center mb-5"
                                style="font-family: 'Russo One', sans-serif; font-size: 1.5rem; color: #fff;">
                                Register
                            </h3>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger mx-lg-5 px-lg-5" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row  px-lg-5">

                                <div class="px-lg-5 m-2">
                                    <input
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  px-lg-5">
                                <div class="px-lg-5 m-2">
                                    <input
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  px-lg-5">
                                <div class="px-lg-5 m-2">
                                    <input
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username"
                                        placeholder="Username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  px-lg-5">
                                <div class="px-lg-5 m-2">
                                    <input
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        id="phone" type="text"
                                        class="form-control @error('phone') is
                                        -invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                        placeholder="Phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  px-lg-5">
                                <div class="px-lg-5 m-2">
                                    <input
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" placeholder="Address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  px-lg-5">
                                <div class="px-lg-5 m-2">
                                    <input
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        id="age" type="text"
                                        class="form-control @error('age') is
                                            -invalid @enderror"
                                        name="age" value="{{ old('age') }}" required autocomplete="age"
                                        placeholder="Age">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  px-lg-5">
                                <div class="px-lg-5 m-2">
                                    <input
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        id="gender" type="text"
                                        class="form-control @error('gender') is-invalid @enderror" name="gender"
                                        value="{{ old('gender') }}" required autocomplete="gender" placeholder="Gender">

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  px-lg-5">


                                <div class="px-lg-5 m-2">
                                    <input
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  px-lg-5">
                                <div class="px-lg-5 m-2">
                                    <input
                                        style='background-color: #0C121E; border-top: none; border-bottom:#fff 1px solid; border-left: none; border-right: none; color: #fff;'
                                        id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirm Password">
                                </div>
                            </div>
                            <br>
                            <div class="row mb-0 px-lg-5">
                                <div class="col-md-12 px-lg-5">
                                    <button type="submit" class="w-100"
                                        style="background: transparent linear-gradient(180deg, #008CF3 0%, #11224A 100%) 0% 0% no-repeat padding-box; border: none; border-radius: 5px; color: #fff; font-size: 1rem; font-weight: 600; padding: 0.5rem 1rem;">
                                        {{ __('Signup') }}
                                    </button>
                                </div>
                            </div>
                            <div class="row mb-0 px-lg-5">
                                <div class="col-md-12 px-lg-5 text-center">
                                    <p
                                        style="font-size: 0.8rem; font-weight: 600; font-family: 'Poppins', sans-serif; color: #fff;">
                                        Already have an account?
                                        <a href="{{ route('login') }}" class="text-center"
                                            style="color: #3ABEFE; font-size: 0.8rem; font-weight: 600; text-decoration: none; font-family: 'Poppins', sans-serif;">
                                            {{ __('Login') }}
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
