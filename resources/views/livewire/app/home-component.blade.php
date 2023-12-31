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
                        <button type="button" class="search_icon" id="homeFilterModalBtn">
                            <img src="{{ asset('assets/app/icons/search-lg-topbar.svg') }}" alt="search icon" />
                        </button>
                    </li>
                    <li>
                        @auth
                            @if (user()->account_type == 'Professional')
                                @if (userHasActiveSubscription())
                                    @if (!postLimit())
                                        <a href="javascript:void(0)" id="openPostCreateBtn">
                                            <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                                        </a>
                                    @else
                                        <a href="{{ route('app.plans') }}">
                                            <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                                        </a>
                                    @endif
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
            {{-- <form action="" id="searchForm" class="header_search">
                <input type="text" placeholder="Search" id="search_input" value="{{ request()->get('search') }}" />
                <button class="search_icon" type="submit">
                    <img src="{{ asset('assets/app/icons/search-lg.svg') }}" alt="search icon" />
                </button>
                <button class="filter_icon" type="button" id="filterBtn">
                    <img src="{{ asset('assets/app/icons/filter_icon.svg') }}" alt="filter icon" />
                </button>
            </form> --}}
        </div>
    </header>
    <!-- Category Slider Section  -->
    {{-- <section class="category_slider_area" id="headerCategorySlider">
        <div class="container" wire:ignore>
            <div class="d-flex align-items-center g-sm category_sceleton">
                <div class="skeleton" style="width: 64px; height: 45px; margin-bottom: 5px;"></div>
                <div class="skeleton" style="width: 64px; height: 45px; margin-bottom: 5px;"></div>
                <div class="skeleton" style="width: 64px; height: 45px; margin-bottom: 5px;"></div>
                <div class="skeleton" style="width: 64px; height: 45px; margin-bottom: 5px;"></div>
                <div class="skeleton" style="width: 64px; height: 45px; margin-bottom: 5px;"></div>
            </div>
            <div class="swiper category_swiper_container d-none">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="{{ route('app.events') }}" class="category_item">
                            <img src="{{ asset('assets/app/icons/home_category_icon1.svg') }}" alt="category icon" />
                            <h4>Events</h4>
                        </a>
                    </div>
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
    </section> --}}

    <!-- Post Home Section  -->
    <section class="post_home_wrapper" id="homePostArea">
        <div class="container post_seceleton_container" wire:ignore>
            <div class="post_grid">
                <div class="hash_area">
                    <div class="hash_icon">
                        <div class="skeleton"
                            style="
                        width: 20px;
                        height: 20px;
                        border-radius: 50%;
                        margin-left: auto;
                        margin-right: auto;
                      ">
                        </div>
                        <div class="skeleton"
                            style="
                        width: 30px;
                        height: 10px;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 5px;
                      ">
                        </div>
                    </div>
                    <div class="middle_bar"></div>
                    <button type="button" class="post_user_area postUserBtn">
                        <div class="skeleton"
                            style="
                        width: 32px;
                        height: 32px;
                        border-radius: 7px;
                        margin-left: auto;
                        margin-right: auto;
                      ">
                        </div>
                        <div class="skeleton"
                            style="
                        width: 30px;
                        height: 10px;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 5px;
                      ">
                        </div>
                    </button>
                </div>
                <div class="post_area">
                    <div class="skeleton"
                        style="
                      width: 100%;
                      height: 199px;
                      border-radius: 8px;
                      margin-left: auto;
                      margin-right: auto;
                    ">
                    </div>
                    <div class="d-flex align-items-center g-sm mt-2">
                        <div class="skeleton" style="width: 24px; height: 24px; border-radius: 50%"></div>
                        <div class="skeleton" style="width: 100px; height: 24px;"></div>
                    </div>
                </div>
            </div>
            <div class="post_grid">
                <div class="hash_area">
                    <div class="hash_icon">
                        <div class="skeleton"
                            style="
                        width: 20px;
                        height: 20px;
                        border-radius: 50%;
                        margin-left: auto;
                        margin-right: auto;
                      ">
                        </div>
                        <div class="skeleton"
                            style="
                        width: 30px;
                        height: 10px;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 5px;
                      ">
                        </div>
                    </div>
                    <div class="middle_bar"></div>
                    <button type="button" class="post_user_area postUserBtn">
                        <div class="skeleton"
                            style="
                        width: 32px;
                        height: 32px;
                        border-radius: 7px;
                        margin-left: auto;
                        margin-right: auto;
                      ">
                        </div>
                        <div class="skeleton"
                            style="
                        width: 30px;
                        height: 10px;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 5px;
                      ">
                        </div>
                    </button>
                </div>
                <div class="post_area">
                    <div class="skeleton"
                        style="
                      width: 100%;
                      height: 199px;
                      border-radius: 8px;
                      margin-left: auto;
                      margin-right: auto;
                    ">
                    </div>
                    <div class="d-flex align-items-center g-sm mt-2">
                        <div class="skeleton" style="width: 24px; height: 24px; border-radius: 50%"></div>
                        <div class="skeleton" style="width: 100px; height: 24px;"></div>
                    </div>
                </div>
            </div>
            <div class="post_grid">
                <div class="hash_area">
                    <div class="hash_icon">
                        <div class="skeleton"
                            style="
                        width: 20px;
                        height: 20px;
                        border-radius: 50%;
                        margin-left: auto;
                        margin-right: auto;
                      ">
                        </div>
                        <div class="skeleton"
                            style="
                        width: 30px;
                        height: 10px;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 5px;
                      ">
                        </div>
                    </div>
                    <div class="middle_bar"></div>
                    <button type="button" class="post_user_area postUserBtn">
                        <div class="skeleton"
                            style="
                        width: 32px;
                        height: 32px;
                        border-radius: 7px;
                        margin-left: auto;
                        margin-right: auto;
                      ">
                        </div>
                        <div class="skeleton"
                            style="
                        width: 30px;
                        height: 10px;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 5px;
                      ">
                        </div>
                    </button>
                </div>
                <div class="post_area">
                    <div class="skeleton"
                        style="
                      width: 100%;
                      height: 199px;
                      border-radius: 8px;
                      margin-left: auto;
                      margin-right: auto;
                    ">
                    </div>
                    <div class="d-flex align-items-center g-sm mt-2">
                        <div class="skeleton" style="width: 24px; height: 24px; border-radius: 50%"></div>
                        <div class="skeleton" style="width: 100px; height: 24px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container post_container d-none" wire:ignore.self>
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div>
                        {{-- <h3 class="business_owner_name">{{ getShopProfileHome($post->user_id)->name }}</h3> --}}
                        <div class="post_grid">
                            <div class="hash_area">
                                <div class="hash_icon">
                                    <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                                    {{-- <h4>Bruxelles</h4> --}}
                                </div>
                                <div class="middle_bar"></div>
                                <a href="{{ route('app.shopProfile', ['user_id' => $post->user_id]) }}" type="button"
                                    class="post_user_area">
                                    <img src="{{ asset(getShopProfileHome($post->user_id)->profile_image) }}"
                                        alt="" class="user_img" />
                                </a>
                            </div>
                            <div class="post_area">
                                <a href="{{ route('app.shopProfile', ['user_id' => $post->user_id]) }}">
                                    <h3 class="business_owner_name" style="color: black;">
                                        {{ getShopProfileHome($post->user_id)->name }}</h3>
                                </a>
                                @if ($post->tags)
                                    <ul class="post_tag_list d-flex align-items-center flex-wrap">
                                        @foreach (tagify_array($post->tags) as $tag)
                                            <li><a
                                                    href="{{ route('app.home') }}?tag={{ $tag }}">#{{ $tag }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="swiper post_slider1" wire:ignore>
                                    <div class="swiper-wrapper">
                                        @foreach ($post->images as $image)
                                            <div class="swiper-slide">
                                                <div class="slider_img">
                                                    <img src="{{ asset($image) }}" alt="" />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                                <span wire:ignore>
                                    <p class="post_description">
                                        {!! $post->content !!}
                                    </p>
                                </span>
                                <div class="action_area d-flex align-items-center flex-wrap">
                                    <button type="button" data-post_id="{{ $post->id }}"
                                        class="heart_icon add_like_btn {{ isLiked($post->id) ? 'selected_heart' : '' }}"
                                        id="heartIcon">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                                                stroke="#F73636" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button type="button" wire:click.prevent='getPostInfo({{ $post->id }})'
                                        class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
                                        <img src="{{ asset('assets/app/icons/comment_icon.svg') }}"
                                            alt="comment icon" />
                                        <h5>Comment</h5>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div style="text-align: center; margin-top: 100px;">
                    <small>No posts available</small>
                </div>
            @endif
        </div>
    </section>

    <!-- Search Modal  -->
    <div class="filter_modal_area pt-24" id="homeFilterModalArea" wire:ignore.self>
        <div class="profile_edit_modal">
            <div class="container">
                <div class="d-flex-between">
                    <h3 class="notification_title">Search</h3>
                    <button type="button" id="homeFilterEditCloseBtn">
                        <img src="{{ asset('assets/app/icons/result_close_btn.svg') }}" alt="close btn" />
                    </button>
                </div>
                <form action="" id="searchForm" class="header_divided_search">
                    <div class="search_input_area">
                        <input type="text" placeholder="Search" id="search_input"
                            value="{{ request()->get('search') }}" class="search_input" />
                    </div>
                    <input type="text" placeholder="Location" id="location_input"
                        value="{{ request()->get('location') }}" class="location_input" />
                    <button class="search_icon" type="submit">
                        <img src="{{ asset('assets/app/icons/search-lg-header.svg') }}" alt="search icon" />
                    </button>
                    <button class="filter_icon sort_btn" type="button"
                        data-value="{{ $sort_type == 'ASC' ? 'DESC' : 'ASC' }}">
                        <img src="{{ asset('assets/app/icons/sort_icon.svg') }}" alt="filter icon" />
                    </button>
                </form>
                <ul class="suggestion_list_area">
                    @foreach ($search_histories as $search_history)
                        <li class="search_item" data-search_val="{{ $search_history->search_value }}"
                            data-location_val="{{ $search_history->location_value }}">
                            {{ $search_history->search_value }}, {{ $search_history->location_value }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- <div class="filter_modal_area header_search_modal_area" wire:ignore.self id="headerSearchModalArea">
        <div class="container">
            <div class="d-flex-between">
                <h3 class="notification_title">Search</h3>
                <button type="button" id="headerSearchCloseBtn">
                    <img src="{{ asset('assets/app/icons/result_close_btn.svg') }}" alt="close btn" />
                </button>
            </div>
            <form action="" id="searchForm" class="header_divided_search">
                <div class="search_input_area">
                    <input type="text" placeholder="Search" id="search_input"
                        value="{{ request()->get('search') }}" class="search_input" />
                </div>
                <input type="text" placeholder="Location" id="location_input"
                    value="{{ request()->get('location') }}" class="location_input" />
                <button class="search_icon" type="submit">
                    <img src="{{ asset('assets/app/icons/search-lg-header.svg') }}" alt="search icon" />
                </button>
                <button class="filter_icon sort_btn" type="button"
                    data-value="{{ $sort_type == 'ASC' ? 'DESC' : 'ASC' }}">
                    <img src="{{ asset('assets/app/icons/sort_icon.svg') }}" alt="filter icon" />
                </button>
            </form>
            <ul class="suggestion_list_area">
                @foreach ($search_histories as $search_history)
                    <li class="search_item" data-search_val="{{ $search_history->search_value }}"
                        data-location_val="{{ $search_history->location_value }}">
                        {{ $search_history->search_value }}, {{ $search_history->location_value }}</li>
                @endforeach
            </ul>
        </div>
    </div> --}}

    <!-- Filter Modal  -->
    <div class="filter_modal_area" wire:ignore.self id="searchFilterArea">
        <form action="" id="filter_form">
            <div class="container">
                <div class="d-flex-between">
                    <h3 class="notification_title">Filters @if (!request()->is('/'))
                            <a href="{{ route('app.home') }}"
                                style="font-size: 11.5px; font-weight: normal; color: blue;">Reset Filters</a>
                        @endif
                    </h3>
                    <button type="button" id="filterCloseBtn">
                        <img src="{{ asset('assets/app/icons/result_close_btn.svg') }}" alt="close btn" />
                    </button>
                </div>
                <div class="category_area" id="categoryFilterArea" wire:ignore>
                    <h4 class="bring_bottom_text">Categories</h4>

                    <div class="category_filter_grid">
                        <input type="hidden" id="filter_sub_cat_id" value="" />

                        @foreach ($categories as $f_category)
                            <div>
                                <div class="form-check main_form_check">
                                    <input class="form-check-input main_form_check_input" name="filter_main_category"
                                        type="radio"
                                        {{ request()->get('category') == $f_category->id ? 'checked' : '' }}
                                        value="{{ $f_category->id }}" id="categoryFilterIcon" />

                                    <label class="form-check-label" for="categoryFilterIcon">
                                        <img src="{{ $f_category->icon }}" alt="category icon" />
                                        <span>{{ $f_category->name }}</span>
                                    </label>
                                </div>
                                @php
                                    $f_sub_categories = App\Models\Category::where('parent_id', $f_category->id)
                                        ->where('level', 1)
                                        ->get();
                                @endphp
                                <div class="accordion" id="accordion_{{ $f_category->id }}"
                                    style="{{ request()->get('category') == $f_category->id ? 'display: block;' : '' }}">
                                    @foreach ($f_sub_categories as $f_sub_category)
                                        @php
                                            $f_sub_sub_categories = App\Models\Category::where('parent_id', $f_sub_category->id)
                                                ->where('level', 2)
                                                ->get();
                                        @endphp

                                        @if ($f_sub_sub_categories->count() > 0)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button data-sub_cat_id="{{ $f_sub_category->id }}"
                                                        class="accordion-button collapsed sub_cat_btn" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse_{{ $f_sub_category->id }}"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        {{ $f_sub_category->name }}
                                                    </button>
                                                </h2>

                                                <div id="collapse_{{ $f_sub_category->id }}"
                                                    class="accordion-collapse collapse {{ request()->get('sub_category') == $f_sub_category->id ? 'show' : '' }}"
                                                    data-bs-parent="#accordion_{{ $f_category->id }}">
                                                    <div class="accordion-body">
                                                        @foreach ($f_sub_sub_categories as $f_sub_sub_category)
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                    name="sub_sub_category" type="checkbox"
                                                                    {{ in_array($f_sub_sub_category->name, explode(',', request()->get('sub_sub_categories'))) ? 'checked' : '' }}
                                                                    value="{{ $f_sub_sub_category->name }}"
                                                                    id="categoryFilterInnerIcon_{{ $f_sub_sub_category->id }}" />
                                                                <label class="form-check-label"
                                                                    for="categoryFilterInnerIcon_{{ $f_sub_sub_category->id }}">
                                                                    <span>{{ $f_sub_sub_category->name }}</span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- <div class="category_filter_grid" wire:ignore>
                        @foreach ($categories as $f_category)
                            <div class="form-check">
                                <input class="form-check-input filter_main_category" type="radio"
                                    name="filter_main_category" value="{{ $f_category->id }}"
                                    id="categoryFilterIcon_{{ $f_category->id }}" />
                                <label class="form-check-label" for="categoryFilterIcon_{{ $f_category->id }}">
                                    <img src="{{ asset($f_category->icon) }}" alt="category icon" />
                                    <span>{{ $f_category->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    @if ($sub_categories)
                    <div class="second_category_filter">
                        <h4 class="bring_bottom_text" style="margin-top: 25px;">Sub Categories</h4>
                        <div class="category_filter_grid">
                            @foreach ($sub_categories as $sub_cat)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="filter_category"
                                        value="{{ $sub_cat->name }}" id="categoryFilterIcon_{{ $sub_cat->id }}" />
                                    <label class="form-check-label" for="categoryFilterIcon_{{ $sub_cat->id }}">
                                        <span>{{ $sub_cat->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif --}}

                    @if ($cities)
                        <div class="select_area">
                            <h4 class="bring_bottom_text">Want to see area of city</h4>
                            <div class="area_list d-flex align-items-center flex-wrap">
                                @foreach ($cities as $city)
                                    <button type="button" class="filter_city"
                                        data-city="{{ $city }}">{{ $city }}</button>
                                @endforeach
                                <input type="hidden" id="filter_city_val" value="{{ request()->get('city') }}" />
                            </div>
                        </div>
                    @endif

                    {{-- <div class="range_area" wire:ignore>
                        <h4 class="bring_bottom_text">Range of area</h4>
                        <input data-addui="slider" data-range="false" data-fontsize="14" data-step="1"
                            data-min="5" data-max="50" value="20" data-formatter="usd" />
                    </div> --}}
                    <div class="btn_area">
                        <button type="submit" class="login_btn login_btn_fill">
                            Apply
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Comment Modal  -->
    <div class="comment_modal" wire:ignore.self id="commentModalArea">
        <div class="container" style="user-select: none;">
            <div class="d-flex-between">
                <div class="like_area">
                    <button type="button" class="totalReactBtn d-flex align-items-center flex-wrap">
                        <img src="{{ asset('assets/app/icons/heart_comment_icon.svg') }}" alt="heart icon"
                            class="heart_icon" />
                        <span>{{ $total_like }}</span>
                        <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" />
                    </button>
                </div>
                <button type="button" class="close_icon" id="commentModalClose">
                    <img src="{{ asset('assets/app/icons/modal_close_icon.svg') }}" alt="" />
                </button>
            </div>
            <div class="comment_filter_area" wire:ignore>
                <select class="niceSelect filter_comments">
                    <option value="recent" selected>Recent Comments</option>
                    <option value="oldest">Oldest Comments</option>
                </select>
            </div>
            <div class="comment_wraper">
                @if ($comments != false && $comments->count() > 0)
                    @foreach ($comments as $comment)
                        <div>
                            <div
                                class="comment_item {{ post_comment_replies_count($comment->id) > 0 ? 'nested_comment' : '' }}">
                                <div>
                                    <img src="{{ asset(getCommentUser($comment->user_id)->avatar) }}" alt="user "
                                        class="comment_user" />
                                </div>
                                <div>
                                    <div class="comment">
                                        <h4>{{ getCommentUser($comment->user_id)->first_name }}
                                            {{ getCommentUser($comment->user_id)->last_name }}</h4>
                                        <p>{{ $comment->comment }}</p>
                                    </div>

                                    <div class="info d-flex align-items-center flex-wrap">
                                        <div class="time">{{ $comment->getShortTimeAgo($comment->created_at) }}
                                        </div>
                                        <button type="button"
                                            class="likeBtn {{ isCommentLiked($comment->id) ? 'like_active' : '' }}"
                                            wire:click.prevent='likeComment({{ $comment->id }})'>
                                            Like
                                        </button>
                                        <button type="button" wire:click.prevent='replyComment({{ $comment->id }})'
                                            class="replayBtn">Reply</button>
                                    </div>
                                </div>
                            </div>

                            @if (post_comment_replies_count($comment->id) > 0)
                                <div class="nested_comment_area">
                                    @foreach (post_comment_replies($comment->id) as $reply)
                                        <div class="comment_item">
                                            <div>
                                                <img src="{{ asset(getCommentUser($reply->user_id)->avatar) }}"
                                                    alt="user " class="comment_user" />
                                            </div>
                                            <div>
                                                <div class="comment">
                                                    <h4>{{ getCommentUser($reply->user_id)->first_name }}
                                                        {{ getCommentUser($reply->user_id)->last_name }}</h4>
                                                    <p>
                                                        {{ $reply->comment }}
                                                    </p>
                                                </div>

                                                <div class="info d-flex align-items-center flex-wrap">
                                                    <div class="time">
                                                        {{ $reply->getShortTimeAgo($reply->created_at) }}</div>
                                                    <button type="button"
                                                        class="likeBtn {{ isCommentReplyLiked($reply->id) ? 'like_active' : '' }}"
                                                        wire:click.prevent='likeCommentReply({{ $reply->id }})'>Like</button>
                                                    <button type="button"
                                                        wire:click.prevent='replyComment({{ $comment->id }})'
                                                        class="replayBtn">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    @endforeach
                @else
                    <div>
                        <div style="text-align: center; padding: 50px 0px;">
                            <small>No comment found!</small>
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <form wire:submit.prevent='addComment' class="comment_form">
            <div class="container">
                <input type="text" placeholder="Write a comment..." wire:model.blur='comment'
                    class="input_filed comment_field" />
            </div>
        </form>
    </div>

    <!-- Total React Modal Area  -->
    <div class="sing_modal_area react_modal_area" id="reactModalArea">
        <div class="back_area">
            <div class="container">
                <button type="button" id="closeReactModalBtn" class="d-flex align-items-center flex-wrap g-xl">
                    <img src="{{ asset('assets/app/icons/back_white_icon.png') }}" alt="back cion" />
                    <h4 class="notification_title">People who reacted</h4>
                </button>
            </div>
        </div>

        <div class="total_react_area d-flex align-items-center flex-wrap g-sm">
            <div class="container">
                <img src="{{ asset('assets/app/icons/heart_comment_icon.svg') }}" alt="heart icon"
                    class="heart_icon" />
                <span class="react_title">{{ $total_like }}</span>
            </div>
        </div>
        <div class="like_user_area">
            <div class="container">
                @if ($all_post_reacts)
                    @foreach ($all_post_reacts as $react)
                        <div class="user_grid">
                            <div class="user_img_area">
                                <img src="{{ asset($react->avatar) }}" alt="" class="user_img" />
                                <img src="{{ asset('assets/app/icons/heart_comment_icon.svg') }}" alt="heart icon"
                                    class="heart_icon" />
                            </div>
                            <h4>{{ $react->first_name }} {{ $react->last_name }}</h4>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @auth
        <div class="sing_modal_area post_modal_area" wire:ignore.self style="padding-top: 15px;"
            id="postCreateModalArea">
            <div class="post_header_area">
                <button type="button" class="close_btn" id="closeModalBtn">
                    <img src="{{ asset('assets/app/icons/modal_close_icon.svg') }}" alt="" />
                </button>
                <h4 class="notification_title">Create Post</h4>
            </div>
            <div class="header_border"></div>
            <form wire:submit.prevent='createPost' class="mobile_form_area post_form_area"
                style="justify-content: normal !important;" id="postCreateFormSubmit">
                <div class="user_grid">
                    <img src="{{ asset(user()->avatar) }}" alt="user image" class="user_img" />
                    <div>
                        <h4>{{ user()->first_name }} {{ user()->last_name }}</h4>
                        <h6>Posting Publicly</h6>
                    </div>
                </div>
                <div class="input_row">
                    <textarea class="input_field" wire:model.blur='content' cols="30" rows="5"
                        placeholder="Share details of your own experience at this place"></textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input_row">
                    <div wire:ignore>
                        <input type="text" name="keywords" id="keyWords" class="input_field"
                            placeholder="Enter your tags" />
                    </div>
                    @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input_row">
                    <label for="fileUpload" class="upload_label">
                        <img src="{{ asset('assets/app/icons/mdi_photo-library.svg') }}" alt="photo libray" />
                        <span>Add photos/videos {{ $post_status }}</span>
                    </label>
                    <input type="file" id="fileUpload" wire:model.blur='images' multiple class="d-none" />
                    @error('images')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div wire:loading wire:target='images' wire:key='images'>
                        <i class="fa fa-spinner fa-spin" style="font-size: 10px;" aria-hidden="true"></i>
                        <small>Uploading</small>
                    </div>

                    <div class="uploadSlider" id="uploadSlider">
                        <div class="upload_slider_grid">
                            @if ($images)
                                @foreach ($images as $key => $img)
                                    <div class="slider_img">
                                        <img src="{{ $img->temporaryUrl() }}" alt="slider image" class="upload_img" />
                                        <button type="button" class="upload_close">
                                            <img src="{{ asset('assets/app/icons/upload_close_icon.svg') }}"
                                                wire:click.prevent='removeImg({{ $key }})' alt="close icon" />
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <span wire:ignore>
                        <div id="img_status" style="color: red; font-size: 12.5px;"></div>
                    </span>
                </div>
                <button type="submit" class="login_btn login_btn_fill mt-24">
                    {!! loadingStateWithTextApp('createPost', 'POST') !!}
                </button>
            </form>
        </div>
    @endauth
</div>

@push('scripts')
    <script>
        var input = document.querySelector('input[name=keywords]');
        new Tagify(input);
        $('#keyWords').on('change', function() {
            var val = $(this).val();
            @this.set('tags', val);
        });
    </script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.category_sceleton').addClass('d-none');
                $('.category_swiper_container').removeClass('d-none');

                $('.post_seceleton_container').addClass('d-none');
                $('.post_container').removeClass('d-none');

            }, 2000);

            $('.filter_city').on('click', function() {
                $(".filter_city").each(function() {
                    $(this).removeClass('active');
                });

                $(this).addClass('active');
                $('#filter_city_val').val($(this).data('city'));
            });

            $('.filter_main_category').on('change', function() {
                var id = $(this).val();

                @this.getSubCategories(id);
            });



            $('#filter_form').on('submit', function(e) {
                e.preventDefault();

                var allCats = [];
                var main_category = '';
                if (document.querySelector('input[name="filter_main_category"]:checked')) {
                    main_category = document.querySelector('input[name="filter_main_category"]:checked')
                        .value;
                }

                $('input:checkbox[name=sub_sub_category]:checked').each(function() {
                    allCats.push($(this).val());
                });

                var sub_id = $('#filter_sub_cat_id').val();

                var city = $('#filter_city_val').val();

                window.location.href = "{{ URL::to('/filter') }}?city=" + city + "&category=" +
                    main_category +
                    '&sub_category=' + sub_id + '&sub_sub_categories=' + allCats;
            });

            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                var value = $('#search_input').val();
                var location = $('#location_input').val();

                @this.addSearchHistory(value, location);

                window.location.href = "{{ URL::to('/filter') }}?search=" + value + "&location=" +
                    location;
            });

            $('.sort_btn').on('click', function() {
                var sort_value = $(this).data('value');
                var value = $('#search_input').val();
                var location = $('#location_input').val();
                window.location.href = "{{ URL::to('/filter') }}?search=" + value + "&location=" +
                    location + "&sort=" + sort_value;
            });

            $('.sub_cat_btn').on('click', function() {
                var id = $(this).data('sub_cat_id');
                $('#filter_sub_cat_id').val(id);
            });

            $('.search_item').on('click', function() {
                var search = $(this).data('search_val');
                var location = $(this).data('location_val');

                $('#search_input').val(search);
                $('#location_input').val(location);
            });

            $('.add_like_btn').on('click', function() {
                var post_id = $(this).data('post_id');
                @this.like(post_id);
            });

            window.addEventListener('focusOnComment', event => {
                $('.comment_field').focus();
            });

            $('.filter_comments').on('change', function() {
                var value = $(this).val()

                @this.set('comment_filter_by', value);
            });

        });
    </script>

    <script>
        const imageInput = document.getElementById('fileUpload');
        const errorMessages = document.getElementById('errorMessages');

        imageInput.addEventListener('change', handleImageUpload);

        function handleImageUpload() {
            const files = imageInput.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const maxSizeInBytes = 1024 * 10240; // 2MB (adjust as needed)

                if (file.size > maxSizeInBytes) {
                    $('#img_status').html('Images must not be greater than 10 MB');
                    @this.set('post_status', 0);
                    break;
                } else {
                    $('#img_status').html('');
                    @this.set('post_status', 1);
                }
            }
        }
    </script>

    <script>
        @if (Session::has('post_created'))
            alert('Post Created Successfully');
            $.toast({
                heading: "",
                text: 'Post created successfully',
                showHideTransition: "slide", //plain,fade
                icon: "success", //success,warning,error,info
                position: "bottom-center",
                hideAfter: 3000,
                loader: true,
            });
        @endif
    </script>

    <script>
         @if (Session::has('verification_success'))
            $.toast({
                heading: "",
                text: 'Account successfully verified',
                showHideTransition: "slide", //plain,fade
                icon: "success", //success,warning,error,info
                position: "bottom-center",
                hideAfter: 3000,
                loader: true,
            });
        @endif
    </script>
@endpush
