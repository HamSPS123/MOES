<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/icon.ico') }}" type="image/x-icon">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Style - Tailwind Css and DaisyUI -->
    <link rel="stylesheet" href="{{ asset('css/font-face.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/landing.js') }}" defer></script>

    <!-- Ionic Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>

    <style>
        @media screen and (min-width: 720px) {
            .flex-2 {
                flex-basis: 100% !important;
            }
        }
    </style>
</head>

<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    @stack('modals')

    @livewireScripts
</body>

</html>
