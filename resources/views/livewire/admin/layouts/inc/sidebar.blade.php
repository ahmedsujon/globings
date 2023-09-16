<div>
    <div class="leftside-menu">

        <!-- Brand Logo Light -->
        <a href="index.html" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ asset('assets/admin/images/logo.png') }}" alt="logo">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="small logo">
            </span>
        </a>

        <!-- Brand Logo Dark -->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-lg">
                <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="dark logo">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="small logo">
            </span>
        </a>

        <!-- Sidebar Hover Menu Toggle Button -->
        <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
            <i class="ri-checkbox-blank-circle-line align-middle"></i>
        </div>

        <!-- Full Sidebar Menu Close Button -->
        <div class="button-close-fullsidebar">
            <i class="ri-close-fill align-middle"></i>
        </div>

        <div class="h-100" id="leftside-menu-container" data-simplebar>
            <!-- Leftbar User -->
            <div class="leftbar-user">
                <a href="pages-profile.html">
                    <img src="{{ asset('assets/admin/images/users/avatar-1.jpg') }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
                    <span class="leftbar-user-name mt-2">Tosha Minner</span>
                </a>
            </div>

            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title">Navigation</li>

                <li class="side-nav-item">
                    <a href="apps-calendar.html" class="side-nav-link">
                        <i class="ri-home-4-line"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                        <i class="ri-share-line"></i>
                        <span> Multi Level </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMultiLevel">
                        <ul class="side-nav-second-level">
                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel">
                                    <span> Second Level </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarSecondLevel">
                                    <ul class="side-nav-third-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Item 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel">
                                    <span> Third Level </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarThirdLevel">
                                    <ul class="side-nav-third-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false" aria-controls="sidebarFourthLevel">
                                                <span> Item 2 </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarFourthLevel">
                                                <ul class="side-nav-forth-level">
                                                    <li>
                                                        <a href="javascript: void(0);">Item 2.1</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);">Item 2.2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
