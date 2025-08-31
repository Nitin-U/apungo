
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('backend.dashboard')}}" class="app-brand-link">
                  <span class="app-brand-logo demo">
                      <img src="{{ $setting_data->logo ?  asset(imagePath($setting_data->logo)) : ''}}" alt="Logo" height="55">
                  </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
        </a>

        {{--can be use to add logic here for minimizing the dashboard sidebar--}}
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Dashboard -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Dashboard</span></li>
        <li class="menu-item {{request()->route()->getName() == 'backend.dashboard' ? 'active':''}}">
            <a href="{{route('backend.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Settings -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">General Setup</span></li>

        @if (auth()->user()->user_type == 'admin')
            <li class="menu-item {{ str_starts_with(request()->route()->getName(), 'backend.general_setup.vendor_management.') ? 'active' : '' }}">
                <a href="{{ route('backend.general_setup.vendor_management.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-store"></i>
                    <div data-i18n="Vendor Management">Vendors</div>
                </a>
            </li>
            <li class="menu-item {{ str_starts_with(request()->route()->getName(), 'backend.general_setup.service_management.') ? 'active' : '' }}">
                <a href="{{ route('backend.general_setup.service_management.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Service Management">Services</div>
                </a>
            </li>
        @endif

        <li class="menu-header small text-uppercase"><span class="menu-header-text">User Setup</span></li>
        @if (auth()->user()->user_type == 'admin')
            <li class="menu-item {{ str_starts_with(request()->route()->getName(), 'backend.user_management.') ? 'active' : '' }}">
                <a href="{{route('backend.user_management.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="User Management">User Management</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
<!-- / Menu -->
