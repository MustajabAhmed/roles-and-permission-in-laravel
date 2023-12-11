<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('user.index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/samsung.png') }}" alt="{{ __('loading') }}" height="16">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/samsung.png') }}" alt="{{ __('loading') }}" height="16">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('user.index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/samsung.png') }}" alt="{{ __('loading') }}" height="16">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/samsung.png') }}" alt="{{ __('loading') }}" height="16">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>{{ __('Menu') }}</span></li>
                {{-- <a class="nav-link menu-link" href="{{ route('user.index') }}">
                    <i class="bx bx-aperture"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a> --}}
                <x-menu-item title="Dashboard" route="user.index" icon="aperture" />
                <x-menu-item title="Profile" route="user.profiles.index" icon="cog" />
                {{-- <x-menu-item title="My eSIMs" route="customer.services.index" icon="laptop" />
                <x-menu-item title="Payment History" route="customer.payments.history" icon="dollar" />
                <x-menu-item title="Account Settings" route="customer.settings.index" icon="cog" /> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
