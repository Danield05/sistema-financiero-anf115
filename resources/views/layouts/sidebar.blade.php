<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <i class="fas fa-coins app-header-logo" style="font-size: 2.5rem; color: #EC0000;"></i>
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <i class="fas fa-coins" style="font-size: 1.8rem; color: #EC0000;"></i>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
