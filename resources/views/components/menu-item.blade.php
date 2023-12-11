<a class="nav-link menu-link {{ $isActive() ? 'active' : '' }}" href="{{ route($route, $id ?? '') }}">
    @if ($icon)
        <i class="bx bx-{{ $icon }}"></i>
    @endif
    <span>{{ __($title) }}</span>
</a>