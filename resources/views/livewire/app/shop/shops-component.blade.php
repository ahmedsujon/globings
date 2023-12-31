@push('style')
@endpush
<div>
    <style>
        .select2-dropdown {
            border: 1px solid #d7d7d7 !important;
            border-radius: 8px;
            background-color: white;
        }

        .select2-dropdown .select2-results__options {
            margin-top: 10px;
        }

        .company_location_wrapper .location_header {
            padding-bottom: 0px !important;
        }

        .company_location_wrapper .location_area {
            margin-top: 24px !important;
        }

        .select2-dropdown .select2-search__field {
            border-radius: 4px;
            height: 34px;
        }

        .select2-dropdown .select2-results__option {
            position: relative;
            font-size: 14px;
        }

        .select2-dropdown .select2-results__option--highlighted {
            background-color: transparent !important;
            color: black !important;
        }

        .select2-dropdown .select2-results__option--highlighted::after {
            position: absolute;
            right: 14px;
            content: "";
            display: inline-block;
            transform: rotate(45deg);
            height: 13px;
            width: 7px;
            border-bottom: 2px solid #1872f6;
            border-right: 2px solid #1872f6;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #aaa;
            border-radius: 4px;
            background-color: transparent !important;
        }

        .select2-container {
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle;
            border: 1px solid #ECECEC;
            padding-top: 5px;
            padding-left: 7px;
            border-radius: 49px;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #999;
            font-size: 15px;
            background-color: transparent !important;
            /* padding-bottom: 2px; */
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #999;
            font-size: 15px;
            background-color: transparent !important;
            /* padding-bottom: 2px; */
        }
    </style>
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

            <form action="" id="location_search_form" class="header_divided_search">
                <div class="search_input_area">
                    <input type="text" placeholder="Search" id="search_input"
                        value="{{ request()->get('search_value') }}" class="search_input" />
                </div>
                <input type="text" placeholder="Location" id="location_input"
                    value="{{ request()->get('city') }}" class="location_input" />
                <button class="search_icon" type="submit">
                    <img src="{{ asset('assets/app/icons/search-lg-header.svg') }}" alt="search icon" />
                </button>
                <button class="filter_icon sort_btn" type="button" id="filterBtn">
                    <img src="{{ asset('assets/app/icons/filter_icon.svg') }}" alt="filter icon" />
                </button>
            </form>

            {{-- <form action="" id="location_search_form header_divided_search" class="header_search" wire:ignore>
                <div class="search_input_area">
                    <input type="text" placeholder="Search" id="search_input"
                        value="{{ request()->get('search_value') }}" class="search_input" />
                </div>
                <input type="text" placeholder="Location" id="location_input"
                    value="{{ request()->get('location') }}" class="location_input" />
                <button class="search_icon" type="submit">
                    <img src="{{ asset('assets/app/icons/search-lg-header.svg') }}" alt="search icon" />
                </button>

                <button class="filter_icon" type="button" id="filterBtn">
                    <img src="{{ asset('assets/app/icons/filter_icon.svg') }}" alt="filter icon" />
                </button>
            </form> --}}
        </div>
    </header>
    <!-- Company Location Section  -->
    <section class="company_location_wrapper">
        <div class="location_header border-0" style="margin-top: -20px;" wire:ignore>
            <div class="category_slider_area border-0 pb-2" id="headerCategorySlider">
                <div class="container">
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
                                    <a href="{{ route('app.shops') }}?category={{ $category->id }}&city={{ request()->get('city') }}&search_value={{ request()->get('search_value') }}"
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
        <div class="location_area shop_container d-none" wire:ignore>
            <div class="location_area location_all_shop_area" style="margin-top: -7px;">
                <div class="container">
                    @if ($shops->count() > 0)
                        @foreach ($shops as $shop)
                            <div class="location_item">
                                <div class="position-relative">
                                    <a href="{{ route('app.shopProfile', ['user_id' => $shop->user_id]) }}">
                                        <img src="{{ asset($shop->cover_photo) }}" alt="post image" class="post_img" />
                                    </a>
                                    <div class="info_area">
                                        <div class="container">
                                            <div class="d-flex-between">
                                                <h4>{{ $shop->shop_category }}</h4>
                                                <div class="ratting_area">
                                                    <img src="{{ asset('assets/app/icons/star_small_icon.svg') }}"
                                                        alt="star small icon" />
                                                    <span>{{ avgShopReview($shop->id) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="content">
                                    <a href="{{ route('app.shopProfile', ['user_id' => $shop->user_id]) }}">
                                        <h3>{{ $shop->name }}</h3>
                                    </a>
                                    <h5>{{ $shop->address }} @if ($shop->is_open == 1)
                                            <span> . Open now</span>
                                        @else
                                            <span style="color: red;"> . Closed Now</span>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="text-align: center; margin-top: 100px;">
                            <small>No shops found</small>
                        </div>
                    @endif
                </div>
            </div>
    </section>
    <!-- Map Fixed Button  -->
    <a href="{{ route('app.map.view') }}" class="map_fixed_btn">
        <i class="fa-solid fa-map"></i> <span>Map</span>
    </a>

    <div class="filter_modal_area" wire:ignore.self id="searchFilterArea">
        <form action="" id="filter_form">
            <div class="container">
                <div class="d-flex-between">
                    <h3 class="notification_title">Filters
                        {{-- @if (!request()->is('shops'))
                            <a href="{{ route('app.shops') }}"
                                style="font-size: 11.5px; font-weight: normal; color: blue;">Reset Filters</a>
                        @endif --}}
                    </h3>
                    <button type="button" id="filterCloseBtn">
                        <img src="{{ asset('assets/app/icons/result_close_btn.svg') }}" alt="close btn" />
                    </button>
                </div>
                <div class="category_area" id="categoryFilterArea">

                    <input type="hidden" name="" id="filter_cat_id" value="{{ $f_category }}" />
                    <input type="hidden" name="" id="filter_sub_cat_id" value="{{ $f_sub_category }}" />

                    <div class="top_filter_area {{ $ui_status == 1 ? '' : 'd-none' }}" id="topFilterArea" >
                        <h4 class="bring_bottom_text">Category</h4>
                        <div class="">
                            @foreach ($categories as $category)
                                <div>
                                    <button type="button" class="form-check main_form_check main_cat_btn" data-id="{{ $category->id }}" wire:click.prevent='getSubCategory({{ $category->id }})'>
                                        <label class="form-check-label">
                                            <img src="{{ asset($category->icon) }}" alt="" />
                                            <span>{{ $category->name }} ({{ category_total_shop($category->id) }})</span>
                                        </label>
                                        <img src="{{ asset('assets/app/icons/right_arrow.svg') }}" alt="right arrow" class="right_arrow" />
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Filter Sub Modal  -->
                    <div class="sub_filter_modal_area {{ $ui_status == 2 ? 'd-block' : 'd-none' }}" id="subFilterArea">
                        <div>
                            <div class="category_area" id="subCategoryFilterArea">
                                <div class="d-flex align-items-center flex-wrap g-small">
                                    <button type="button" id="subBackBtn" style="margin-top: -2px;" wire:click.prevent='resetSubCat'>
                                        <img src="{{ asset('assets/app/icons/left_arrow.svg') }}" alt="left arrow" />
                                    </button>
                                    <div>
                                        <h4 class="bring_bottom_text">Select Sub Category</h4>
                                    </div>
                                </div>

                                <div class="category_filter_grid d-block" style="margin-left: 10px;">
                                    @if ($total_sub_cat > 0)
                                        @foreach ($subCategories as $subCategory)
                                            <div>
                                                <button type="button" class="form-check main_form_check sub_cate_btn" data-id="{{ $subCategory->id }}" wire:click.prevent='getSubSubCategory({{ $subCategory->id }})'>
                                                    <label class="form-check-label d-block">
                                                        <span>{{ $subCategory->name }} ({{ sub_category_total_shop($subCategory->id) }})</span>
                                                    </label>
                                                    <img src="{{ asset('assets/app/icons/right_arrow.svg') }}" alt="right arrow"
                                                        class="right_arrow" />
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Filter Sub Inner Modal  -->
                    <div class="sub_inner_filter_modal_area {{ $ui_status == 3 ? 'd-block' : 'd-none' }}" id="subInnerFilterArea">
                        <div>
                            <div class="category_area" id="subInnerCategoryFilterArea">
                                <div class="d-flex align-items-center flex-wrap g-small">
                                    <button type="button" id="subInnerBackBtn" style="margin-top: -2px;" wire:click.prevent='resetSubSubCat'>
                                        <img src="{{ asset('assets/app/icons/left_arrow.svg') }}" alt="left arrow" />
                                    </button>
                                    <div>
                                        <h4 class="bring_bottom_text">Select Sub Sub Categories</h4>
                                    </div>
                                </div>
                                <div class="category_filter_grid d-block" style="margin-left: 10px;">
                                    @if ($total_sub_sub_cat > 0)
                                        @foreach ($subSubCategories as $subSubCategory)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" wire:model.live='selected_sub_sub_categories' name="sub_sub_category" value="{{ $subSubCategory->name }}"
                                                    id="categoryFilterInnerIcon_{{ $subSubCategory->id }}" />
                                                <label class="form-check-label" for="categoryFilterInnerIcon_{{ $subSubCategory->id }}">
                                                    <span>{{ $subSubCategory->name }} ({{ sub_sub_category_total_shop($subSubCategory->name) }})</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- @if (count($filter_cities) > 0)
                        <div class="select_area">
                            <h4 class="bring_bottom_text">Want to see area of city</h4>
                            <div class="area_list d-flex align-items-center flex-wrap">
                                @foreach ($filter_cities as $city)
                                    <button type="button" class="filter_city"
                                        data-city="{{ $city->city }}">{{ $city->city }}</button>
                                @endforeach
                                <input type="hidden" id="filter_city_val" value="{{ request()->get('city') }}" />
                            </div>
                        </div>
                    @endif --}}

                    <div class="btn_area">
                        <input type="hidden" id="sub_sub_cats_filter" value="{{ json_encode($selected_sub_sub_categories) }}">
                        <button type="submit" class="login_btn login_btn_fill">
                            Apply
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.category_sceleton').addClass('d-none');
                $('.category_swiper_container').removeClass('d-none');

                $('.shop_seceleton_container').addClass('d-none');
                $('.shop_container').removeClass('d-none');

                $('.search_sceleton').addClass('d-none');
                $('.search_grid_skeleton').removeClass('d-none');

            }, 2000);
        });
    </script>

    <script>
        $('.filter_main_category').on('change', function() {
            var id = $(this).val();
            @this.getSubCategories(id);
        });

        $('#location_search_form').on('submit', function(e) {

            e.preventDefault();

            var search_value = $('#search_input').val();
            var city = $('#location_input').val();

            window.location.href = "{{ URL::to('/shops/filter') }}?city=" + city + '&search_value=' + search_value;
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.filter_city').on('click', function() {
                $(".filter_city").each(function() {
                    $(this).removeClass('active');
                });

                $(this).addClass('active');
                $('#filter_city_val').val($(this).data('city'));
            });

            $('#filter_form').on('submit', function(e) {
                e.preventDefault();

                // var allCats = [];
                var main_category = $('#filter_cat_id').val();
                var sub_id = $('#filter_sub_cat_id').val();

                // $('input:checkbox[name=sub_sub_category]:checked').each(function() {
                //     allCats.push($(this).val());
                // });

                var allCats = $('#sub_sub_cats_filter').val();

                // var city = $('#filter_city_val').val();

                window.location.href = "{{ URL::to('/shops/filter') }}?category=" +
                    main_category + '&sub_category=' + sub_id + '&sub_sub_categories=' + allCats;
            });
        });
    </script>
@endpush
