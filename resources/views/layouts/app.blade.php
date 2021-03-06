<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ siteName() }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/custom.css') }}?v={{ now() }}" rel="stylesheet">
    <link href="{{ asset('css/line-clamp.css') }}" rel="stylesheet">
    @stack('styles')
    <style>
        @media (max-width: 768px) {
            .user-navbar {
                justify-content: end;
                gap: 10px;
                overflow-x: scroll;
            }

            .user-navbar .nav-item {
                flex-shrink: 0;
            }
        }

    </style>

</head>
<body>
    <div id="app">
        <!-- header -->
        <section class="header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <a href="/" class="navbrand"> <img src="{{ asset('img/logo.png') }}" width="150px" height="90px" alt="{{ siteName() }}"></a>
                    </div>
                    <div class="col-md-6">
                        <div class="wrapper-nav">
                            <div id="toggle" class="button_container">
                                <span class="top"></span>
                                <span class="middle"></span>
                                <span class="bottom"></span>
                            </div>
                            <div id="overlay" class="overlay">
                                <nav class="overlay-menu">
                                    <ul>
                                        @hasrole('admin')
                                        <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-info-circle me-2"></i>Dashboard</a></li>
                                        @endhasrole
                                        <li><a href="{{url('/')}}"><i class="fas fa-home me-2"></i>Home</a></li>
                                        <li><a href="{{url('/about-us')}}"><i class="fas fa-info-circle me-2"></i>About Us</a></li>
                                        {{-- <li><a href="/business-proposals"><i class="fas fa-landmark me-2"></i>Business Proposals</a></li> --}}
                                        <li><a href="{{url('/the-process')}}"><i class="fas fa-landmark me-2"></i>The Process</a></li>
                                        @guest
                                        @if (Route::has('login'))
                                        <li><a href="{{ route('login') }}"><i class="fas fa-user-circle me-2"></i>Login</a></li>
                                        @endif
                                        @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}"><i class="fas fa-sign-in-alt me-2"></i>Sign Up</a></li>
                                        @endif
                                        @else
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        @endguest
                                        <li><a href="{{url('/contact-us')}}"><i class="far fa-address-book me-2"></i>Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- header-end -->

        @auth
        {{-- TODO::Not to show in homepage --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="overflow-x: auto;">
            <div class="container-fluid flex justify-content-end">
                <ul class="user-navbar navbar-nav flex-row">
                    @hasrole('entrepreneur')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><span class="me-2 fas fa-home"></span>My Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-investors"><span class="me-2 fas fa-hand-holding-usd"></span>My Investors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('invoices.index') }}"><i class="me-2 fas fa-file-invoice-dollar"></i>Invoices</a>
                    </li>
                    @endhasrole
                    @hasrole('investor')
                    <li class="nav-item">
                        <a class="nav-link" href="/projects"><span class="me-2 fas fa-home"></span>My Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-investments"><span class="me-2 fas fa-hand-holding-usd"></span>My Investments</a>
                    </li>
                    @endhasrole
                    <li class="nav-item">
                        <a class="nav-link" href="/my-profile"><i class="me-2 fas fa-user"></i>My Profile</a>
                    </li>
                </ul>
            </div>
        </nav>
        @endauth

        <main>
            @yield('content')
        </main>
    </div>

    <x-alert></x-alert>
    @include('layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(document).ready(function () {
            AOS.init({
                once: true
            });
        });
    </script>

    <script src="{{ asset('js/custom.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
