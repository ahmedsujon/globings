<div>
    <style>
        .company_preview_wrapper .slider_img video,.company_preview_wrapper .slider_img iframe{
            width: 100%;
    height: 230px;
    object-fit: cover;
        }
    </style>
    <main>
    <header class="home_header_wrapper mt-24">
        <div class="container">
            <div class="d-flex-between">
                <a href="{{ route('app.home') }}" class="logo">
                    <img src="{{ asset('assets/app/images/header/header_logo.svg') }}" alt="logo" />
                </a>
                <ul class="header_right_list d-flex align-items-center justify-content-end flex-wrap">
                    <li>
                        @auth
                            @if (user()->account_type == 'Professional')
                                @if (userHasActiveSubscription())
                                    <a href="javascript:void(0)" id="openPostCreateBtn">
                                        <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                                    </a>
                                @else
                                    <a href="{{ route('app.plans') }}">
                                        <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                                    </a>
                                @endif
                            @endif
                        @else
                            <a href="{{ route('login') }}">
                                <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                            </a>
                        @endauth
                    </li>
                    <li>
                        <a href="{{ route('app.my-favorite-shop') }}">
                            <img src="{{ asset('assets/app/icons/heart.svg') }}" alt="heart icon" />
                        </a>
                    </li>
                    <li>
                        @if (user())
                            <a href="{{ route('app.bings') }}" class="header_number_area">
                                <span class="circle_shape"></span>
                                <span class="number">{{ user()->bings_balance }}</span>
                                <img src="{{ asset('assets/app/icons/header_right_logo_icon.svg') }}" alt="plus icon"
                                    class="right_shape" />
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </header>
        <!-- Company Preview  Section  -->
        <section class="company_preview_wrapper mt-24">
            <div class="container">
                <div class="slider_area" id="companySliderArea">
                    <!-- <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="slider_img">
                                    <img src="{{ asset($event->banner) }}" alt="post image" />
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="slider_img">
                    <a href="{{ route('app.event.details', ['id' => $event->id]) }}" class="w-100">
                                        @if ($event->extension == 'mp4' || $event->extension == 'avi' || $event->extension == 'mov')
                                            <video class="roundeds post_img" alt="200x200" width="200"
                                                height="120" width="100%" controls>
                                                <source src="{{ asset($event->banner) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @elseif (
                                            $event->extension == 'jpg' ||
                                                $event->extension == 'jpeg' ||
                                                $event->extension == 'png' ||
                                                $event->extension == 'gif')
                                            <img class="roundeds" alt="200x200" width="100%" height="100%"
                                                src="{{ asset($event->banner) }}" alt="Image" class="post_img">
                                        @else
                                            <p>This file type is not supported.</p>
                                        @endif
                                    </a>
                                </div>
                </div>
                <div class="post_info_list d-flex align-items-center flex-wrap g-xl">
                    <div class="list_item d-flex align-items-center flex-wrap">
                        <h4>Date:</h4>
                        <h5>{{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</h5>
                    </div>
                </div>
                <h2 class="company_title">{{ $event->name }}</h2>
                <div class="description_area company_bottom_border">
                    <h4 class="notification_title">Description</h4>
                    <p>
                        {{ $event->description }}
                    </p>
                </div>
                <div class="dealer_area company_bottom_border">
                    <button type="button" class="user_img_area" id="dealerProfileBtn">
                        <img src="{{ asset(user($event->id)->avatar) }}" alt="user image" class="user_img" />
                        <div>
                            <div class="dealer">Author</div>
                            <h5 class="sub_login">{{ user($event->id)->first_name }} {{ user($event->id)->last_name }}</h5>
                        </div>
                    </button>
                </div>
            </div>
        </section>
</div>
