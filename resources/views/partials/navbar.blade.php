        <nav class="navbar navbar-expand-md navbar-light  shadow-sm position-fixed top-0 w-100"
            style="background-color: #071f31; color: #fff; z-index: 1000;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('logo/pokersocial.png') }}" class="d-inline-block align-top" style=" height: 50px;"
                        alt="">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <ul class="navbar-nav me-auto justify-content-around w-100">
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class=" text-decoration-none">
                                <i style=" color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top: 10px;"
                                    class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('friends') }} class=" text-decoration-none">
                                <i style=" color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top: 10px;"
                                    class="fas fa-user-friends"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" class=" text-decoration-none">
                                <i style=" color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top: 10px;"
                                    class="fas fa-bell"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ url('chatify') }} class=" text-decoration-none">
                                <i style=" color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top: 10px;"
                                    class="fas fa-envelope"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" class=" text-decoration-none">
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
                            <form action="{{ route('search-friends') }}" method="GET" class="d-flex">
                                <input type="text" class="form-control" placeholder="Search"
                                    style="width: 250px; background-color: #0E121C; color: #fff; border: none; border-radius: 20px; height: 45px;"
                                    name="search">
                                <i class="fas fa-search"
                                    style="color: #fff; font-size: 20px; margin-left: 10px; cursor: pointer; margin-top:10px"></i>
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
