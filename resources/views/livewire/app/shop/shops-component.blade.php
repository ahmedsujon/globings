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
                                <img src="{{ asset('assets/app/icons/select_arrow_icon.svg') }}" alt="select arrow"
                                    class="arrow_icon" />
                            </div>
                            <a href="{{ route('app.map.view') }}" class="map_btn">
                                <img src="{{ asset('assets/app/icons/map_icon.svg') }}" alt="map icon" />
                            </a>
                        </div>
                    </form>
                    <div class="category_slider_area border-0" id="headerCategorySlider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($categories as $category)
                                    <div class="swiper-slide">
                                        <a href="{{ route('app.home') }}?category={{ $category->id }}"
                                            class="category_item {{ request()->get('category') == $category->id ? 'active_category' : '' }}">
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
                @foreach ($shops as $shop)
                    <div class="location_item">
                        <div class="position-relative">
                            <a href="{{ route('app.shopProfile', ['user_id' => $shop->user_id]) }}">
                                <img src="{{ asset('assets/app/images/post/location_img.png') }}" alt="post image"
                                    class="post_img" />
                            </a>
                            <div class="info_area">
                                <div class="container">
                                    <div class="d-flex-between">
                                        <h4>{{ $shop->shop_category }}</h4>
                                        <div class="ratting_area">
                                            <img src="{{ asset('assets/app/icons/star_small_icon.svg') }}"
                                                alt="star small icon" />
                                            <span>4.5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="content">
                                <h3><a
                                        href="{{ route('app.shopProfile', ['user_id' => $shop->user_id]) }}">{{ $shop->name }}</a>
                                </h3>
                                <h5>324 ft <span>. Open now</span></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</div>
