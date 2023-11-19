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
            <form action="" id="searchForm" class="header_search">
                <input type="text" placeholder="Search" id="search_input" value="{{ request()->get('search') }}" />
                <button class="search_icon" type="submit">
                    <img src="{{ asset('assets/app/icons/search-lg.svg') }}" alt="search icon" />
                </button>
                <button class="filter_icon" type="button" id="filterBtn">
                    <img src="{{ asset('assets/app/icons/filter_icon.svg') }}" alt="filter icon" />
                </button>
            </form>
        </div>
    </header>
    <!-- Category Slider Section  -->
    <section class="category_slider_area" id="headerCategorySlider">
        <div class="container" wire:ignore>
            <div class="d-flex align-items-center g-sm category_sceleton">
                <div class="skeleton" style="width: 64px; height: 45px"></div>
                <div class="skeleton" style="width: 64px; height: 45px"></div>
                <div class="skeleton" style="width: 64px; height: 45px"></div>
                <div class="skeleton" style="width: 64px; height: 45px"></div>
                <div class="skeleton" style="width: 64px; height: 45px"></div>
            </div>
            <div class="swiper category_swiper_container d-none">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="{{ route('app.events') }}" class="category_item">
                            <img src="{{ asset('assets/app/icons/events_category.svg') }}" alt="category icon" />
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
    </section>

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
                    {{-- <div class="d-flex align-items-center g-sm mt-2">
                        <div class="skeleton" style="width: 24px; height: 24px; border-radius: 50%"></div>
                        <div class="skeleton" style="width: 24px; height: 24px; border-radius: 50%"></div>
                    </div> --}}
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
                        <div class="skeleton" style="width: 24px; height: 24px; border-radius: 50%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container post_container d-none" wire:ignore.self>
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
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
                                    <img src="{{ asset('assets/app/icons/comment_icon.svg') }}" alt="comment icon" />
                                    <h5>Comment</h5>
                                </button>
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
    <!-- Filter Modal  -->
    <div class="filter_modal_area" wire:ignore.self id="searchFilterArea">
        <form action="" id="filter_form">
            <div class="container">
                <div class="d-flex-between">
                    <h3 class="notification_title">Filters</h3>
                    <button type="button" id="filterCloseBtn">
                        <img src="{{ asset('assets/app/icons/result_close_btn.svg') }}" alt="close btn" />
                    </button>
                </div>
                <div class="category_area">
                    <h4 class="bring_bottom_text">Categories Settings</h4>
                    <div class="category_filter_grid">
                        @foreach ($categories as $f_category)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="filter_category" value="{{ $f_category->id }}"
                                    id="categoryFilterIcon_{{ $f_category->id }}" />
                                <label class="form-check-label" for="categoryFilterIcon_{{ $f_category->id }}">
                                    <img src="{{ asset($f_category->icon) }}"
                                        alt="category icon" />
                                    <span>{{ $f_category->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @if (count($cities) > 0)
                        <div class="select_area">
                            <h4 class="bring_bottom_text">Want to see area of city</h4>
                            <div class="area_list d-flex align-items-center flex-wrap">
                                @foreach ($cities as $city)
                                    <button type="button" class="filter_city" data-city="{{ $city }}">{{ $city }}</button>
                                @endforeach
                                <input type="hidden" id="filter_city_val" />
                            </div>
                        </div>
                    @endif

                    {{-- <div class="range_area" wire:ignore>
                        <h4 class="bring_bottom_text">Range of area</h4>
                        <input data-addui="slider" data-range="true" data-fontsize="14" data-step="0.01"
                            data-min="5" data-max="20" value="10" data-formatter="usd" />
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
            <form wire:submit.prevent='createPost' class="mobile_form_area post_form_area" id="postCreateFormSubmit">
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
                    <label for="fileUpload" class="upload_label">
                        <img src="{{ asset('assets/app/icons/mdi_photo-library.svg') }}" alt="photo libray" />
                        <span>Add photos/videos</span>
                    </label>
                    <input type="file" id="fileUpload" wire:model.blur='images' multiple class="d-none" />
                    @error('images')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
        $(document).ready(function() {
            setTimeout(function() {
                $('.category_sceleton').addClass('d-none');
                $('.category_swiper_container').removeClass('d-none');

                $('.post_seceleton_container').addClass('d-none');
                $('.post_container').removeClass('d-none');

            }, 2000);

            $('.filter_city').on('click', function(){
                $(".filter_city").each(function() {
                    $(this).removeClass('active');
                });

                $(this).addClass('active');
                $('#filter_city_val').val($(this).data('city'));
            });

            $('#filter_form').on('submit', function(e){
                e.preventDefault();

                var allCats = [];
                $('input:checkbox[name=filter_category]:checked').each(function(){
                    allCats.push($(this).val());
                });
                var city = $('#filter_city_val').val();

                window.location.href = "{{ URL::to('/') }}?city=" + city + "&category=" + allCats;
            });

            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                var value = $('#search_input').val();

                window.location.href = "{{ URL::to('/') }}?search=" + value;
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

        @if (Session::has('post_created'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                html: 'Post has been created successfully'
            });
        @endif
    </script>
@endpush
