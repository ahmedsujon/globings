<div>
    @if (request()->is('home'))
        <!-- Profile Modal  -->
        <div class="sing_modal_area profile_modal_area " id="profileModalArea">
            <div class="container">
                <div class="profile_modal_header">
                    <button type="button" class="back_btn" id="profileHideModal">
                        <img src="{{ asset('assets/app/icons/profile_back.svg') }}" alt="back icon" />
                    </button>
                    <h4 class="notification_title">Profile View</h4>
                </div>
                <div class="cover_img mt-24">
                    <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="cover image" />
                </div>
                <div class="user_img_area">
                    <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="user image" />
                </div>
                <div class="user_info">
                    <h4 class="notification_title">Fouad Zahaer</h4>
                    <h5>@Fouad2042</h5>
                </div>
                <div class="user_location_info">
                    <h3>Entrepreneur, Globings.com</h3>
                    <div class="location_outer_grid">
                        <div class="location_grid">
                            <img src="{{ asset('assets/app/icons/calendar.svg') }}" alt="calender" />
                            <h4 class="location_title">Joined August 2022</h4>
                        </div>
                        <div class="location_grid">
                            <img src="{{ asset('assets/app/icons/location.svg') }}" alt="calender" />
                            <h4 class="location_title">Soignies, Belgium</h4>
                        </div>
                    </div>
                    <div class="message_btn_grid d-flex align-items-center flex-wrap">
                        <button type="button" class="message_btn follow_btn">
                            Following
                        </button>
                        <a href="#" class="message_btn">Send Message</a>
                    </div>
                </div>
                <!-- Post Home Section  -->
                <section class="post_home_wrapper" id="homePostArea">
                    <div class="container">
                        <div class="post_grid">
                            <div class="hash_area">
                                <div class="hash_icon">
                                    <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                                    <h4>Bruxelles</h4>
                                </div>
                                <div class="middle_bar"></div>
                                <button type="button" class="post_user_area">
                                    <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="" class="user_img" />
                                    <h5>Le Fuse</h5>
                                </button>
                            </div>
                            <div class="post_area">
                                <div class="swiper post_slider1">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="action_area d-flex align-items-center flex-wrap">
                                    <button type="button" class="heart_icon" id="heartIcon">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                                                stroke="#F73636" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button type="button"
                                        class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
                                        <img src="{{ asset('assets/app/icons/comment_icon.svg') }}" alt="comment icon" />
                                        <h5>Comment</h5>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="post_grid">
                            <div class="hash_area">
                                <div class="hash_icon">
                                    <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                                    <h4>Bruxelles</h4>
                                </div>
                                <div class="middle_bar"></div>
                                <button type="button" class="post_user_area">
                                    <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="" class="user_img" />
                                    <h5>Le Fuse</h5>
                                </button>
                            </div>
                            <div class="post_area">
                                <div class="swiper post_slider2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="action_area d-flex align-items-center flex-wrap">
                                    <button type="button" class="heart_icon" id="heartIcon">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                                                stroke="#F73636" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button type="button"
                                        class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
                                        <img src="{{ asset('assets/app/icons/comment_icon.svg') }}" alt="comment icon" />
                                        <h5>Comment</h5>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="post_grid">
                            <div class="hash_area">
                                <div class="hash_icon">
                                    <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                                    <h4>Bruxelles</h4>
                                </div>
                                <div class="middle_bar"></div>
                                <button type="button" class="post_user_area">
                                    <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="" class="user_img" />
                                    <h5>Le Fuse</h5>
                                </button>
                            </div>
                            <div class="post_area">
                                <div class="swiper post_slider1">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="action_area d-flex align-items-center flex-wrap">
                                    <button type="button" class="heart_icon" id="heartIcon">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                                                stroke="#F73636" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button type="button"
                                        class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
                                        <img src="{{ asset('assets/app/icons/comment_icon.svg') }}" alt="comment icon" />
                                        <h5>Comment</h5>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="post_grid">
                            <div class="hash_area">
                                <div class="hash_icon">
                                    <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                                    <h4>Bruxelles</h4>
                                </div>
                                <div class="middle_bar"></div>
                                <button type="button" class="post_user_area">
                                    <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="" class="user_img" />
                                    <h5>Le Fuse</h5>
                                </button>
                            </div>
                            <div class="post_area">
                                <div class="swiper post_slider2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider_img">
                                                <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="post image" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="action_area d-flex align-items-center flex-wrap">
                                    <button type="button" class="heart_icon" id="heartIcon">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                                                stroke="#F73636" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button type="button"
                                        class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
                                        <img src="{{ asset('assets/app/icons/comment_icon.svg') }}" alt="comment icon" />
                                        <h5>Comment</h5>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endif

    <!-- Mobile Menu  -->
    @if (!(request()->is('/') || request()->is('login')))
        <section class="mobile_menu_wrapper" id="mobileMenuWrapper">
            <div class="container position-relative">
                <ul class="top_mobile_menu_list">
                    <li>
                        <a href="#">
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
                            <a href="#" class="active_mobile_menu">
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
            <!-- <svg
            width="375"
            height="70"
            viewBox="0 0 375 70"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="shape_svg"
            >
            <path
                d="M146.343 0H0L2.23517e-05 70H375L375 0H227.657C220.667 0 215 5.6666 215 12.6567V25C215 40.464 202.464 53 187 53C171.536 53 159 40.464 159 25V12.6567C159 5.6666 153.333 0 146.343 0Z"
                fill="white"
            />
            </svg> -->
            <img src="{{ asset('assets/app/images/others/menu_shape.png') }}" alt="menu shape" class="shape_svg" />
            <!-- <svg
            width="375"
            height="76"
            viewBox="0 0 375 76"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="shape_svg"
            >
            <g filter="url(#filter0_d_2210_2533)">
                <path
                d="M146.343 6H0L2.23517e-05 76H375L375 6H227.657C220.667 6 215 11.6666 215 18.6567V31C215 46.464 202.464 59 187 59C171.536 59 159 46.464 159 31V18.6567C159 11.6666 153.333 6 146.343 6Z"
                fill="white"
                />
            </g>
            <defs>
                <filter
                id="filter0_d_2210_2533"
                x="-4"
                y="0"
                width="383"
                height="78"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
                >
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feColorMatrix
                    in="SourceAlpha"
                    type="matrix"
                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    result="hardAlpha"
                />
                <feOffset dy="-2" />
                <feGaussianBlur stdDeviation="2" />
                <feComposite in2="hardAlpha" operator="out" />
                <feColorMatrix
                    type="matrix"
                    values="0 0 0 0 0.608333 0 0 0 0 0.557639 0 0 0 0 0.557639 0 0 0 0.25 0"
                />
                <feBlend
                    mode="normal"
                    in2="BackgroundImageFix"
                    result="effect1_dropShadow_2210_2533"
                />
                <feBlend
                    mode="normal"
                    in="SourceGraphic"
                    in2="effect1_dropShadow_2210_2533"
                    result="shape"
                />
                </filter>
            </defs>
            </svg> -->
        </section>
        <div class="overlay" id="mobileMenuOverlay"></div>
    @endif
</div>
