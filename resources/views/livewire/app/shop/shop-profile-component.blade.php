<div>
    <section class="company_preview_wrapper mt-24">
        <div class="container">
            <div class="d-flex-between">
                <h4 class="notification_title">Preview</h4>
                <button type="button" class="bookmarkIcon">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.6296 3.45753C15.2465 3.07428 14.7917 2.77026 14.2911 2.56284C13.7905 2.35542 13.254 2.24866 12.7121 2.24866C12.1702 2.24866 11.6337 2.35542 11.1331 2.56284C10.6325 2.77026 10.1777 3.07428 9.7946 3.45753L8.9996 4.25253L8.2046 3.45753C7.43083 2.68376 6.38138 2.24906 5.2871 2.24906C4.19283 2.24906 3.14337 2.68376 2.3696 3.45753C1.59583 4.2313 1.16113 5.28075 1.16113 6.37503C1.16113 7.4693 1.59583 8.51876 2.3696 9.29253L3.1646 10.0875L8.9996 15.9225L14.8346 10.0875L15.6296 9.29253C16.0128 8.90946 16.3169 8.45464 16.5243 7.95404C16.7317 7.45345 16.8385 6.91689 16.8385 6.37503C16.8385 5.83316 16.7317 5.2966 16.5243 4.79601C16.3169 4.29542 16.0128 3.84059 15.6296 3.45753V3.45753Z"
                            stroke="#1C293E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="slider_area" wire:ignore id="companySliderArea">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($shop->cover_photos as $cover_photo)
                            <div class="swiper-slide">
                                <div class="slider_img">
                                    <img src="{{ asset($cover_photo) }}" alt="" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="post_info_list d-flex align-items-center flex-wrap g-xl">
                <div class="list_item d-flex align-items-center flex-wrap">
                    <h4>Joined:</h4>
                    <h5>{{ Carbon\Carbon::parse($shop->created_at)->format('F d, Y') }}</h5>
                </div>
                <div class="list_item d-flex align-items-center flex-wrap">
                    <h4>Views:</h4>
                    <h5>{{ $shop->visited }}</h5>
                </div>
            </div>
            <h2 class="company_title">{{ $shop->name }}</h2>
            <ul class="star_list company_bottom_border d-flex align-items-center flex-wrap">
                <li>
                    <img src="{{ asset('assets/app/icons/star_fill.svg') }}" alt="star icon" />
                </li>
                <li>
                    <img src="{{ asset('assets/app/icons/star_fill.svg') }}" alt="star icon" />
                </li>
                <li>
                    <img src="{{ asset('assets/app/icons/star_fill.svg') }}" alt="star icon" />
                </li>
                <li>
                    <img src="{{ asset('assets/app/icons/star_blank.svg') }}" alt="star icon" />
                </li>
                <li>
                    <img src="{{ asset('assets/app/icons/star_blank.svg') }}" alt="star icon" />
                </li>
                <li class="review_text">3.0 <span>(123 reviews)</span></li>
            </ul>
            <div class="description_area company_bottom_border">
                <h4 class="notification_title">Description</h4>
                <p>
                    {{ $shop->description }}
                </p>
            </div>
            <div class="dealer_area company_bottom_border">
                <button type="button" class="user_img_area" id="dealerProfileBtn">
                    <img src="{{ asset(getUserByID($shop->user_id)->avatar) }}" alt="user image" class="user_img" />
                    <div>
                        <div class="dealer">Dealer</div>
                        <h5 class="sub_login">{{ getUserByID($shop->user_id)->first_name }} {{ getUserByID($shop->user_id)->last_name }}</h5>
                    </div>
                </button>
            </div>
            <div class="location_area company_bottom_border">
                <h4 class="notification_title">Location</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.9730352447!2d90.33728817432475!3d23.780818635510663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1695448421480!5m2!1sbn!2sbd" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="location_grid">
                    <img src="{{ asset('assets/app/icons/location.svg') }}" alt="location icon" />
                    <h5>{{ $shop->address }}</h5>
                </div>
            </div>
            <form action="" class="contact_form_area company_bottom_border">
                <h4 class="notification_title">Contact</h4>
                <div class="input_row">
                    <input type="text" class="input_item" placeholder="Name" />
                </div>
                <div class="input_row">
                    <input type="email" class="input_item" placeholder="E-mail" />
                </div>
                <div class="input_row">
                    <input type="number" class="input_item" placeholder="Phone Number" />
                </div>
                <button type="submit" class="login_btn login_btn_fill">
                    Send Message
                </button>
            </form>
            <div class="review_area company_bottom_border">
                <h4>Write a Review</h4>
                <div class="review_list_area">
                    <div class="list_item d-flex-between">
                        <h5>On time</h5>
                        <div class="start_list d-flex align-items-center flex-wrap">
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_blank.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_blank.svg') }}" alt="star icon" />
                        </div>
                    </div>
                    <div class="list_item d-flex-between">
                        <h5>Amenities</h5>
                        <div class="start_list d-flex align-items-center flex-wrap">
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_blank.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_blank.svg') }}" alt="star icon" />
                        </div>
                    </div>
                    <div class="list_item d-flex-between">
                        <h5>Cleanliness</h5>
                        <div class="start_list d-flex align-items-center flex-wrap">
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_blank.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_blank.svg') }}" alt="star icon" />
                        </div>
                    </div>
                    <div class="list_item d-flex-between">
                        <h5>Overall experience</h5>
                        <div class="start_list d-flex align-items-center flex-wrap">
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                            <img src="{{ asset('assets/app/icons/star_orange_fill.svg') }}" alt="star icon" />
                        </div>
                    </div>
                </div>
            </div>
            <form action="" class="contact_form_area company_bottom_border">
                <h4 class="sub_login">Comments *</h4>
                <div class="input_row">
                    <textarea name="" id="" cols="30" rows="5" placeholder="your comment...."
                        class="input_item"></textarea>
                </div>

                <button type="submit" class="login_btn login_btn_fill">
                    Submit Review
                </button>
            </form>
        </div>
    </section>
</div>
