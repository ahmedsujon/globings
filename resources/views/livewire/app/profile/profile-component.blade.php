<div>
    <main>
        <!-- Profile Manage Section  -->
        <section class="profile_manage_wrapper">
            <div class="profile_top_area"
                style="background-image: url({{ asset('assets/app/images/others/profilel_bg.png') }})">
                <div class="container">
                    <div class="d-flex-between">
                        <h4 class="notification_title">Manage Profile</h4>
                        <button type="button" id="settingProfileBtn">
                            <img src="{{ asset('assets/app/icons/settings-white.svg') }}" alt="setting icon" />
                        </button>
                    </div>
                    <div class="user_grid">
                        <div class="img_area">
                            <img src="{{ asset('assets/app/images/others/user_img.png') }}" alt="user image" />
                        </div>
                        <div>
                            <h4>Fouad Zaher</h4>
                            <h5>Entrepreneur, Globings.com</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="number_top_area">
                <div class="container">
                    <div class="number_area d-flex align-items-center flex-wrap g-sm">
                        <img src="{{ asset('assets/app/icons/profile_store_icon.svg') }}" alt="store icon" />
                        <h4>150 Bings</h4>
                    </div>
                </div>
            </div>
            <div class="others_content_area">
                <div class="container">
                    <h4 class="notification_title">Other</h4>
                    <ul class="manage_list">
                        <li>
                            <a href="{{ route('app.recent-posts') }}">
                                <img src="{{ asset('assets/app/icons/manage_icon1.svg') }}" alt="manage icon" />
                                <h5>Recent posts</h5>
                                <img src="{{ asset('assets/app/icons/profile_right_arrow.svg') }}" alt="right icon" />
                            </a>
                        </li>
                        <li>
                            <button type="button" id="recentPhotosModalBtn">
                                <img src="{{ asset('assets/app/icons/manage_icon2.svg') }}" alt="manage icon" />
                                <h5>Recent photos</h5>
                                <img src="{{ asset('assets/app/icons/profile_right_arrow.svg') }}" alt="right icon" />
                            </button>
                        </li>
                        <li>
                            <button type="button" id="placeModalBtn">
                                <img src="{{ asset('assets/app/icons/manage_icon3.svg') }}" alt="manage icon" />
                                <h5>My places</h5>
                                <img src="{{ asset('assets/app/icons/profile_right_arrow.svg') }}" alt="right icon" />
                            </button>
                        </li>
                        <li>
                            <button type="button">
                                <img src="{{ asset('assets/app/icons/manage_icon4.svg') }}" alt="manage icon" />
                                <div>
                                    <h5>Share my profile</h5>
                                    <h6>
                                        Get you
                                        <span class="number_area">
                                            <img src="{{ asset('assets/app/icons/store_green_icon.svg') }}"
                                                alt="store icon" />
                                            <span>150 Bings</span>
                                        </span>
                                        invite bonus!
                                    </h6>
                                </div>
                                <img src="{{ asset('assets/app/icons/profile_right_arrow.svg') }}" alt="right icon" />
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
</div>