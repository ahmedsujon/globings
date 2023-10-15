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
                            <a href="{{ route('app.recent-photos') }}">
                                <img src="{{ asset('assets/app/icons/manage_icon2.svg') }}" alt="manage icon" />
                                <h5>Recent photos</h5>
                                <img src="{{ asset('assets/app/icons/profile_right_arrow.svg') }}" alt="right icon" />
                            </a>
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
    <!-- My Place Modal  -->
    <div class="sing_modal_area" id="placeModalArea">
        <div class="container">
            <div class="my_place_modal">
                <div class="bing_back_area">
                    <div class="container">
                        <div class="d-flex align-items-center flex-wrap g-xl">
                            <button type="button" class="close_btn" id="placeCloseBtn">
                                <img src="{{ asset('assets/app/icons/coain_back_icon.svg') }}" alt="back icon" />
                            </button>
                            <h4 class="notification_title">My places</h4>
                        </div>
                    </div>
                </div>
                <form action="" class="post_search_form place_search_form">
                    <input type="search" placeholder="Search Map" />
                    <img src="{{ asset('assets/app/icons/post_search_icon.svg') }}" alt="search icon" class="search_icon" />
                </form>
            </div>
        </div>
        <!-- Company Map Area  -->

        <section class="company_map_wrapper place_map_wrapper">
            <div class="map_area">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.9730352447!2d90.33728817432475!3d23.780818635510663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1695448421480!5m2!1sbn!2sbd"
                    style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="map_slider_area" id="mapSliderArea">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slider_item">
                                <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="slidr image" class="slider_img" />
                                <h4>Hair Cut - Barber</h4>
                                <div class="star_area">
                                    <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                                    <span>4.5</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider_item">
                                <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="slidr image" class="slider_img" />
                                <h4>Hair Cut - Barber</h4>
                                <div class="star_area">
                                    <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                                    <span>4.5</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider_item">
                                <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="slidr image" class="slider_img" />
                                <h4>Hair Cut - Barber</h4>
                                <div class="star_area">
                                    <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                                    <span>4.5</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider_item">
                                <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="slidr image" class="slider_img" />
                                <h4>Hair Cut - Barber</h4>
                                <div class="star_area">
                                    <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                                    <span>4.5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>