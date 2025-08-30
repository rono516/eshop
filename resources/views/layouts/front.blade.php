<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>


    {{-- <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet"> --}}

    {{-- @vite(['vite/frontend/css/custom.css', 'vite/frontend/css/bootstrap5.css', 'vite/frontend/css/owl.carousel.min.css', 'vite/frontend/css/owl.theme.default.min.css', 'vite/frontend/js/custom.js', 'vite/frontend/js/owl.carousel.min.js', 'vite/frontend/js/bootstrap.bundle.min.js', 'vite/frontend/js/jquery-3.6.0.min.js']) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">


    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    {{-- google font-awesome> --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

    <style>
        a {
            text-decoration: none !important;
        }
    </style>

</head>

<body>
    @include('layouts.inc.frontnavbar')

    {{-- <div class="content"> --}}
        @yield('content')
    {{-- </div> --}}

    {{-- <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script> --}}

    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- @if (session('status')) --}}

    {{-- <script>
            swal({
                title: "Success!",
                text: "{{ session('status') }}",
                icon: "success",
                button: "OK",
            });
        </script> --}}
    {{-- @endif --}}
    {{-- <script src="{{ asset('frontend/js/custom.js') }}"></script> --}}

    @yield('scripts')

</body>

</html>
