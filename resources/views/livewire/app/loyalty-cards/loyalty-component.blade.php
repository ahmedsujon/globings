<div>
    <main>
        <!-- Loyalty Modal  -->
        <div class="loyalty_modal_area">
            <div class="bings_wrapper pb-0">
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
                                    @foreach ($rewarded_shops as $rewarded_shop)
                                        <div class="loyalty_item">
                                            <div class="price"><span>{{ $rewarded_shop->visit_gift }}</span></div>
                                            <h5>0 visit on{{ $rewarded_shop->visit_time }}</h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="loyalty_grid">
                                    @foreach ($discover_shops as $discover_shop)
                                        <div class="loyalty_item">
                                            <div class="price"><span>1 free drink</span></div>
                                            <h5>1 visit on 10</h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
