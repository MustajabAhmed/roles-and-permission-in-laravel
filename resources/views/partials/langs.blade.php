<div class="dropdown ms-1 topbar-head-dropdown header-item">
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="{{ asset('build/images/flags/'.LaravelLocalization::getCurrentLocale().'.svg') }}" class="me-2 rounded" height="20" alt="Header Language">
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                <img src="{{ asset('build/images/flags/'.$localeCode.'.svg') }}" alt="lang-{{ $localeCode }}" class="me-2 rounded" height="20">
                <span class="align-middle">{{ $properties['native'] }}</span>
            </a>
        @endforeach
    </div>
</div>