<div>
    <button type="button" class="mobile_menu_close" id="mobileMenuClose">
        <img src="{{ asset('assets/app/icons/menu_close_icon.svg') }}" alt="close icon" />
    </button>

    <!-- Home  Section  -->
    <header class="home_header_wrapper mt-24">
        <div class="container">
            <div class="d-flex-between">
                <a href="#" class="logo">
                    <img src="{{ asset('assets/app/images/header/header_logo.svg') }}" alt="logo" />
                </a>
                <ul class="header_right_list d-flex align-items-center justify-content-end flex-wrap">
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/app/icons/heart.svg') }}" alt="heart icon" />
                        </a>
                    </li>
                    <li>
                        <a href="#" class="header_number_area">
                            <span class="circle_shape"></span>
                            <span class="number">60</span>
                            <img src="{{ asset('assets/app/icons/header_right_logo_icon.svg') }}" alt="plus icon" class="right_shape" />
                        </a>
                    </li>
                </ul>
            </div>
            <form action="" class="header_search">
                <input type="text" placeholder="Search" />
                <button class="search_icon" type="submit">
                    <img src="{{ asset('assets/app/icons/search-lg.svg') }}" alt="search icon" />
                </button>
                <button class="filter_icon" type="button">
                    <img src="{{ asset('assets/app/icons/filter_icon.svg') }}" alt="filter icon" />
                </button>
            </form>
        </div>
    </header>
    <!-- Category Slider Section  -->
    <section class="category_slider_area" id="headerCategorySlider">
        <div class="container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#" class="category_item">
                            <img src="{{ asset('assets/app/icons/category_icon1.svg') }}" alt="category icon" />
                            <h4>Hairdressing</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="category_item">
                            <img src="{{ asset('assets/app/icons/category_icon2.svg') }}" alt="category icon" />
                            <h4>Grocery</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="category_item">
                            <img src="{{ asset('assets/app/icons/category_icon3.svg') }}" alt="category icon" />
                            <h4>Cafe Bar</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="category_item">
                            <img src="{{ asset('assets/app/icons/category_icon4.svg') }}" alt="category icon" />
                            <h4>Butcher's shop</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="category_item">
                            <img src="{{ asset('assets/app/icons/category_icon5.svg') }}" alt="category icon" />
                            <h4>Fish shop</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="category_item">
                            <img src="{{ asset('assets/app/icons/category_icon1.svg') }}" alt="category icon" />
                            <h4>Hairdressing</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="category_item">
                            <img src="{{ asset('assets/app/icons/category_icon2.svg') }}" alt="category icon" />
                            <h4>Grocery</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="category_item">
                            <img src="{{ asset('assets/app/icons/category_icon3.svg') }}" alt="category icon" />
                            <h4>Cafe Bar</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="category_item">
                            <img src="{{ asset('assets/app/icons/category_icon4.svg') }}" alt="category icon" />
                            <h4>Butcher's shop</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="category_item">
                            <img src="{{ asset('assets/app/icons/category_icon5.svg') }}" alt="category icon" />
                            <h4>Fish shop</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                    <button type="button" class="post_user_area postUserBtn">
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
                        <button type="button" class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
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
                    <button type="button" class="post_user_area postUserBtn">
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
                        <button type="button" class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
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
                    <button type="button" class="post_user_area postUserBtn">
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
                        <button type="button" class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
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
                    <button type="button" class="post_user_area postUserBtn">
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
                        <button type="button" class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
                            <img src="{{ asset('assets/app/icons/comment_icon.svg') }}" alt="comment icon" />
                            <h5>Comment</h5>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
