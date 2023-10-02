{{-- <div>
    <a class="dropdown-item text-danger" href="{{ route('user.logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
            key="t-logout">Logout</span></a>
    <form id="logout-form" style="display: none;" method="POST"
        action="{{ route('user.logout') }}">
        @csrf
    </form>
</div> --}}


<div>
    <section class="preview_first_wrapper">
        <img src="{{ asset('assets/app/images/header/globing_logo.svg') }}" alt="logo" />
        <h3 class="logo_title">Globings</h3>
    </section>

    <section class="preview_second_wrapper" style="display: none;" id="previewSlider">
        <div class="container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div>
                            <h3 class="preview_title">Show Stores</h3>
                            <h4 class="preview_sub_title">It’s all about you.</h4>
                            <div class="slider_img_area text-center">
                                <img src="{{ asset('assets/app/images/preview/preview_slider_image1.png') }}" alt="preview slider image" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div>
                            <h3 class="preview_title">Post Story</h3>
                            <h4 class="preview_sub_title">
                                Let know others your feedback of shop
                            </h4>
                            <div class="slider_img_area text-center">
                                <img src="{{ asset('assets/app/images/preview/preview_slider_image2.png') }}" alt="preview slider image" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div>
                            <h3 class="preview_title">Earn Bings</h3>
                            <h4 class="preview_sub_title">
                                by brings you can shop from real-time shop owner.
                            </h4>
                            <div class="slider_img_area text-center">
                                <img src="{{ asset('assets/app/images/preview/preview_slider_image3.png') }}" alt="preview slider image" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div>
                            <h3 class="preview_title">Chats</h3>
                            <h4 class="preview_sub_title">Contact with your friends.</h4>
                            <div class="slider_img_area text-center">
                                <img src="{{ asset('assets/app/images/preview/preview_slider_image4.png') }}" alt="preview slider image" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <div class="login_btn_area">
                <a href="{{ route('login') }}" class="login_btn"> Sign in </a>
                <button type="button" class="sub_login">
                    Continue without signing in
                </button>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.preview_first_wrapper').css('display', 'none');
                $('.preview_second_wrapper').css('display', 'block');
            }, 3000);
        });
    </script>
@endpush
