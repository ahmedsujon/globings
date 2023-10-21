<div>
    <div class="profile_modal_area pt-24">
        <div class="container" style="margin-bottom: 75px;">
            <h4 class="notification_title">Profile</h4>

            <div class="cover_img mt-24">
                <img src="{{ asset($shop->cover_photo) }}" alt="cover image" />
            </div>
            <div class="user_img_area">
                <img src="{{ asset($shop->profile_image) }}" alt="user image" />
            </div>
            <div class="user_info">
                <h4 class="notification_title">{{ $shop->name }}</h4>
                <h5>{{ '@' . $user->username }}</h5>
            </div>
            <div class="user_location_info">
                <h3>{{ $shop->description }}</h3>
                <div class="location_outer_grid">
                    <div class="location_grid">
                        <img src="{{ asset('assets/app/icons/calendar.svg') }}" alt="calender" />
                        <h4 class="location_title">Joined {{ Carbon\Carbon::parse($shop->created_at)->format('F Y') }}</h4>
                    </div>
                    <div class="location_grid">
                        <img src="{{ asset('assets/app/icons/location.svg') }}" alt="calender" />
                        <h4 class="location_title">{{ $shop->address }}</h4>
                    </div>
                </div>
                <div class="message_btn_grid d-flex align-items-center flex-wrap">
                    <button type="button" class="message_btn follow_btn">
                        Follow
                    </button>
                    {{-- <a href="#" class="message_btn">Send Message</a> --}}
                </div>
            </div>
            <!-- Post Home Section  -->
            <section class="post_home_wrapper" id="homePostArea">
                <div class="container">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <div class="post_grid">
                                <div class="hash_area">
                                    <div class="hash_icon">
                                        <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                                        {{-- <h4>Bruxelles</h4> --}}
                                    </div>
                                    <div class="middle_bar"></div>
                                    <a href="{{ route('app.userProfile', ['id' => $post->user_id]) }}" type="button"
                                        class="post_user_area">
                                        <img src="{{ asset(getUserProfileHome($post->user_id)->avatar) }}" alt=""
                                            class="user_img" />
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
                    @endif

                    {{-- <div class="post_grid">
                        <div class="hash_area">
                            <div class="hash_icon">
                                <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                                <h4>Bruxelles</h4>
                            </div>
                            <div class="middle_bar"></div>
                            <button type="button" class="post_user_area">
                                <img src="{{ asset('assets/app/images/post/post_img3.png') }}" alt="" class="user_img" />
                                <h5>Le Fuse</h5>
                            </button>
                        </div>
                        <div class="post_area">
                            <div class="swiper post_slider1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider_img">
                                            <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="post image" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider_img">
                                            <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="post image" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="action_area d-flex align-items-center flex-wrap">
                                <button type="button" class="heart_icon" id="heartIcon">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                                            stroke="#F73636" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button type="button"
                                    class="coment_area postCommentBtn d-flex align-items-center flex-wrap">
                                    <img src="{{ asset('assets/app/icons/comment_icon.svg') }}" alt="comment icon" />
                                    <h5>Comment</h5>
                                </button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </section>
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
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
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


            window.addEventListener('postCreated', event => {
                $("#postCreateModalArea").removeClass("sing_modal_active");
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    html: 'Post has been created successfully'
                });
            });

        });
    </script>
@endpush
