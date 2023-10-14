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
                        <span>150 Bings</span>
                        <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow"
                            class="right_arrow" />
                    </button>
                </div>
                <div class="bing_profile_wrapper">
                    <div class="profile_area text-center">
                        <img src="{{ asset('assets/app/images/bings/bing_user.png') }}" alt="bing user image"
                            class="bing_user_img" />
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="bings-badge.html" class="bing_coin_btn d-flex align-items-center flex-wrap g-smm">
                                <img src="{{ asset('assets/app/icons/bookmark.png') }}" alt="book mark" />
                                <span>150 Bings</span>
                                <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow"
                                    class="right_arrow" />
                            </a>
                        </div>

                        <h4>Fouad Zaher</h4>
                        <h5>@fouadzhar</h5>
                    </div>
                    <div class="reward_card_wrapper">
                        <a href="#" class="reward_card_item">
                            <div>
                                <h4>Get you 10+ Bings invite bonus!</h4>
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
                        </a>
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
                            <a href="bings-reward.html" class="bing_category_item">
                                <img src="{{ asset('assets/app/icons/reward_icon.png') }}" alt="reward icon" />
                                <h4>Rewards by shop</h4>
                            </a>
                            <a href="bings-challange.html" class="bing_category_item">
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
    <div class="sing_modal_area" id="coinModalArea">
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
                    <h3 class="bing_number_title">150 Bings</h3>
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
                            Shop and complete any offer to unlocak your invite bonus from
                            Leigh Pomeranz
                        </h5>
                        <h5>October 26</h5>
                    </div>
                </div>
                <div class="coin_number d-flex align-items-center flex-wrap g-smm">
                    <img src="{{ asset('assets/app/icons/coin_small.svg') }}" alt="coin icon" />
                    <h4>10</h4>
                </div>
            </div>
            <div class="container">
                <div class="coin_history_area">
                    <h3 class="bing_inner_title">Bings History</h3>
                    <div class="history_item_area">
                        <h3>October 26</h3>
                        <div class="coing_emoji_grid">
                            <div class="emoji_area Onboarding_icon_area">
                                <img src="{{ asset('assets/app/icons/bing_coin_icon1.png') }}" alt="bing coin icon" />
                            </div>
                            <div class="conin_content_area">
                                <h4>
                                    <span>Onboarding Bonus</span>
                                    <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" />
                                </h4>
                                <h5>You earned Bings for creating your account</h5>
                                <h5>October 26</h5>
                            </div>
                            <div class="coin_number d-flex align-items-center flex-wrap g-smm">
                                <img src="{{ asset('assets/app/icons/coin_small.svg') }}" alt="coin icon" />
                                <h4>200</h4>
                            </div>
                        </div>
                        <div class="coing_emoji_grid">
                            <div class="emoji_area">
                                <img src="{{ asset('assets/app/icons/bing_coin_icon2.png') }}" alt="bing coin icon" />
                            </div>
                            <div class="conin_content_area">
                                <h4>
                                    <span>Validate my bings</span>
                                    <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" />
                                </h4>
                                <h5>Available for search by opening the QR code</h5>
                                <h5>October 26</h5>
                            </div>
                            <div class="coin_number d-flex align-items-center flex-wrap g-smm">
                                <img src="{{ asset('assets/app/icons/coin_small.svg') }}" alt="coin icon" />
                                <h4>500</h4>
                            </div>
                        </div>
                        <div class="coing_emoji_grid">
                            <div class="emoji_area">
                                <img src="{{ asset('assets/app/icons/bing_coin_icon2.png') }}" alt="bing coin icon" />
                            </div>
                            <div class="conin_content_area">
                                <h4>
                                    <span>Validate my bings</span>
                                    <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" />
                                </h4>
                                <h5>Available for search by opening the QR code</h5>
                                <h5>October 26</h5>
                            </div>
                            <div class="coin_number d-flex align-items-center flex-wrap g-smm">
                                <img src="{{ asset('assets/app/icons/coin_small.svg') }}" alt="coin icon" />
                                <h4>500</h4>
                            </div>
                        </div>
                    </div>
                    <div class="history_item_area">
                        <h3>October 26</h3>
                        <div class="coing_emoji_grid">
                            <div class="emoji_area Onboarding_icon_area">
                                <img src="{{ asset('assets/app/icons/bing_coin_icon2.png') }}" alt="bing coin icon" />
                            </div>
                            <div class="conin_content_area">
                                <h4>
                                    <span>Onboarding Bonus</span>
                                    <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" />
                                </h4>
                                <h5>You earned Bings for creating your account</h5>
                                <h5>October 26</h5>
                            </div>
                            <div class="coin_number d-flex align-items-center flex-wrap g-smm">
                                <img src="{{ asset('assets/app/icons/coin_small.svg') }}" alt="coin icon" />
                                <h4>200</h4>
                            </div>
                        </div>
                        <div class="coing_emoji_grid">
                            <div class="emoji_area share_refer_icon_area">
                                <img src="{{ asset('assets/app/icons/bing_coin_icon3.png') }}" alt="bing coin icon" />
                            </div>
                            <div class="conin_content_area">
                                <h4>
                                    <span>Share refer friend</span>
                                    <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" />
                                </h4>
                                <h5>You referred your friend</h5>
                                <h5>October 26</h5>
                            </div>
                            <div class="coin_number d-flex align-items-center flex-wrap g-smm">
                                <img src="{{ asset('assets/app/icons/coin_small.svg') }}" alt="coin icon" />
                                <h4>500</h4>
                            </div>
                        </div>
                        <div class="coing_emoji_grid">
                            <div class="emoji_area">
                                <img src="{{ asset('assets/app/icons/bing_coin_icon2.png') }}" alt="bing coin icon" />
                            </div>
                            <div class="conin_content_area">
                                <h4>
                                    <span>Validate my bings</span>
                                    <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" />
                                </h4>
                                <h5>Available for search by opening the QR code</h5>
                                <h5>October 26</h5>
                            </div>
                            <div class="coin_number d-flex align-items-center flex-wrap g-smm">
                                <img src="{{ asset('assets/app/icons/coin_small.svg') }}" alt="coin icon" />
                                <h4>500</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bings Coin History Modal  -->

    <!-- Bidges Invite Friends Modal  -->
    <div class="sing_modal_area" id="loalModalArea">
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
                    <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" class="right_arrow" />
                </div>
                <div class="badge_profilel_area text-center">
                    <img src="{{ asset('assets/app/icons/badge_star_icon.png') }}" alt="badge star icon" class="badge_star_icon" />
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
                            <h4>1,500</h4>
                            <h4><span>1965/</span> 20,000</h4>
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
                            <div class="circle_area">
                                <div class="small" data-percent="100" data-progressBarColor="#5897F4"></div>
                                <img src="{{ asset('assets/app/icons/badge_shape_icon1.png') }}" alt="badge shape" class="badge_shape" />
                                <img src="{{ asset('assets/app/icons/badge_check_icon.png') }}" alt="badge check icon"
                                    class="badge_check" />
                                <div class="badge_group_outer">
                                    <div class="group_inner">G1</div>
                                </div>
                            </div>
                            <div class="progres_text_area">
                                <h5>Silver Reviewer</h5>
                            </div>
                        </div>
                        <div class="circle_progress_item">
                            <div class="circle_area">
                                <div class="small" data-percent="100" data-progressBarColor="#FE7B1E"></div>
                                <img src="{{ asset('assets/app/icons/badge_shape_icon12.png') }}" alt="badge shape" class="badge_shape" />
                                <img src="{{ asset('assets/app/icons/badge_check_icon.png') }}" alt="badge check icon"
                                    class="badge_check" />
                                <div class="badge_group_outer">
                                    <div class="group_inner">G2</div>
                                </div>
                            </div>
                            <div class="progres_text_area">
                                <h5>Bronze Photographer</h5>
                            </div>
                        </div>
                        <div class="circle_progress_item">
                            <div class="circle_area">
                                <div class="small" data-percent="100" data-progressBarColor="#41B631"></div>
                                <img src="{{ asset('assets/app/icons/badge_shape_icon13.png') }}" alt="badge shape" class="badge_shape" />
                                <img src="{{ asset('assets/app/icons/badge_check_icon.png') }}" alt="badge check icon"
                                    class="badge_check" />
                                <div class="badge_group_outer">
                                    <div class="group_inner">G3</div>
                                </div>
                            </div>
                            <div class="progres_text_area">
                                <h5>Bronze Traiblazer</h5>
                            </div>
                        </div>
                        <div class="circle_progress_item">
                            <div class="circle_area">
                                <div class="small" data-percent="50" data-progressBarColor="#5897F4"></div>
                                <img src="{{ asset('assets/app/icons/badge_shape_icon1.png') }}" alt="badge shape" class="badge_shape" />

                                <div class="badge_group_outer">
                                    <div class="group_inner">G4</div>
                                </div>
                            </div>
                            <div class="progres_text_area">
                                <h5>Silver Reviewer</h5>
                                <div class="badge_status_btn">Upcoming</div>
                            </div>
                        </div>
                        <div class="circle_progress_item">
                            <div class="circle_area">
                                <div class="small" data-percent="10" data-progressBarColor="#FE7B1E"></div>
                                <img src="{{ asset('assets/app/icons/badge_shape_icon12.png') }}" alt="badge shape" class="badge_shape" />

                                <div class="badge_group_outer">
                                    <div class="group_inner">G5</div>
                                </div>
                            </div>
                            <div class="progres_text_area">
                                <h5>Bronze Photographer</h5>
                            </div>
                        </div>
                        <div class="circle_progress_item">
                            <div class="circle_area">
                                <div class="small" data-percent="60" data-progressBarColor="#41B631"></div>
                                <img src="{{ asset('assets/app/icons/badge_shape_icon13.png') }}" alt="badge shape" class="badge_shape" />

                                <div class="badge_group_outer">
                                    <div class="group_inner">G6</div>
                                </div>
                            </div>
                            <div class="progres_text_area">
                                <h5>Bronze Traiblazer</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bidges Invite Friends Modal  -->
</div>