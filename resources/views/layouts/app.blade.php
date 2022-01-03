<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-profil.css')}}" rel="stylesheet">
</head>
<body>
<header>
    @include('layouts.header')
</header>


<div id="main">
    @yield('content')
</div>
<!-- Scripts -->
<footer>
    @include('layouts.footer')
</footer>
</body>
</html>
