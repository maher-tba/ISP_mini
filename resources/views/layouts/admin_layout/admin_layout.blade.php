<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

{{--###################### start style ######################--}}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme adminLTE Template style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    {{--   #################### start include additional style for each page ####################--}}
    @yield('styles')
    {{--   #################### end include additional style for each page ####################--}}
    <link rel="stylesheet" href="{{asset('css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

{{--###################### end style ######################--}}

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div id="app">
    @include('layouts.admin_layout.admin_header')
{{--   #################### start Auth when login ####################--}}
    @auth
        @include('partial.sidebar')
    @endauth
{{--   #################### end Auth when login ####################--}}

    <main class="py-4">
{{--        @include('partial.alerts')--}}
        @include('sweetalert::alert')
        @yield('content')
    </main>
</div>
{{--   #################### start script ####################--}}
    @include('layouts.include.admin_scripts')
{{--   #################### start include additional js for each page ####################--}}
    @yield('footer_js')
{{--   #################### end include additional js for each page ####################--}}
{{--   #################### end script ####################--}}

</body>
</html>
