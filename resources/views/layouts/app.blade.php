<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/show.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/create-edit-form.css">
    <link rel="stylesheet" href="/css/packing.css">
    <link rel="stylesheet" href="/css/auth.css">
    <script src="https://kit.fontawesome.com/bd1040f7a7.js" crossorigin="anonymous"></script>

    <title>{{ config('app.name', 'Journey Organizer') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar">
            <a href="{{ url('/home') }}" class="title">Journey Organizer</a>

            <div class="navbar-icon">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button><i class="fa-solid fa-right-from-bracket"></i></button>
                </form>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>