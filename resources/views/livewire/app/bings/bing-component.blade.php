<div>
    <main>
        <!-- Bings Section  -->
        <section class="bings_wrapper bing_wrapper2 mt-24">
            <div class="container">
                <div class="d-flex-between">
                    <a href="{{ route('app.loyalty.cards') }}" type="button"
                        class="bing_coin_btn bing_coin_top_btn d-flex align-items-center flex-wrap g-smm">
                        <span>Loyalty Cards</span>
                        <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow"
                            class="right_arrow" />
                    </a>
                </div>

                <div class="bing_profile_wrapper">
                    <div class="profile_area text-center">
                        @if (Auth::user()->avatar)
                            <img src="{{ asset(Auth::user()->avatar) }}" alt="user image" class="bing_user_img" />
                        @else
                            <img src="{{ asset('assets/images/avatar.png') }}" alt="user image" class="bing_user_img" />
                        @endif
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="#" class="bing_coin_btn d-flex align-items-center flex-wrap g-smm">
                                <img src="{{ asset('assets/app/icons/bookmark.png') }}" alt="book mark" />
                                <span>{{ user()->bings_balance }} Bings</span>
                                <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow"
                                    class="right_arrow" />
                            </a>
                        </div>
                        <h4>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                    </div>
                    <div class="coupon_collector_area mt-24">
                        <div class="collector_header d-flex-between">
                            <h3>The Bings Race</h3>
                            <button type="button" id="rewardModalBtn">
                                <span> See all </span>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 12L10 8L6 4" stroke="#5897F4" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="collector_bar_area">
                            <div class="position-relative">
                                <div class="active_bar_area" style="width: {{ $progress }}%">
                                    <div class="active_bar"></div>
                                    <div class="tooltip_text">{{ user()->bings_balance }}Bings</div>
                                </div>
                                <div class="bar_line">
                                    <div></div>
                                    <div class="git_item">
                                        <div class="icon">
                                            <img src="{{ asset('assets/app/icons/gift.svg') }}" alt="gift icon" />
                                        </div>
                                        <div class="price">
                                            <span>€5</span>
                                        </div>
                                    </div>
                                    <div class="git_item">
                                        <div class="icon">
                                            <img src="{{ asset('assets/app/icons/gift.svg') }}" alt="gift icon" />
                                        </div>
                                        <div class="price">
                                            <span>€10</span>
                                        </div>
                                    </div>
                                    <div class="git_item">
                                        <div class="icon">
                                            <img src="{{ asset('assets/app/icons/gift.svg') }}" alt="gift icon" />
                                        </div>
                                        <div class="price">
                                            <span>€15</span>
                                        </div>
                                    </div>
                                    <div class="git_item">
                                        <div class="icon">
                                            <img src="{{ asset('assets/app/icons/gift.svg') }}" alt="gift icon" />
                                        </div>
                                        <div class="price">
                                            <span>€20</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collector_grid_area">
                        <div class="collector_grid">
                            <div class="icon">
                                <img src="{{ asset('assets/app/icons/archive_icon.svg') }}" alt="archive icon" />
                            </div>
                            <div class="content_area">
                                <p>
                                    <a href="#">
                                        Get rewarded with 20 bings when your friends signs up using
                                        your invitation!
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="collector_grid">
                            <div class="icon">
                                <img src="{{ asset('assets/app/icons/ract_shape_icon.svg') }}"
                                    alt="react shape icon" />
                            </div>
                            <div class="content_area">
                                <p>
                                    <a href="#">
                                        Get rewarded with $10 when a shop owner signs up using your
                                        invitation!
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Reward Card Modal  -->
    <div class="sing_modal_area reward_modal_area" wire:ignore.self id="rewardModalArea">
        <div class="bings_wrapper pb-0">
            <div class="bing_back_area">
                <div class="container">
                    <div class="d-flex align-items-center flex-wrap g-smm">
                        <button type="button" class="close_btn" id="rewardCloseBtn">
                            <img src="{{ asset('assets/app/icons/arrow-left-2.svg') }}" alt="back icon" />
                        </button>
                        <h6 class="notification_title">Rewards</h6>
                    </div>
                </div>
            </div>
            <div class="reward_grid_area">
                <div class="container">
                    <div class="reward_grid" wire:ignore>
                        <div class="reward_item" data-value="5" data-bings="50" id="rewarConfirmModalBtn">
                            {{-- active_reward --}}
                            <div class="price">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.41666 10.8333H14.0833" stroke="#545C7C" stroke-width="3"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.41666 15.1667H14.0833" stroke="#545C7C" stroke-width="3"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M20.5833 19.0749C19.3584 21.2771 17.1297 22.75 14.5833 22.75C10.7174 22.75 7.58334 19.3548 7.58334 15.1667V10.8333C7.58334 6.64518 10.7174 3.25 14.5833 3.25C17.1297 3.25 19.3584 4.72288 20.5833 6.92511"
                                        stroke="#545C7C" stroke-width="3" stroke-linecap="round" />
                                </svg>

                                <span>5</span>
                            </div>
                            <h5>Convert 50 Bings</h5>
                        </div>
                        <div class="reward_item" data-value="10" data-bings="100" id="rewarConfirmModalBtn">
                            <div class="price">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.41666 10.8333H14.0833" stroke="#545C7C" stroke-width="3"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.41666 15.1667H14.0833" stroke="#545C7C" stroke-width="3"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M20.5833 19.0749C19.3584 21.2771 17.1297 22.75 14.5833 22.75C10.7174 22.75 7.58334 19.3548 7.58334 15.1667V10.8333C7.58334 6.64518 10.7174 3.25 14.5833 3.25C17.1297 3.25 19.3584 4.72288 20.5833 6.92511"
                                        stroke="#545C7C" stroke-width="3" stroke-linecap="round" />
                                </svg>

                                <span>10</span>
                            </div>
                            <h5>Convert 100 Bings or fill in a shop owner</h5>
                        </div>
                        <div class="reward_item" data-value="15" data-bings="150" id="rewarConfirmModalBtn">
                            <div class="price">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.41666 10.8333H14.0833" stroke="#545C7C" stroke-width="3"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.41666 15.1667H14.0833" stroke="#545C7C" stroke-width="3"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M20.5833 19.0749C19.3584 21.2771 17.1297 22.75 14.5833 22.75C10.7174 22.75 7.58334 19.3548 7.58334 15.1667V10.8333C7.58334 6.64518 10.7174 3.25 14.5833 3.25C17.1297 3.25 19.3584 4.72288 20.5833 6.92511"
                                        stroke="#545C7C" stroke-width="3" stroke-linecap="round" />
                                </svg>

                                <span>15</span>
                            </div>
                            <h5>Convert 150 Bings</h5>
                        </div>
                        <div class="reward_item" data-value="20" data-bings="200" id="rewarConfirmModalBtn">
                            <div class="price">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.41666 10.8333H14.0833" stroke="#545C7C" stroke-width="3"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.41666 15.1667H14.0833" stroke="#545C7C" stroke-width="3"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M20.5833 19.0749C19.3584 21.2771 17.1297 22.75 14.5833 22.75C10.7174 22.75 7.58334 19.3548 7.58334 15.1667V10.8333C7.58334 6.64518 10.7174 3.25 14.5833 3.25C17.1297 3.25 19.3584 4.72288 20.5833 6.92511"
                                        stroke="#545C7C" stroke-width="3" stroke-linecap="round" />
                                </svg>

                                <span>20</span>
                            </div>
                            <h5>Convert 200 Bings</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reward Confirm Card Modal  -->
    <div class="sing_modal_area reward_confirm_modal_area" wire:ignore.self id="rewardConfirmModalArea">
        <div class="bings_wrapper pb-0">
            <div class="bing_back_area">
                <div class="container">
                    <div class="d-flex align-items-center flex-wrap g-smm">
                        <button type="button" class="close_btn" id="rewardConfirmCloseBtn">
                            <img src="{{ asset('assets/app/icons/arrow-left-2.svg') }}" alt="back icon" />
                        </button>
                        <h6 class="notification_title">Rewards</h6>
                    </div>
                </div>
            </div>
            <div class="reward_confirm_area">
                <div class="container">
                    <div class="reward_grid">
                        <div class="reward_confirm_item" wire:ignore>
                            <div class="price">
                                <span id="selected_amount"></span>
                            </div>
                            <h5 class="convert_text mt-24">
                                Do you want to convert <span id="selected_bings"></span> bings in <span
                                    id="selected_amount_in_details"></span>?
                            </h5>
                        </div>
                        <div class="button_grid mt-24">
                            <button type="button" id="rewardNoCloseBtn">No</button>
                            <button id="rewarSuccessModalBtn" type="button" class="confirm_yes_btn">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal  -->
    <div class="sing_modal_area success_modal_area" wire:ignore.self id="rewardSuccessModalArea">
        <div class="bings_wrapper pb-0">
            <div class="bing_back_area">
                <div class="container">
                    <div class="d-flex align-items-center flex-wrap g-smm">
                        <button type="button" class="close_btn" id="rewardSuccessCloseBtn">
                            <img src="{{ asset('assets/app/icons/arrow-left-2.svg') }}" alt="back icon" />
                        </button>
                        <h6 class="notification_title">Rewards</h6>
                    </div>
                </div>
            </div>
            <div class="container">
                <form action="" class="mobile_form_area" wire:submit.prevent='redeem'>
                    <div class="input_row">
                        <label for="">Payment Method</label>
                        <select wire:model.live='payment_method' class="input_field">
                            <option value="">Select payment method</option>
                            <option value="bank">Bank</option>
                            <option value="paypal">Paypal</option>
                        </select>
                        @error('payment_method')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($payment_method == 'bank')
                        <div class="input_row">
                            <label for="">Phone Number</label>
                            <input type="text" placeholder="Enter phone number" wire:model.blur='phone' class="input_field" />
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @elseif ($payment_method == 'paypal')
                        <div class="input_row">
                            <label for="">Email</label>
                            <input type="email" placeholder="Enter email" wire:model.blur='email' class="input_field" />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    <div style="margin-top: 15px;">
                        <button type="submit" class="login_btn login_btn_fill" wire:loading.attr='disabled' wire:click.prevent='redeem'>
                            {!! loadingStateWithTextApp('redeem', 'Confirm') !!}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Loyalty Modal  -->
    <div class="sing_modal_area loyalty_modal_area" wire:ignore.self id="loyaltyModalArea">
        <div class="bings_wrapper pb-0">
            <div class="bing_back_area">
                <div class="container">
                    <div class="d-flex align-items-center flex-wrap g-smm">
                        <button type="button" class="close_btn" id="loyaltyCloseBtn">
                            <img src="{{ asset('assets/app/icons/arrow-left-2.svg') }}" alt="back icon" />
                        </button>
                        <h6 class="notification_title">Rewards</h6>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="loaylty_content_area">
                    <form action="" class="post_search_form place_search_form">
                        <input type="search" placeholder="Product Name" />
                        <img src="{{ asset('assets/app/icons/post_search_icon.svg') }}" alt="search icon"
                            class="search_icon" />
                    </form>
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab"
                                aria-controls="pills-home" aria-selected="true">
                                Explored
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">
                                Discover New
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-24" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="loyalty_grid">
                                <div class="loyalty_item">
                                    <div class="price"><span>1 free drink</span></div>
                                    <h5>1 visit on 10</h5>
                                </div>
                                <div class="loyalty_item">
                                    <div class="price"><span>1 meal free</span></div>
                                    <h5>1 visit on 10</h5>
                                </div>
                                <div class="loyalty_item">
                                    <div class="price"><span>1 meal free</span></div>
                                    <h5>1 visit on 10</h5>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="loyalty_grid">
                                <div class="loyalty_item">
                                    <div class="price"><span>1 free drink</span></div>
                                    <h5>1 visit on 10</h5>
                                </div>
                                <div class="loyalty_item">
                                    <div class="price"><span>1 meal free</span></div>
                                    <h5>1 visit on 10</h5>
                                </div>
                                <div class="loyalty_item">
                                    <div class="price"><span>1 meal free</span></div>
                                    <h5>1 visit on 10</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('.reward_item').on('click', function() {
            var value = $(this).data('value');
            var bings = $(this).data('bings');

            $('.reward_item').removeClass('active_reward');
            $(this).addClass('active_reward');

            $('#selected_amount').html('€' + value);
            $('#selected_bings').html(bings);
            $('#selected_amount_in_details').html('€' + value);

            @this.set('amount', value);
            @this.set('bings', bings);
        });


        $(document).ready(function() {
            window.addEventListener('error', event => {
                toast_msg(event.detail[0].message, 'error');
            });

            function toast_msg(msg,type){
                $.toast({
                    heading: "",
                    text: msg,
                    showHideTransition: "slide", //plain,fade
                    icon: type, //success,warning,error,info
                    position: "bottom-center",
                    hideAfter: 3000,
                    loader: true,
                });
            }
        });
    </script>
@endpush
