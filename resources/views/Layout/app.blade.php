<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Ariana Martín Martínez">

        <link rel="shortcut icon" href="{{asset('img/icon.png')}}" type="image/x-icon">

        <title>Job Searching App</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div id="app">
            <x-header />

            <main>
                @yield('content')
            </main>

            <x-footer />
        </div>
    </body>
</html>