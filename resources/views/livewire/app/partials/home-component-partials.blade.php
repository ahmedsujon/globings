<div>
    <!-- Mobile Menu  -->
    @if (!request()->is('scanner'))
        <section class="mobile_menu_wrapper" id="mobileMenuWrapper">
            <div class="top_bar_area" id="topListArea">
                <div class="container position-relative">
                    <ul class="top_mobile_menu_list">
                        <li>
                            <a href="{{ route('app.events') }}">
                                <img src="{{ asset('assets/app/icons/footer_top_menu_icon11.svg') }}"
                                    alt="footer menu icon " />
                                <span class="text">Events</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('app.map.view') }}">
                                <img src="{{ asset('assets/app/icons/footer_top_menu_icon2.svg') }}"
                                    alt="footer menu icon " />
                                <span class="text">Explorer</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('app.scanner') }}" class="scan_btn">
                                <img src="{{ asset('assets/app/icons/footer_top_menu_icon3.svg') }}"
                                    alt="footer menu icon " />
                                <span class="text">Scanner</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('app.profile') }}">
                                <img src="{{ asset('assets/app/icons/footer_top_menu_icon4.svg') }}"
                                    alt="footer menu icon " />
                                <span class="text">Invite</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('app.profile') }}">
                                <img src="{{ asset('assets/app/icons/footer_top_menu_icon5.svg') }}"
                                    alt="footer menu icon " />
                                <span class="text">Options</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="list_area">
                <div class="container">
                    <ul class="menu_list">
                        <li>
                            <a href="{{ route('app.home') }}"
                                class="{{ request()->is('/') ? 'active_mobile_menu' : '' }}">
                                <div class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2482_1984)">
                                            <path
                                                d="M19 11.75H19.0002C19.3156 11.7499 19.6193 11.869 19.8506 12.0834C20.0784 12.2947 20.2193 12.5832 20.246 12.8924L20.25 13.0125V19V19.0002C20.2501 19.3156 20.131 19.6193 19.9166 19.8506C19.7053 20.0784 19.4168 20.2193 19.1076 20.246L18.9875 20.25H15H14.9998C14.6844 20.2501 14.3807 20.131 14.1494 19.9166C13.9216 19.7053 13.7807 19.4168 13.754 19.1075L13.75 18.9875V13V12.9998C13.7499 12.6844 13.869 12.3807 14.0834 12.1494C14.2947 11.9216 14.5832 11.7807 14.8925 11.754L15.0125 11.75H19ZM9 15.75C9.33152 15.75 9.64946 15.8817 9.88388 16.1161C10.1183 16.3505 10.25 16.6685 10.25 17V19C10.25 19.3315 10.1183 19.6495 9.88388 19.8839C9.64946 20.1183 9.33152 20.25 9 20.25H5C4.66848 20.25 4.35054 20.1183 4.11612 19.8839C3.8817 19.6495 3.75 19.3315 3.75 19V17C3.75 16.6685 3.8817 16.3505 4.11612 16.1161C4.35054 15.8817 4.66848 15.75 5 15.75H9ZM9 3.75C9.33152 3.75 9.64946 3.8817 9.88388 4.11612C10.1183 4.35054 10.25 4.66848 10.25 5V11C10.25 11.3315 10.1183 11.6495 9.88388 11.8839C9.64946 12.1183 9.33152 12.25 9 12.25H5C4.66848 12.25 4.35054 12.1183 4.11612 11.8839C3.8817 11.6495 3.75 11.3315 3.75 11V5C3.75 4.66848 3.8817 4.35054 4.11612 4.11612C4.35054 3.8817 4.66848 3.75 5 3.75H9ZM19 3.75C19.3315 3.75 19.6495 3.8817 19.8839 4.11612C20.1183 4.35054 20.25 4.66848 20.25 5V7C20.25 7.33152 20.1183 7.64946 19.8839 7.88388C19.6495 8.1183 19.3315 8.25 19 8.25H15C14.6685 8.25 14.3505 8.1183 14.1161 7.88388C13.8817 7.64946 13.75 7.33152 13.75 7V5C13.75 4.66848 13.8817 4.35054 14.1161 4.11612C14.3505 3.8817 14.6685 3.75 15 3.75H19Z"
                                                stroke-width="1.5" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2482_1984">
                                                <rect width="24" height="24" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <span class="label_name">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('app.shops') }}"
                                class="{{ request()->is('shops') ? 'active_mobile_menu' : '' }}">
                                <div class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15 21V15.6C15 15.0399 15 14.7599 14.891 14.546C14.7951 14.3578 14.6422 14.2049 14.454 14.109C14.2401 14 13.9601 14 13.4 14H10.6C10.0399 14 9.75992 14 9.54601 14.109C9.35785 14.2049 9.20487 14.3578 9.10899 14.546C9 14.7599 9 15.0399 9 15.6V21M3 7C3 8.65685 4.34315 10 6 10C7.65685 10 9 8.65685 9 7C9 8.65685 10.3431 10 12 10C13.6569 10 15 8.65685 15 7C15 8.65685 16.3431 10 18 10C19.6569 10 21 8.65685 21 7M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V6.2C21 5.0799 21 4.51984 20.782 4.09202C20.5903 3.71569 20.2843 3.40973 19.908 3.21799C19.4802 3 18.9201 3 17.8 3H6.2C5.0799 3 4.51984 3 4.09202 3.21799C3.71569 3.40973 3.40973 3.71569 3.21799 4.09202C3 4.51984 3 5.07989 3 6.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <span class="label_name">Shop</span>
                            </a>
                        </li>
                        <li>
                            <div class="outline_shape">
                                <button type="button" class="home_menu_btn" id="homeMenuBtn">
                                    <img src="{{ asset('assets/app/icons/footer_active_icon_icon3.svg') }}"
                                        alt="menu icon" class="active_home__icon" />
                                    <img src="{{ asset('assets/app/icons/logo_menu_shape.svg') }}" alt="menu icon"
                                        class="inactive_home_icon" />
                                </button>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('app.bings') }}"
                                class="{{ request()->is('bings') ? 'active_mobile_menu' : '' }}">
                                <div class="icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" stroke="currentColor"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 11H11.9231C13.2825 11 14.3846 9.88071 14.3846 8.5C14.3846 7.11929 13.2825 6 11.9231 6H7V11ZM7 11H12.5385C13.8979 11 15 12.1193 15 13.5C15 14.8807 13.8979 16 12.5385 16H7V11Z"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <rect x="1" y="1" width="20" height="20" rx="4" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <span class="label_name">Bings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('app.profile') }}"
                                class="{{ request()->is('profile') ? 'active_mobile_menu' : '' }}">
                                <div class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 21C20 19.6044 20 18.9067 19.8278 18.3389C19.44 17.0605 18.4395 16.06 17.1611 15.6722C16.5933 15.5 15.8956 15.5 14.5 15.5H9.5C8.10444 15.5 7.40665 15.5 6.83886 15.6722C5.56045 16.06 4.56004 17.0605 4.17224 18.3389C4 18.9067 4 19.6044 4 21M16.5 7.5C16.5 9.98528 14.4853 12 12 12C9.51472 12 7.5 9.98528 7.5 7.5C7.5 5.01472 9.51472 3 12 3C14.4853 3 16.5 5.01472 16.5 7.5Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <span class="label_name">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <img src="{{ asset('assets/app/images/others/menu_shape.png') }}" alt="" class="shape_svg" />
        </section>
    @endif
</div>
