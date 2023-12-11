<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <!-- BOOTSTRAP 5.3.1 -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <!-- GENERAL CSS FILE  -->

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />

    <!-- FONT AWSOME CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('css')

</head>

<body>

    @include('layouts.header')

    @yield('content')

    @hasSection('fully-footer')
        @include('layouts.fully-footer')
    @else
        @include('layouts.footer')
    @endif

    <script src="{{ asset('assets/js/Script.js') }}"></script>

    @yield('js')

</body>

</html>
