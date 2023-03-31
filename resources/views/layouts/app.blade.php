<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.cdnfonts.com/css/russo-one" rel="stylesheet"> --}}


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm position-fixed top-0 w-100"
            style="background-color: #071f31; color: #fff; z-index: 1000;">
            <div class="container-fluid">
                <img src="{{ asset('logo/pokersocial.png') }}" class="d-inline-block align-top" style=" height: 50px;"
                    alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <ul class="navbar-nav me-auto justify-content-around w-100">
                        <li class="nav-item">
                            <i style=" color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top: 10px;"
                                class="fas fa-home"></i>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i style=" color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top: 10px;"
                                    class="fas fa-user-friends"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i style=" color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top: 10px;"
                                    class="fas fa-bell"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i style=" color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top: 10px;"
                                    class="fas fa-envelope"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i style=" color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top: 10px;"
                                    class="fas fa-cog"></i>
                            </a>
                        </li>
                        <li style=" color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top: 10px;"
                            class="nav-item">
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <input type="text" class="form-control" placeholder="Search"
                                style="width: 250px; background-color: #0E121C; color: #fff; border: none; border-radius: 20px; height: 45px;">
                            <i class="fas fa-search"
                                style="color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top:10px"></i>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="background-color: #0E121C; color: #fff; min-height: 100vh;">
            @include('partials.sidebar')
            @yield('content')
        </main>
    </div>

</body>

</html>
