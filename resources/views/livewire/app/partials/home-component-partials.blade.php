<div>
    <!-- Mobile Menu  -->
    @if (!request()->is('login')))
        <section class="mobile_menu_wrapper" id="mobileMenuWrapper">
            <div class="container position-relative">
                <ul class="top_mobile_menu_list">
                    <li>
                        <a href="{{ route('app.home') }}">
                            <img src="{{ asset('assets/app/icons/footer_top_menu_icon1.svg') }}" alt="footer menu icon " />
                            <span class="text">Bings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/app/icons/footer_top_menu_icon2.svg') }}" alt="footer menu icon " />
                            <span class="text">Explorer</span>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="scan_btn">
                            <img src="{{ asset('assets/app/icons/footer_top_menu_icon3.svg') }}" alt="footer menu icon " />
                            <span class="text">Scanner</span>
                        </button>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/app/icons/footer_top_menu_icon4.svg') }}" alt="footer menu icon " />
                            <span class="text">Friend</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/app/icons/footer_top_menu_icon5.svg') }}" alt="footer menu icon " />
                            <span class="text">Options</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="list_area">
                <div class="container">
                    <ul class="menu_list">
                        <li>
                            <a href="{{ route('app.home') }}" class="active_mobile_menu">
                                <img src="{{ asset('assets/app/icons/footer_active_icon_icon1.svg') }}" alt="menu icon"
                                    class="active_icon" />
                                <img src="{{ asset('assets/app/icons/footer_icon_icon1.svg') }}" alt="menu icon" class="inactive_icon" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/app/icons/footer_icon_icon2.svg') }}" alt="menu icon" class="inactive_icon" />
                            </a>
                        </li>
                        <li>
                            <div class="outline_shape">
                                <button type="button" class="home_menu_btn" id="homeMenuBtn">
                                    <img src="{{ asset('assets/app/icons/footer_active_icon_icon3.svg') }}" alt="menu icon"
                                        class="active_home__icon" />
                                    <img src="{{ asset('assets/app/icons/footer_icon_icon3.svg') }}" alt="menu icon"
                                        class="inactive_home_icon" />
                                </button>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('app.bings') }}">
                                <img src="{{ asset('assets/app/icons/footer_icon_icon4.svg') }}" alt="menu icon" class="inactive_icon" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('app.profile') }}">
                                <img src="{{ asset('assets/app/icons/footer_icon_icon5.svg') }}" alt="menu icon" class="inactive_icon" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <img src="{{ asset('assets/app/images/others/menu_shape.png') }}" alt="" class="shape_svg" />
        </section>
    @endif
</div>
