<div>
    <main>
        <!-- Company Location Section  -->
        <section class="company_location_wrapper">
          <div class="location_header">
            <div class="container">
              <form action="" class="location_form_area">
                <h4>Your Location</h4>
                <div class="search_grid">
                  <div class="position-relative">
                    <select id="locationSearchSelect">
                      <option value=""></option>
                      <option value="AL">Alabama</option>
                      <option value="WY">Wyoming</option>
                    </select>
                    <img
                      src="{{ asset('assets/app/icons/select_arrow_icon.svg') }}"
                      alt="select arrow"
                      class="arrow_icon"
                    />
                  </div>
                  <button type="button" class="map_btn">
                    <img src="{{ asset('assets/app/icons/map_icon.svg') }}" alt="map icon" />
                  </button>
                </div>
              </form>
               <!-- Category Slider Section  -->
            <div
            class="category_slider_area border-0"
            id="headerCategorySlider"
          >
            <div class="swiper">
              <div class="swiper-wrapper">
                @foreach ($categories as $category)
                <div class="swiper-slide">
                  <a href="#" class="category_item">
                      <img src="{{ asset($category->icon) }}" alt="category icon" />
                      <h4>{{ $category->name }}</h4>
                  </a>
              </div>
                @endforeach
              </div>
            </div>
          </div>
            </div>
          </div>
          <div class="location_area">
            <div class="location_item">
              <div class="position-relative">
                <img
                  src="{{ asset('assets/app/images/post/location_img.png') }}"
                  alt="post image"
                  class="post_img"
                />
                <div class="info_area">
                  <div class="container">
                    <div class="d-flex-between">
                      <h4>Barber shop</h4>
                      <div class="ratting_area">
                        <img
                          src="{{ asset('assets/app/icons/star_small_icon.svg') }}"
                          alt="star small icon"
                        />
                        <span>4.5</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="content">
                  <h3>Hair Cut - Belgium, Brussels</h3>
                  <h5>324 ft <span>. Open now</span></h5>
                </div>
              </div>
            </div>
            <div class="location_item">
              <div class="position-relative">
                <img
                  src="{{ asset('assets/app/images/post/location_img.png') }}"
                  alt="post image"
                  class="post_img"
                />
                <div class="info_area">
                  <div class="container">
                    <div class="d-flex-between">
                      <h4>Barber shop</h4>
                      <div class="ratting_area">
                        <img
                          src="{{ asset('assets/app/icons/star_small_icon.svg') }}"
                          alt="star small icon"
                        />
                        <span>4.5</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="content">
                  <h3>Hair Cut - Belgium, Brussels</h3>
                  <h5>324 ft <span>. Open now</span></h5>
                </div>
              </div>
            </div>
            <div class="location_item">
              <div class="position-relative">
                <img
                  src="{{ asset('assets/app/images/post/location_img.png') }}"
                  alt="post image"
                  class="post_img"
                />
                <div class="info_area">
                  <div class="container">
                    <div class="d-flex-between">
                      <h4>Barber shop</h4>
                      <div class="ratting_area">
                        <img
                          src="{{ asset('assets/app/icons/star_small_icon.svg') }}"
                          alt="star small icon"
                        />
                        <span>4.5</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="content">
                  <h3>Hair Cut - Belgium, Brussels</h3>
                  <h5>324 ft <span>. Open now</span></h5>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
</div>
