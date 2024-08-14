<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Redevance Application</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- App Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Navbar Styles */
        .navbar {
            background-color: #2C3E50; /* Dark blue background */
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .navbar-brand img {
            height: 50px; /* Adjust size as needed */
        }
        .navbar .navbar-nav .nav-link {
            color: #FFFFFF; /* White text */
            font-size: 16px;
            padding: 10px 15px;
        }
        .navbar .navbar-nav .nav-link:hover, .navbar .navbar-nav .nav-link:focus {
            background-color: #1A5276; /* Slightly lighter blue for hover */
        }
        .dropdown-menu {
            background-color: #2C3E50; /* Same dark blue for dropdown */
        }
        .dropdown-item {
            color: #FFFFFF; /* White text */
        }
        .dropdown-item:hover {
            background-color: #1A5276; /* Consistent hover effect */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/logo.png" alt="Logo">
                    Redevance
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Optionally add items here -->
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
                            <li class="nav-item"><a class="nav-link" href="{{ route('vol_allft.index') }}">Liste de vols</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('jour123survol.index') }}">Jour 123 survol</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Accueil</a></li>
                            @can('view-manage-users')
                                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            @endcan
                            @can('view-manage-roles')
                                <li class="nav-item"><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                            @endcan
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
