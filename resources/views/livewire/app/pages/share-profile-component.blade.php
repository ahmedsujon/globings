<div>
    <div class="bings_wrapper pb-90">
        <div class="bing_back_area">
            <div class="container">
                <div class="d-flex align-items-center flex-wrap g-xl">
                    <h6 class="notification_title">Refer a friend</h6>
                </div>
            </div>
        </div>
        <div class="share_area">
            <div class="container">
                <h3 class="bing_inner_title">Share with your friends</h3>
                <div class="share_list d-flex align-items-center justify-content-center flex-wrap mt-4">
                    <div class="share_item">
                        <button type="button" class="share_btn" id="shareModalBtn">
                          <img
                            src="{{ asset('assets/app/icons/bing_share_icon2.svg') }}"
                            alt="bing share icon"
                          />
                        </button>
                        <h4 class="bring_bottom_text">Share</h4>
                      </div>
                      <div class="share_item tooltip_area" id="referCopyBtn">
                        <button type="button" class="share_btn copy_icon">
                          <img
                            src="{{ asset('assets/app/icons/bing_share_icon3.svg') }}"
                            alt="bing share icon"
                          />
                        </button>
                        <h4 class="bring_bottom_text">Copy</h4>
                        <div class="tooltip_item">Copied</div>
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
                        <h4 class="bring_bottom_text">Invite a friend</h4>
                        <p>Using you invite link below</p>
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
