<div>
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Menu</li>

                    <li class="{{ request()->is('admin/dashboard') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboard">Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('admin/categories') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.categories') }}" class="waves-effect">
                            <i class="bx bx-store"></i>
                            <span key="t-dashboard">Category</span>
                        </a>
                    </li>

                    <li class="#">
                        <a href="#" class="waves-effect">
                            <i class="bx bx-store"></i>
                            <span key="t-dashboard">Shops</span>
                        </a>
                    </li>

                    @if (isAdminPermitted('admins_manage'))
                    <li class="{{ request()->is('admin/onboardings') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.onboardings') }}" class="waves-effect">
                            <i class="bx bx-store"></i>
                            <span key="t-dashboard">Onboarding Screens</span>
                        </a>
                    </li>
                    @endif

                    @if (isAdminPermitted('admins_manage'))
                    <li class="{{ request()->is('admin/accounts') ? 'mm-active' : '' }}">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-group"></i>
                            <span key="t-multi-level">Accounts</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ route('admin.private.accounts') }}">Private Account</a></li>
                            <li><a href="{{ route('admin.professional.accounts') }}">Professional Account</a></li>
                        </ul>
                    </li>
                    @endif

                    @if (isAdminPermitted('admins_manage'))
                    <li class="{{ request()->is('admin/admins') ? 'mm-active' : '' }}">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-group"></i>
                            <span key="t-multi-level">User Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ route('admin.allUsers') }}">User</a></li>
                            <li><a href="{{ route('admin.allAdmins') }}">Admin</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
</div>
