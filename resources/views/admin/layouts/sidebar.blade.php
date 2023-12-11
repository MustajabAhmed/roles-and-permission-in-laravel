<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admin.index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/samsung.png') }}" alt="{{ __('loading') }}" height="16">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/samsung.png') }}" alt="{{ __('loading') }}" height="16">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/samsung.png') }}" alt="{{ __('loading') }}" height="16">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/samsung.png') }}" alt="{{ __('loading') }}" height="16">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>{{ __('Menu') }}</span></li>
                <x-menu-item title="Dashboard" route="admin.index" icon="aperture" />

                <li class="menu-title"><span>{{ __('Customer Management') }}</span></li>
                <x-menu-item title="Users" route="admin.users.index" icon="group" />

                <li class="menu-title"><span>{{ __('SaaS Management') }}</span></li>
                {{-- <x-menu-item title="Categories" route="admin.categories.index" icon="shopping-bag" />
                <x-menu-item title="All Plans" route="admin.plans.index" icon="shopping-bag" />
                <x-menu-item title="Services" route="admin.services.index" icon="laptop" />
                <x-menu-item title="Orders" route="admin.orders.index" icon="shopping-bag" />
                <x-menu-item title="Coupons" route="admin.coupons.index" icon="gift" /> --}}

                <li class="menu-title"><span>{{ __('CMS Management') }}</span></li>
                {{-- <x-menu-item title="Categories" route="admin.blog-categories.index" icon="shopping-bag" />
                <x-menu-item title="Posts" route="admin.blog-posts.index" icon="laptop" /> --}}

                <li class="menu-title"><span>{{ __('API Management') }}</span></li>
                {{-- <x-menu-item title="Tablets" route="admin.tablets.index" icon="laptop" />
                <x-menu-item title="Brands" route="admin.brands.index" icon="laptop" />
                <x-menu-item title="Help Texts" route="admin.help-texts.index" icon="laptop" /> --}}

                <li class="menu-title"><span>{{ __('Settings') }}</span></li>
                {{-- <x-menu-item title="General Settings" route="admin.settings.general" icon="cog" />
                <x-menu-item title="Pages" route="admin.pages.index" icon="cog" />
                <x-menu-item title="Faq Categories" route="admin.faq-categories.index" icon="home" />
                <x-menu-item title="Faqs" route="admin.faqs.index" icon="home" /> --}}

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('admin/translations') }}">
                        <i class="bx bx-globe-alt"></i> <span>{{ __('Localization') }}</span>
                    </a>
                </li>

                {{-- Only developer access --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('admin/logs') }}">
                        <i class="bx bx-file"></i> <span>{{ __('Logs') }}</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
