<div>
    <main>
        <!-- Bings Section  -->
        <section class="bings_wrapper mt-24">
            <div class="container">
                <div class="d-flex-between">
                    <a href="#" class="bing_setting_icion">
                        <img src="{{ asset('assets/app/icons/settings.svg') }}" alt="setting icon" />
                    </a>
                    <button type="button"
                        class="bing_coin_btn bing_coin_top_btn d-flex align-items-center flex-wrap g-smm"
                        id="coinModalBtn">
                        <img src="{{ asset('assets/app/icons/store_green_icon.svg') }}" alt="coin" />
                        <span>{{ user()->bings_balance }} Bings</span>
                        <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow"
                            class="right_arrow" />
                    </button>
                </div>
                <div class="bing_profile_wrapper">
                    <div class="profile_area text-center">
                        @if (Auth::user()->avatar)
                            <img src="{{ asset(Auth::user()->avatar) }}" alt="user image" class="bing_user_img" />
                        @else
                            <img src="{{ asset('assets/images/avatar.png') }}" alt="user image" class="bing_user_img" />
                        @endif
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="bings-badge.html" class="bing_coin_btn d-flex align-items-center flex-wrap g-smm">
                                <img src="{{ asset('assets/app/icons/bookmark.png') }}" alt="book mark" />
                                <span>{{ user()->bings_balance }} Bings</span>
                                <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow"
                                    class="right_arrow" />
                            </a>
                        </div>

                        <h4>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                        <h5><span>@</span>{{ Auth::user()->username }}</h5>
                    </div>
                    <div class="reward_card_wrapper">
                        <button href="#" class="reward_card_item" id="inviteModalBtn">
                            <div>
                                <h4>Get your 10+ Bings invite bonus!</h4>
                                <h5>
                                    Just send your friend
                                    <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow"
                                        class="right_arrow" />
                                </h5>
                            </div>
                            <div class="text-end">
                                <img src="{{ asset('assets/app/icons/bings_invite_icon.svg') }}" alt="invite icon"
                                    class="invite_icon" />
                            </div>
                        </button>
                        <button type="button" class="reward_card_item" id="localModalBtn">
                            <div>
                                <h4>Status Bings</h4>
                                <h5>
                                    Rewards by shop Bonus & challenges
                                    <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow"
                                        class="right_arrow" />
                                </h5>
                            </div>
                            <div class="text-end">
                                <img src="{{ asset('assets/app/icons/bings_invite_icon2.svg') }}" alt="invite icon"
                                    class="invite_icon" />
                            </div>
                        </button>
                    </div>
                    <div class="bing_category_wrapper mb-5">
                        <h4 class="bing_inner_title">Explore Bings by category</h4>
                        <div class="category_grid">
                            <a href="#" class="bing_category_item">
                                <img src="{{ asset('assets/app/icons/reward_icon.png') }}" alt="reward icon" />
                                <h4>Rewards by shop</h4>
                            </a>
                            <a href="#" class="bing_category_item">
                                <img src="{{ asset('assets/app/icons/bouns_icon.png') }}" alt="bonus icon" />
                                <h4>Bonus & challenges</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Bings Coin History Modal  -->
    <div wire:ignore.self class="sing_modal_area" id="coinModalArea">
        <div class="bings_wrapper pb-0">
            <div class="bing_back_area">
                <div class="container">
                    <div class="d-flex align-items-center flex-wrap g-xl">
                        <button type="button" class="close_btn" id="coainCloseBtn">
                            <img src="{{ asset('assets/app/icons/coain_back_icon.svg') }}" alt="back icon" />
                        </button>
                        <h6 class="notification_title">Bings</h6>
                    </div>
                </div>
            </div>
            <div class="coin_number_area text-center">
                <div class="d-flex align-items-center justify-content-center flex-wrap g-smm">
                    <img src="{{ asset('assets/app/icons/coin_big.svg') }}" alt="coin icion" />
                    <h3 class="bing_number_title">{{ user()->bings_balance }} Bings</h3>
                </div>
                <h5>Total</h5>
            </div>
            <div class="coing_emoji_grid">
                <div class="emoji_area">
                    <img src="{{ asset('assets/app/icons/love_emoji.png') }}" alt="love emoji" />
                </div>
                <div class="conin_content_area">
                    <h4>
                        <span>Your referall bonus</span>
                        <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" />
                    </h4>
                    <div class="inner_content">
                        <h5>
                            Shop and complete any offer to unlock your referral bonuses
                        </h5>
                    </div>
                </div>
                <div class="coin_number d-flex align-items-center flex-wrap g-smm">
                    <img src="{{ asset('assets/app/icons/coin_small.svg') }}" alt="coin icon" />
                    <h4>{{ $referred_bings }}</h4>
                </div>
            </div>
            <div class="container" wire:poll>
                <div class="coin_history_area">
                    <h3 class="bing_inner_title">Bings History</h3>

                    @foreach ($histories as $history)
                        <div class="history_item_area">
                            <h3>{{ $history['date'] }}</h3>

                            @foreach ($history['data'] as $data)
                                <div class="coing_emoji_grid">
                                    <div class="emoji_area Onboarding_icon_area">
                                        @if ($data->type == 'referral')
                                            <img src="{{ asset('assets/app/icons/bing_coin_icon3.png') }}"
                                                alt="bing coin icon" />
                                        @elseif($data->type == 'validation')
                                            <img src="{{ asset('assets/app/icons/bing_coin_icon2.png') }}"
                                                alt="bing coin icon" />
                                        @else
                                            <img src="{{ asset('assets/app/icons/bing_coin_icon1.png') }}"
                                                alt="bing coin icon" />
                                        @endif

                                    </div>
                                    <div class="conin_content_area">
                                        <h4>
                                            <span>{{ $data->bings_for }}</span>
                                            <img src="{{ asset('assets/app/icons/chevron-right.svg') }}"
                                                alt="right arrow" />
                                        </h4>
                                        <h5>{{ $data->description }}</h5>
                                        {{-- <h5>{{ date('jS F', strtotime($data->created_at)) }}</h5> --}}
                                    </div>
                                    <div class="coin_number d-flex align-items-center flex-wrap g-smm">
                                        <img src="{{ asset('assets/app/icons/coin_small.svg') }}" alt="coin icon" />
                                        <h4>{{ $data->bings }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Bings Coin History Modal  -->

    <!-- Badges Modal  -->
    <div class="sing_modal_area" id="loalModalArea" wire:ignore.self>
        <div class="bings_wrapper pb-0">
            <div class="bing_back_area">
                <div class="container">
                    <div class="d-flex align-items-center flex-wrap g-xl">
                        <button type="button" class="close_btn" id="badgesCloseBtn">
                            <img src="{{ asset('assets/app/icons/coain_back_icon.svg') }}" alt="back icon" />
                        </button>
                        <h6 class="notification_title">Badges</h6>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="local_grid">
                    <p>See your own Local Guides status Go to your contributions</p>
                    <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow"
                        class="right_arrow" />
                </div>
                <div class="badge_profilel_area text-center">
                    <img src="{{ asset('assets/app/icons/badge_star_icon.png') }}" alt="badge star icon"
                        class="badge_star_icon" />
                    <div>
                        <h4 class="company_inner_title">Local Guide</h4>
                        <h5 class="bidge_sub_text bidge_leavel mt-1">Level 3</h5>
                    </div>

                    <div class="progress_area">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress_number_area d-flex-between">
                            <h4>{{ user()->bings_balance }}</h4>
                            <h4><span>{{ user()->total_bings }} /</span> 20,000</h4>
                        </div>
                        <h5 class="bidge_sub_text text-start">
                            As you help other people, you earn points for each contribution
                            and get closer to the next level.
                        </h5>
                    </div>
                </div>
                <div class="circle_progress_area">
                    <h4 class="bing_inner_title">Badges</h4>
                    <div class="progress_grid">
                        <div class="circle_progress_item">
                            <div class="badge_img_area">
                                @if (user()->total_bings >= 250)
                                    <img src="{{ asset('assets/app/icons/badges/active-badge-1.png') }}"
                                        alt="badge check icon" class="badge_img" />
                                @else
                                    <img src="{{ asset('assets/app/icons/badges/badge-1.png') }}"
                                        alt="badge check icon" class="badge_img" />
                                @endif

                            </div>
                            <div class="progres_text_area">
                                <h5>Silver Reviewer</h5>
                                @if (user()->total_bings < 250)
                                   <div class="badge_status_btn">Upcoming</div>
                                @endif
                            </div>
                        </div>
                        <div class="circle_progress_item">
                            <div class="badge_img_area">
                                @if (user()->total_bings >= 500)
                                <img src="{{ asset('assets/app/icons/badges/active-badge-2.png') }}"
                                alt="badge check icon" class="badge_img" />
                                @else
                                    <img src="{{ asset('assets/app/icons/badges/badge-2.png') }}"
                                    alt="badge check icon" class="badge_img" />
                                @endif
                            </div>
                            <div class="progres_text_area">
                                <h5>Bronze Photographer</h5>
                                @if (user()->total_bings < 500)
                                   <div class="badge_status_btn">Upcoming</div>
                                @endif
                            </div>
                        </div>
                        <div class="circle_progress_item">
                            <div class="badge_img_area">
                                @if (user()->total_bings >= 750)
                                <img src="{{ asset('assets/app/icons/badges/active-badge-3.png') }}"
                                alt="badge check icon" class="badge_img" />
                                @else
                                    <img src="{{ asset('assets/app/icons/badges/badge-3.png') }}"
                                    alt="badge check icon" class="badge_img" />
                                @endif

                            </div>
                            <div class="progres_text_area">
                                <h5>Bronze Traiblazer</h5>
                                @if (user()->total_bings < 750)
                                   <div class="badge_status_btn">Upcoming</div>
                                @endif
                            </div>
                        </div>
                        <div class="circle_progress_item">
                            <div class="badge_img_area">
                                @if (user()->total_bings >= 1000)
                                <img src="{{ asset('assets/app/icons/badges/active-badge-4.png') }}"
                                alt="badge check icon" class="badge_img" />
                                @else
                                   <img src="{{ asset('assets/app/icons/badges/badge-4.png') }}"
                                    alt="badge check icon" class="badge_img" />
                                @endif

                            </div>
                            <div class="progres_text_area">
                                <h5>Silver Reviewer</h5>
                                @if (user()->total_bings < 1000)
                                   <div class="badge_status_btn">Upcoming</div>
                                @endif
                            </div>
                        </div>
                        <div class="circle_progress_item">
                            <div class="badge_img_area">
                                @if (user()->total_bings >= 1250)
                                    <img src="{{ asset('assets/app/icons/badges/active-badge-5.png') }}"
                                    alt="badge check icon" class="badge_img" />
                                @else
                                <img src="{{ asset('assets/app/icons/badges/badge-5.png') }}"
                                alt="badge check icon" class="badge_img" />
                                @endif

                            </div>
                            <div class="progres_text_area">
                                <h5>Bronze Traiblazer</h5>
                                @if (user()->total_bings < 1250)
                                   <div class="badge_status_btn">Upcoming</div>
                                @endif
                            </div>
                        </div>
                        <div class="circle_progress_item">
                            <div class="badge_img_area">
                                @if (user()->total_bings >= 1500)
                                    <img src="{{ asset('assets/app/icons/badges/active-badge-6.png') }}"
                                    alt="badge check icon" class="badge_img" />
                                @else
                                <img src="{{ asset('assets/app/icons/badges/badge-6.png') }}"
                                alt="badge check icon" class="badge_img" />
                                @endif
                            </div>
                            <div class="progres_text_area">
                                <h5>Bronze Traiblazer</h5>
                                @if (user()->total_bings < 1500)
                                   <div class="badge_status_btn">Upcoming</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Binges Invite Modal  -->
    <div wire:ignore.self class="sing_modal_area" id="inviteModalArea">
        <div class="bings_wrapper pb-0">
            <div class="bing_back_area">
                <div class="container">
                    <div class="d-flex align-items-center flex-wrap g-xl">
                        <button type="button" class="close_btn" id="inviteCloseBtn">
                            <img src="{{ asset('assets/app/icons/coain_back_icon.svg') }}" alt="back icon" />
                        </button>
                        <h6 class="notification_title">Refer a friend</h6>
                    </div>
                </div>
            </div>
            <div class="share_area">
                <div class="container">
                    <div style="width: 100%; text-align: center;">
                        <h3 class="bing_inner_title">My Referral Code</h3>
                        <h4 style="padding: 30px 0px;"><strong>{{ user()->referral_code }}</strong></h4>
                    </div>

                    <div class="share_list d-flex align-items-center justify-content-center flex-wrap mt-4">
                        <div class="share_item">
                            <button type="button" class="share_btn message_icon">
                                <img src="{{ asset('assets/app/icons/bing_share_icon1.svg') }}"
                                    alt="bing share icon" />
                            </button>
                            <h4 class="bring_bottom_text">Text</h4>
                        </div>
                        <div class="share_item">
                            <button type="button" class="share_btn">
                                <img src="{{ asset('assets/app/icons/bing_share_icon2.svg') }}"
                                    alt="bing share icon" />
                            </button>
                            <h4 class="bring_bottom_text">Share</h4>
                        </div>
                        <div class="share_item">
                            <button type="button" class="share_btn copy_icon">
                                <img src="{{ asset('assets/app/icons/bing_share_icon3.svg') }}"
                                    alt="bing share icon" />
                            </button>
                            <h4 class="bring_bottom_text">Copy</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="refer_invite_area">
                    <h3 class="bing_inner_title">How to get a referral bonus</h3>
                    <div class="refer_grid">
                        <div class="number bing_inner_title">1</div>
                        <div>
                            <h4 class="bring_bottom_text">Refer a friend</h4>
                            <p>Using your referral code</p>
                        </div>
                    </div>
                    <div class="refer_grid">
                        <div class="number bing_inner_title">2</div>
                        <div>
                            <h4 class="bring_bottom_text">They sign up and shop</h4>
                            <p>Any shop offer QR Code to get bings</p>
                        </div>
                    </div>
                    <div class="refer_grid">
                        <div class="number bing_inner_title">3</div>
                        <div>
                            <h4 class="bring_bottom_text">Get bonus bings</h4>
                            <p>Earn you referral bonus</p>
                        </div>
                    </div>
                </div>
                <div class="terms_area">
                    <a href="{{ route('app.terms-and-conditions') }}" class="terms_text">
                        Terms and Conditions
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
