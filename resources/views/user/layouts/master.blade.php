<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="dark" data-sidebar="light"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('user.layouts.head-css')

</head>

@section('body')

<body>
    @show
    <div id="layout-wrapper">
        @include('user.layouts.menu')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('user.layouts.footer')
        </div>
    </div>
    @include('user.layouts.vendor-scripts')
</body>

</html>
