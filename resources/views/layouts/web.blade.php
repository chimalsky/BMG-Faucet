<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <header class="grid-container">
            @include('layouts.header')
            
            @yield('header')
        </header>

        <main class="grid-container">
            @yield('content')
        </main>

        <footer>
            @yield('footer')
        </footer>
    </body>
</html>
