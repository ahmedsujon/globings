<div>
    <button type="button" class="mobile_menu_close" id="mobileMenuClose">
        <img src="{{ asset('assets/app/icons/menu_close_icon.svg') }}" alt="close icon" />
    </button>

    <!-- Home  Section  -->
    <header class="home_header_wrapper mt-24">
        <div class="container">
            <div class="d-flex-between">
                <a href="#" class="logo">
                    <img src="{{ asset('assets/app/images/header/header_logo.svg') }}" alt="logo" />
                </a>
                <ul class="header_right_list d-flex align-items-center justify-content-end flex-wrap">
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                        </a>
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
                            <img src="{{ asset('assets/app/icons/header_right_logo_icon.svg') }}" alt="plus icon" class="right_shape" />
                        </a>
                    </li>
                </ul>
            </div>
            <form action="" class="header_search">
                <input type="text" placeholder="Search" />
                <button class="search_icon" type="submit">
                    <img src="{{ asset('assets/app/icons/search-lg.svg') }}" alt="search icon" />
                </button>
                <button class="filter_icon" type="button">
                    <img src="{{ asset('assets/app/icons/filter_icon.svg') }}" alt="filter icon" />
                </button>
            </form>
        </div>
    </header>
    <!-- Category Slider Section  -->
    <section class="category_slider_area" id="headerCategorySlider">
        <div class="container" wire:ignore>
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
    </section>
    <!-- Post Home Section  -->
    <section class="post_home_wrapper" id="homePostArea">
        <div class="container">
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="post_grid">
                        <div class="hash_area">
                            <div class="hash_icon">
                                <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                                <h4>Bruxelles</h4>
                            </div>
                            <div class="middle_bar"></div>
                            <button type="button" class="post_user_area postUserBtn">
                                <img src="{{ asset(getUserProfileHome($post->user_id)->avatar) }}" alt="" class="user_img" />
                            </button>
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
                                <button type="button" data-post_id="{{ $post->id }}" class="heart_icon add_like_btn {{ isLiked($post->id) ? 'selected_heart' : '' }}" id="heartIcon">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                                            stroke="#F73636" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button type="button" wire:click.prevent='getPostInfo({{ $post->id }})' class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
                                    <img src="{{ asset('assets/app/icons/comment_icon.svg') }}" alt="comment icon" />
                                    <h5>Comment</h5>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else

            @endif
        </div>
    </section>

    <div class="comment_modal" wire:ignore.self id="commentModalArea">
        <div class="container" style="user-select: none;">
            <div class="d-flex-between">
                <div class="like_area">
                    <button type="button" class="totalReactBtn d-flex align-items-center flex-wrap">
                        <img src="{{ asset('assets/app/icons/heart_comment_icon.svg') }}" alt="heart icon" class="heart_icon" />
                        <span>{{ $total_like }}</span>
                        <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" />
                    </button>
                </div>
                <button type="button" class="close_icon" id="commentModalClose">
                    <img src="{{ asset('assets/app/icons/modal_close_icon.svg') }}" alt="" />
                </button>
            </div>
            <div class="comment_filter_area" wire:ignore>
                <select class="niceSelect">
                    <option data-display="Top comments">Top comments</option>
                    <option value="1">Most Recent</option>
                    <option value="2">Oldest Comment</option>
                </select>
            </div>
            <div class="comment_wraper">
                @if ($comments != false && $comments->count() > 0)
                    @foreach ($comments as $comment)
                        <div>
                            <div class="comment_item {{ post_comment_replies_count($comment->id) > 0 ? 'nested_comment':'' }}">
                                <div>
                                    <img src="{{ asset( getCommentUser($comment->user_id)->avatar ) }}" alt="user " class="comment_user" />
                                </div>
                                <div>
                                    <div class="comment">
                                        <h4>{{ getCommentUser($comment->user_id)->first_name }} {{ getCommentUser($comment->user_id)->last_name }}</h4>
                                        <p>{{ $comment->comment }}</p>
                                    </div>

                                    <div class="info d-flex align-items-center flex-wrap">
                                        <div class="time">{{ substr($comment->created_at->diffForHumans(), 0, 3) }}</div>
                                        <button type="button" class="likeBtn like_active">
                                            Like
                                        </button>
                                        <button type="button" wire:click.prevent='replyComment({{ $comment->id }})' class="replayBtn">Reply</button>
                                    </div>
                                </div>
                            </div>

                            @if (post_comment_replies_count($comment->id) > 0)
                                <div class="nested_comment_area">
                                    @foreach (post_comment_replies($comment->id) as $reply)
                                        <div class="comment_item">
                                            <div>
                                                <img src="{{ asset('assets/app/images/post/comment_user2.png') }}" alt="user "
                                                    class="comment_user" />
                                            </div>
                                            <div>
                                                <div class="comment">
                                                    <h4>{{ getCommentUser($reply->user_id)->first_name }} {{ getCommentUser($reply->user_id)->last_name }}</h4>
                                                    <p>
                                                        {{ $reply->comment }}
                                                    </p>
                                                </div>

                                                <div class="info d-flex align-items-center flex-wrap">
                                                    <div class="time">{{ substr($reply->created_at->diffForHumans(), 0, 3) }}</div>
                                                    <button type="button" class="likeBtn">Like</button>
                                                    <button type="button" wire:click.prevent='replyComment({{ $comment->id }})' class="replayBtn">Reply</button>
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
                <input type="text" placeholder="Write a comment..." wire:model.blur='comment' class="input_filed comment_field" />
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.add_like_btn').on('click', function(){
                var post_id = $(this).data('post_id');
                @this.like(post_id);
            });

            window.addEventListener('focusOnComment', event => {
                $('.comment_field').focus();
            });
        });
    </script>
@endpush
