<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-whatever" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar">
            <div class="navbar-brand">
                @auth
                    {{ Auth::user()->isAdmin() ? 'Admin Dashboard' : 'User Dashboard' }}
                @else
                    {{ config('app.name', 'Laravel') }}
                @endauth
            </div>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>

                @auth
                    @if (Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="fa-solid fa-users"></i> Manage Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('assign.index') }}">
                                <i class="fa-solid fa-tasks"></i> Assign Value
                            </a>
                        </li>
                    @elseif(Auth::user()->isClient())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('view.value', Auth::user()->id) }}">
                                <i class="fa-solid fa-eye"></i> View Value
                            </a>
                        </li>
                    @endif
                @else
                    {{-- if the user is not authenticated, show Login & Register --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa-solid fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fa-solid fa-user-plus"></i> Register
                        </a>
                    </li>
                @endauth
            </ul>

            <div class="nav-footer">
                @auth
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="fa-solid fa-user"></i> Profile
                    </a>
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
</body>
</html>
