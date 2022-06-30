<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Style - Tailwind Css and DaisyUI -->
    <link rel="stylesheet" href="{{ asset('css/font-face.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>

    <!-- Ionic Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>


    <!-- Summernote -->
    {{-- <link href="{{ asset('js/summernote/summernote-lite.min.css') }}" rel="stylesheet"> --}}
    <script src="{{asset('js/summernote/jquery-3.4.1.slim.min.js')}}"></script>
    <link href="{{asset('js/summernote/summernote-lite.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/summernote/summernote-lite.min.js')}}"></script>


    <style>
        .container-fluid {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>

<body class="bg-slate-100">
    @include('partials.admin-navbar')
    @include('partials.admin-sidebar')

    <main class="h-full ml-64 admin-content transition-[margin] ease-in-out delay-150">
        <div class="py-4 container-fluid">
            @yield('content')
        </div>
    </main>

    @stack('modals')

    @livewireScripts


    <!-- Sweetalert -->

    <script src="{{ asset('vendor/livewire-alert/sweetalert2.js') }}"></script>

    <x-livewire-alert::scripts />

    {{-- <script src="{{ asset('js/summernote/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/summernote/summernote-lite.min.js') }}"></script> --}}

    @stack('scripts')
</body>

</html>
