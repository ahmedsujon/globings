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
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
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
            padding-bottom: 2px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #999;
            font-size: 15px;
            padding-bottom: 2px;
        }
    </style>
    <!-- Company Location Section  -->
    <section class="company_location_wrapper">
        <div class="location_header" style="margin-top: -20px;">
            <div class="container">
                <input type="hidden" name="" id="category" value="{{ request()->get('category') }}">
                <form action="" class="location_form_area" wire:ignore>
                    <div class="search_grid">
                        <div class="position-relative" id="cirt_select">
                            <select id="locationSearchSelect">
                                <option value=""></option>
                                <option value="all" {{ 'all' == request()->get('city') || !request()->get('city') ? 'selected':'' }}>Select city</option>
                                @foreach ($filter_cities as $city)
                                    <option value="{{ $city->city }}" {{ $city->city == request()->get('city') ? 'selected':'' }}>{{ $city->city }}</option>
                                @endforeach
                            </select>
                            <img src="{{ asset('assets/app/icons/select_arrow_icon.svg') }}"
                                style="padding-top: 3px; padding-right: 5px;" alt="select arrow" class="arrow_icon" />
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
                                    <a href="{{ route('app.shops') }}?category={{ $category->id }}"
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

        <div class="location_area location_all_shop_area" style="margin-top: -7px;">
            <div class="container">
                @if ($shops->count() > 0)
                    @foreach ($shops as $shop)
                        <div class="location_item">
                            <div class="position-relative">
                                <img src="{{ asset($shop->cover_photo) }}" alt="post image" class="post_img" />
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
                                    <span> . Open now</span> @else <span style="color: red;"> . Closed Now</span>
                                @endif</h5>
                            </div>
                        </div>
                    @endforeach
                @else
                @endif
            </div>
        </div>

        {{-- <div class="location_area">
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
        </div> --}}
    </section>


</div>
@push('scripts')
    <script>
        $('#locationSearchSelect').on('select2:select', function(e) {
            var data = e.params.data;

            var value = data['id'];
            var category = $('#category').val();

            window.location.href = "{{ URL::to('/shops') }}?city=" + value + '&category=' + category;
        });
    </script>
@endpush
