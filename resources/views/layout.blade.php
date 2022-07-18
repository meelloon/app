<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://unpkg.com/vue@3"></script>
        <script src="{{ url('js/form.js?' . filemtime('js/form.js')) }}"></script>
        <script src="{{ url('js/list.js?' . filemtime('js/list.js')) }}"></script>

    </head>

    <body>

        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cars.index') }}">Zoznam aut</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cars.create') }}">Pridať auto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('parts.index') }}">Zoznam dielov</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('parts.create') }}">Pridať diel</a>
            </li>
        </ul>

        @yield('main')

    </body>

</html>
