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

                    @if (isAdminPermitted('users_manage'))
                        <li class="{{ request()->is('admin/users') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.allUsers') }}" class="waves-effect">
                                <i class="bx bx-group"></i>
                                <span key="t-chat">Users</span>
                            </a>
                        </li>
                    @endif
                    @if (isAdminPermitted('admins_manage'))
                        <li class="{{ request()->is('admin/admins') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.allAdmins') }}" class="waves-effect">
                                <i class="bx bx-group"></i>
                                <span key="t-chat">Admins</span>
                            </a>
                        </li>
                    @endif
                    
                    {{-- <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-share-alt"></i>
                            <span key="t-multi-level">Multi Level</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="javascript: void(0);" key="t-level-1-1">Users</a></li>
                            <li><a href="javascript: void(0);" key="t-level-1-1">Level 1.1</a></li>
                        </ul>
                    </li> --}}

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
</div>
