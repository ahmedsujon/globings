<div>
    <style>
        .active_stars {
            color: #000;
        }

        .inactive_stars {
            color: #fff;
        }
    </style>
    <header class="home_header_wrapper mt-24">
        <div class="container">
            <div class="d-flex-between">
                <a href="{{ route('app.home') }}" class="logo">
                    <img src="{{ asset('assets/app/images/header/header_logo.svg') }}" alt="logo" />
                </a>
                <div class="d-flex-between">
                    <button type="button" class="bookmarkIcon {{ shopIsBookmarked($shop->id) ? 'active_bookmark' : '' }}"
                        wire:click.prevent='favorite'>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.6296 3.45753C15.2465 3.07428 14.7917 2.77026 14.2911 2.56284C13.7905 2.35542 13.254 2.24866 12.7121 2.24866C12.1702 2.24866 11.6337 2.35542 11.1331 2.56284C10.6325 2.77026 10.1777 3.07428 9.7946 3.45753L8.9996 4.25253L8.2046 3.45753C7.43083 2.68376 6.38138 2.24906 5.2871 2.24906C4.19283 2.24906 3.14337 2.68376 2.3696 3.45753C1.59583 4.2313 1.16113 5.28075 1.16113 6.37503C1.16113 7.4693 1.59583 8.51876 2.3696 9.29253L3.1646 10.0875L8.9996 15.9225L14.8346 10.0875L15.6296 9.29253C16.0128 8.90946 16.3169 8.45464 16.5243 7.95404C16.7317 7.45345 16.8385 6.91689 16.8385 6.37503C16.8385 5.83316 16.7317 5.2966 16.5243 4.79601C16.3169 4.29542 16.0128 3.84059 15.6296 3.45753V3.45753Z"
                                stroke="#1C293E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <section class="company_preview_wrapper mt-24">
        <div class="container">
            <div class="slider_area" wire:ignore id="companySliderArea">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slider_img">
                                <img src="{{ asset($shop->cover_photo) }}" alt="" />
                            </div>
                        </div>
                    </div>
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
                {!! shop_star_review($shop->id) !!}
                <li class="review_text">{{ avgShopReview($shop->id) }} <span>({{ $total_reviews }} reviews)</span></li>
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
                        <h5 class="sub_login">{{ getUserByID($shop->user_id)->first_name }}
                            {{ getUserByID($shop->user_id)->last_name }}</h5>
                    </div>
                </button>
            </div>
            <div class="location_area company_bottom_border">
                <h4 class="notification_title">Location</h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.9730352447!2d90.33728817432475!3d23.780818635510663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1695448421480!5m2!1sbn!2sbd"
                    style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="location_grid">
                    <img src="{{ asset('assets/app/icons/location.svg') }}" alt="location icon" />
                    <h5>{{ $shop->address }}</h5>
                </div>
            </div>
            <form action="" wire:submit.prevent='sendContactMsg' class="contact_form_area company_bottom_border">
                <h4 class="notification_title">Contact</h4>

                <div class="input_row">
                    <input type="text" wire:model.blur='name' class="input_item" placeholder="Name" />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input_row">
                    <input type="email" wire:model.blur='email' class="input_item" placeholder="E-mail" />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input_row">
                    <input type="number" wire:model.blur='phone' class="input_item" placeholder="Phone Number" />
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input_row">
                    <textarea class="input_item" wire:model.blur='message' placeholder="Message"></textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if (session()->has('success_contact'))
                    <div class="input_row"
                        style="text-align: center; background: rgb(93, 161, 93); padding: 10px; border-radius: 2px;">
                        <p style="color: white;">{{ session('success_contact') }}</p>
                    </div>
                @endif

                <button type="submit" class="login_btn login_btn_fill">
                    {!! loadingStateWithTextApp('sendContactMsg', 'Send Message') !!}
                </button>
            </form>
            <div class="review_area company_bottom_border">
                <h4>Write a Review</h4>
            </div>
            <form action="" wire:submit.prevent='addReview' class="contact_form_area company_bottom_border">

                @if (session()->has('success_review'))
                    <div class="input_row"
                        style="margin-bottom: 10px; text-align: center; background: rgb(93, 161, 93); padding: 10px; border-radius: 2px;">
                        <p style="color: white;">{{ session('success_review') }}</p>
                    </div>
                @endif
                @if (session()->has('error_review'))
                    <div class="input_row"
                        style="margin-bottom: 10px; text-align: center; background: rgb(236, 71, 71); padding: 10px; border-radius: 2px;">
                        <p style="color: white;">{{ session('error_review') }}</p>
                    </div>
                @endif

                <h4 class="sub_login">Rating</h4>
                <div class="select_area">
                    <div class="input_row">
                        <div class="ratting_star_area" wire:ignore>
                            <div class="rattingStar d-flex align-items-center flex-wrap g-sm">
                            </div>
                        </div>
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <h4 class="sub_login" style="margin-top: 25px;">Comment</h4>
                <div class="input_row">
                    <textarea name="" id="" wire:model.blur='comment' cols="30" rows="5"
                        placeholder="your comment...." class="input_item"></textarea>
                    @error('comment')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="login_btn login_btn_fill">
                    {!! loadingStateWithTextApp('addReview', 'Submit Review') !!}
                </button>
            </form>
        </div>
    </section>


    <div class="sing_modal_area dealer_profile_modal" id="dealerProfileModalArea">
        <div class="dealer_header">
            <div class="container">
                <div class="d-flex align-items-center flex-wrap g-xl">
                    <button type="button" id="dealerCloseBtn">
                        <img src="{{ asset('assets/app/icons/profile_back.svg') }}" alt="back icon" />
                    </button>
                    <h5 class="notification_title">Dealer Contact</h5>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="dealer_info_area">
                @php
                    $dealer = App\Models\User::find($shop->user_id);
                @endphp
                <div class="user_img">
                    <img src="{{ asset('assets/app/images/post/user_img3.png') }}" alt="user image" />
                </div>
                <h4 class="dealer_name">{{ $dealer->first_name }} {{ $dealer->last_name }}</h4>
                <ul class="archive_area">
                    <li>
                        <img src="{{ asset('assets/app/icons/archive_icon1.svg') }}" alt="archive icon" />
                        <h5>Identity Verified</h5>
                    </li>
                    <li>
                        <img src="{{ asset('assets/app/icons/archive_icon2.svg') }}" alt="archive icon" />
                        <h5>{{ $total_reviews }} Reviews</h5>
                    </li>
                    <li>
                        <img src="{{ asset('assets/app/icons/archive_icon3.svg') }}" alt="archive icon" />
                        <h5>{{ $dealer->email }}</h5>
                    </li>
                </ul>
                <div class="dealer_btn_area company_bottom_border">
                    <button type="button" class="call_btn">
                        <img src="{{ asset('assets/app/icons/calll_green.svg') }}" alt="call green" />
                        <span class="phone">Phone:</span>
                        @if (user())
                            <span>{{ $dealer->phone }}</span>
                        @else
                            <a href="{{ route('login') }}"></a>
                        @endif
                    </button>
                    <a href="{{ $dealer->whatsapp }}" class="wp_btn">
                        <img src="{{ asset('assets/app/icons/whatsapp_white.svg') }}" alt="call green" />
                        <span>WhatsApp Message</span>
                    </a>
                </div>
                {{-- <form action="" class="contact_form_area company_bottom_border">
                    <h4 class="sub_login">Send Messages</h4>
                    <div class="input_row">
                        <textarea name="" id="" cols="30" rows="5" placeholder="typing..." class="input_item"></textarea>
                    </div>

                    <button type="submit" class="login_btn login_btn_fill">
                        Send Message
                    </button>
                </form> --}}
                <div class="review_comment_area">
                    <h3 class="notification_title">{{ $total_reviews }} Revews</h3>

                    <div class="comment_list_wrapper">
                        @foreach ($reviews as $review)
                            <div class="review_comment_item">
                                <div class="user_grid">
                                    <img src="{{ asset(getUserByID($review->user_id)->avatar) }}" alt="user image" />
                                    <div>
                                        <h4>{{ getUserByID($review->user_id)->first_name }} {{ getUserByID($review->user_id)->last_name }}</h4>
                                        <h5>{{ Carbon\Carbon::parse($review->created_at)->format('d F') }}</h5>
                                    </div>
                                </div>
                                <ul class="star_list d-flex align-items-center flex-wrap" style="padding-bottom: 0px;">
                                    {!! star_review($review->rating) !!}
                                </ul>
                                <div class="comment">
                                    <p>{{ $review->comment }}</p>
                                </div>
                            </div>
                        @endforeach


                        {{-- <div class="nested_comment_area">
                            <div class="review_comment_item">
                                <div class="user_grid">
                                    <img src="{{ asset('assets/app/images/post/comment_user_img4.png') }}" alt="user image" />
                                    <div>
                                        <h4>Response frome kazi mahbub</h4>
                                        <h5>01 October</h5>
                                    </div>
                                </div>
                                <div class="comment">
                                    <p>Thanks Borkat for the revew.</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <a href="#" class="see_all_btn"> Show all review </a> --}}
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        $(".rattingStar").starRating({
            totalStars: 5,
            strokeColor: "#D9D9D9",
            emptyColor: "#D9D9D9",
            activeColor: "cornflowerblue",
            ratedColor: "#1872F6",
            strokeWidth: 10,
            starSize: 30,
            useFullStars: true,
            disableAfterRate: false,
            useGradient: false,
            callback: function(currentRating) {
                @this.set('rating', currentRating);
            }
        });
    </script>
@endpush
