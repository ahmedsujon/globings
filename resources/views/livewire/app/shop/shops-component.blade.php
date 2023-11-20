@push('style')
@endpush
<div>
    <!-- Company Location Section  -->
    <section class="company_location_wrapper">
        <div class="location_header">
            <div class="container" wire:ignore>
                <form action="" class="location_form_area">
                    <h4>Your Location</h4>
                    <div class="search_grid">
                        <div class="position-relative">
                            <select id="locationSearchSelect" wire:model="searchTerm">
                                <option value=""></option>
                                @foreach ($shops as $shop)
                                    <option value="{{ $shop->city }}">{{ $shop->city }}</option>
                                @endforeach
                            </select>
                            <img src="{{ asset('assets/app/icons/select_arrow_icon.svg') }}" alt="select arrow"
                                class="arrow_icon" />
                        </div>
                        <a href="{{ route('app.map.view') }}" class="map_btn">
                            <img src="{{ asset('assets/app/icons/map_icon.svg') }}" alt="map icon" />
                        </a>
                    </div>
                </form>
                <div class="category_slider_area border-0 pb-2" id="headerCategorySlider">
                    <div class="d-flex align-items-center g-sm category_sceleton">
                        <div class="skeleton" style="width: 64px; height: 45px"></div>
                        <div class="skeleton" style="width: 64px; height: 45px"></div>
                        <div class="skeleton" style="width: 64px; height: 45px"></div>
                        <div class="skeleton" style="width: 64px; height: 45px"></div>
                        <div class="skeleton" style="width: 64px; height: 45px"></div>
                    </div>
                    <div class="swiper category_swiper_container d-none">
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
        <div class="container shop_seceleton_container" wire:ignore>
            <div class="shop_grid">

                <div class="post_area">
                    <div class="skeleton"
                        style="
                      width: 100%;
                      height: 199px;
                      border-radius: 8px;
                      margin-left: auto;
                      margin-right: auto;
                      margin-top: 15px;
                    ">
                    </div>
                </div>
            </div>
            <div class="post_grid">
                <div class="hash_area">
                    <div class="hash_icon">
                        <div class="skeleton"
                            style="
                        width: 150px;
                        height: 15px;
                        margin-right: auto;
                        margin-top: 5px;
                      ">
                        </div>
                        <div class="skeleton"
                            style="
                    width: 100px;
                    height: 15px;
                    margin-right: auto;
                    margin-top: 3px;
                    margin-bottom: 15px;
                  ">
                        </div>
                    </div>
                    <div class="middle_bar"></div>
                </div>
                <div class="post_area">
                    <div class="skeleton"
                        style="
                      width: 100%;
                      height: 199px;
                      border-radius: 8px;
                      margin-left: auto;
                      margin-right: auto;
                      margin-top: 15px;
                    ">
                    </div>
                    <div class="d-flex align-items-center g-sm mt-2">
                        <div class="hash_area">
                            <div class="hash_icon">
                                <div class="skeleton"
                                    style="
                                width: 150px;
                                height: 15px;
                                margin-right: auto;
                                margin-top: 5px;
                              ">
                                </div>
                                <div class="skeleton"
                                    style="
                            width: 100px;
                            height: 15px;
                            margin-right: auto;
                            margin-top: 3px;
                            margin-bottom: 15px;
                          ">
                                </div>
                            </div>
                            <div class="middle_bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="location_area shop_container d-none" wire:ignore.self>
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
                            <h5>{{ $shop->city }} <span>. Open now</span></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

@push('scripts')
    <script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.category_sceleton').addClass('d-none');
            $('.category_swiper_container').removeClass('d-none');

            $('.shop_seceleton_container').addClass('d-none');
            $('.shop_container').removeClass('d-none');

        }, 2000);
    });

</script>
@endpush
