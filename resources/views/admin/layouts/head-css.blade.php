{{-- @yield('css') --}}
<!-- Layout config Js -->
<script src="{{ asset('build/js/layout.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ asset('build/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Sweetalert2 Css -->
<link href="{{ asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('build/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ asset('build/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@yield('css')
