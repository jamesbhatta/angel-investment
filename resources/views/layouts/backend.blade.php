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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('styles')
    <style>
        #page-wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        #sidebar {
            width: 250px;
            position: sticky;
            top: 0;
            height: 100vh;
            background-color: #fff;
            box-shadow: 1px 2px 3px red;
            transition: all 0.3s ease-out;
            z-index: 10;
        }

        #open-sidebar-btn,
        #close-sidebar-btn {
            background-color: transparent;
            border: none;
            display: none;
        }

        #open-sidebar-btn svg,
        #close-sidebar-btn svg {
            display: inline-block;
            height: 1.2rem;
            width: 1.2rem;
            color: #585a65;
        }

        #sidebar .brand-wrapper {
            color: #047bf8;
        }

        #sidebar .brand-wrapper:hover {
            text-decoration: none;
        }

        #sidebar nav {
            padding: 10px 20px 10px 35px;
        }

        #sidebar nav .nav-link {
            color: #48525f;
            font-family: "Poppins", sans-serif;
            font-size: 0.9rem;
            letter-spacing: 0.025em;
            display: flex;
        }

        #sidebar nav .nav-link .nav-icon {
            margin-right: 10px;
            min-width: 20px;
            color: inherit;
            opacity: 0.5;
        }

        #sidebar nav .nav-link .nav-icon svg {
            height: 1rem;
        }

        #sidebar nav .nav-link:hover,
        #sidebar nav .nav-link.active {
            color: #232a50;
            background-color: #edf0ff;
            font-weight: 500;
        }

        #sidebar nav .nav-link.active .nav-icon {
            opacity: 1;
        }

        #main-content {
            flex: 1 1 0;
            width: 100%;
            min-height: 100vh;
            /* max-width: 100vw; */
        }

        /* #navbarNav a.active {
  color: rgba(0, 0, 0, 0.9);
} */
        @media (min-width: 576px) {
            #sidebar {
                height: 100vh;
            }
        }

        @media screen AND (max-width: 1024px) {
            #sidebar {
                transform: translateX(-100%);
                position: fixed;
                inset: 0;
            }

            #sidebar.opened {
                transform: translateX(0);
            }

            #open-sidebar-btn,
            #close-sidebar-btn {
                display: inline-block;
            }
        }

    </style>

</head>
<body>
    <div id="app" class="sidebar-opened">
        <main id="page-wrapper">
            <div id="sidebar" class="shadow-sm d-flex flex-column opened">
                <div class="p-3 d-flex justify-content-between">
                    <a href="/" class="btn btn-link brand-wrapper d-flex align-items-center" style="text-decoration: none;">
                        <img class="brand-logo" src="{{ siteLogoUrl() }}" alt="{{ siteName() }}" height="50px" style="filter: brightness(0);" />
                    </a>
                    <button id="close-sidebar-btn" onclick="closeSidebar()">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <nav class="flex-grow-1">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ setActive('admin.dashboard') }}" href="/admin/dashboard">
                                <span class="nav-icon">
                                </span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ setActive('admin.pitches.*') }}" href="/admin/pitches">
                                <span class="nav-icon">
                                </span>
                                <span>Pitches</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ setActive('backend.countries.*') }}" href="/backend/countries">
                                <span class="nav-icon">
                                </span>
                                <span>Countries</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/home">
                                <span class="nav-icon">
                                </span>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ setActive('backend.settings.*') }}" href="/backend/settings/general">
                                <span class="nav-icon">
                                </span>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('system.logs') }}" target="_blank">
                                <span class="nav-icon"></span>
                                <span>System Logs</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="p-2">
                    <div class="text-center" style="font-size: 0.6rem">Copyright © <script>
                            document.write(new Date().getFullYear())

                        </script> {{ siteName() }}</div>
                </div>
            </div>
            <div id="main-content">
                <div class="bg-white py-3 px-3 d-flex justify-content-between" style="border-bottom: 2px solid #f0f0f2">
                    <div>
                        <button id="open-sidebar-btn" onclick="openSidebar()">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <div class="d-flex align-items-center dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{-- <img :src="profilePictureUrl" :alt="user.first_name" style="height: 1.3rem; width: 1.3rem; border-radius: 2.5rem; object-fit: cover" /> --}}
                                <span class="ml-2 text-capitalize">
                                    <span>{{ auth()->user()->name }}</span>
                                </span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
                                <form id="logout-form" action="/logout" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    @yield('content')
                </div>
            </div>
        </main>
        <x-alert></x-alert>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    @stack('scripts')

    <script>
        function openSidebar() {
            document.getElementById('sidebar').classList.add('opened');
            console.info('sidebar opened');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('opened');
            console.info('sidebar closed');
        }

    </script>
</body>
</html>
