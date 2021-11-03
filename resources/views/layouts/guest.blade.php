<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('bootstrap5/bootstrap-icons/bootstrap-icons.css')}}">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-dark bg-dark p-0 pb-0 fixed-top">
        <div class="container">
            <a href="{{route('dashboard')}}" class="navbar-brand">G-Warka</a>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item navbar-text">
                            <a href="{{ url('/dashboard') }}" class="nav-link"> 
                                Dashboard
                            </a>
                        </li>
                    @else
                        <li class="nav-item navbar-text">
                            <a href="{{ route('login') }}" class="nav-link"> 
                                Log In
                            </a>
                        </li>
                        <li class="nav-item navbar-text">
                            <a href="{{ route('register') }}" class="nav-link"> 
                                Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        @include('section.footer')
    </body>
</html>
