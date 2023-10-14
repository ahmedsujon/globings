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
                        <img src="{{ asset('assets/app/icons/chevron-right.svg') }}" alt="right arrow" class="right_arrow" />
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
</div>