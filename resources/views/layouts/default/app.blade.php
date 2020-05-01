<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @include('layouts.default.include.css')
</head>
<body>
    <div id="app">
       @include('layouts.admin_layout.admin_header')
        <main class="py-4">
            @yield('content')
        </main>

    </div>
</body>
</html>
