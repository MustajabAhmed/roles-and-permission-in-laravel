<script src="{{ asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('build/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('build/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('build/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('build/js/plugins.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('build/js/app.js') }}"></script>
@include('partials.alerts')
@yield('js')
@yield('script')
@yield('js-bottom')
@yield('script-bottom')
