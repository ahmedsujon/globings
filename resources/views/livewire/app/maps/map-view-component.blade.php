<div>
     <!-- Home  Section  -->
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
                                @if(userHasActiveSubscription())
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
                        <a href="#">
                            <img src="{{ asset('assets/app/icons/heart.svg') }}" alt="heart icon" />
                        </a>
                    </li>
                    <li>
                        <a href="#" class="header_number_area">
                            <span class="circle_shape"></span>
                            <span class="number">60</span>
                            <img src="{{ asset('assets/app/icons/header_right_logo_icon.svg') }}" alt="plus icon"
                                class="right_shape" />
                        </a>
                    </li>
                </ul>
            </div>
            <form action="" id="searchForm" class="header_search">
                <input type="text" placeholder="Search" id="search_input" value="{{ request()->get('search') }}" />
                <button class="search_icon" type="submit">
                    <img src="{{ asset('assets/app/icons/search-lg.svg') }}" alt="search icon" />
                </button>
            </form>
        </div>
    </header>
    <main>
        <!-- Company Map Area  -->
        <section class="company_map_wrapper">
          <div class="map_area">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.9730352447!2d90.33728817432475!3d23.780818635510663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1695448421480!5m2!1sbn!2sbd"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
          <div class="map_slider_area" id="mapSliderArea">
            <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="slider_item" >
                    <img
                      src="{{ asset('assets/app/images/post/post_img1.png') }}"
                      alt="slidr image"
                      class="slider_img"
                    />
                    <h4>Hair Cut - Barber</h4>
                    <div class="star_area">
                      <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                      <span>4.5</span>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="slider_item">
                    <img
                      src="{{ asset('assets/app/images/post/post_img1.png') }}"
                      alt="slidr image"
                      class="slider_img"
                    />
                    <h4>Hair Cut - Barber</h4>
                    <div class="star_area">
                      <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                      <span>4.5</span>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="slider_item">
                    <img
                      src="{{ asset('assets/app/images/post/post_img1.png') }}"
                      alt="slidr image"
                      class="slider_img"
                    />
                    <h4>Hair Cut - Barber</h4>
                    <div class="star_area">
                      <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                      <span>4.5</span>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="slider_item">
                    <img
                      src="{{ asset('assets/app/images/post/post_img1.png') }}"
                      alt="slidr image"
                      class="slider_img"
                    />
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
      </main>
</div>
