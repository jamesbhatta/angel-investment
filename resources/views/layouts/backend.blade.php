<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ siteName() }}</title>

    <link rel="shortcut icon" href="/backend/images/favicon.svg" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/backend/css/bootstrap.css">
    <link rel="stylesheet" href="/backend/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/backend/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/backend/css/app.css">
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}

    @stack('styles')

</head>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <x-backend-sidebar></x-backend-sidebar>
        </div>
        <div id="main">
            <div style="min-height: 90vh;">
                <x-alert></x-alert>
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                @yield('content')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ date('Y') }} &copy; {{ siteName() }}</p>
                    </div>
                    <div class="float-end">
                        <p> Powered by <a href="http://ahmadsaugi.com">Digital Terai</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{-- <script src="{{ asset('js/custom.js') }}" defer></script> --}} --}}
    <script src="/backend/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/backend/vendors/jquery/jquery.min.js"></script>
    <script src="/backend/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    <script src="/backend/js/main.js"></script>
    @stack('scripts')
</body>
</html>
