<div>
    <section class="company_location_wrapper">
        <div class="location_area location_all_shop_area">
            <div class="container">
                <h4 class="notification_title">My Bookmarks</h4>
                <hr>

                @if ($shops->count() > 0)
                    @foreach ($shops as $shop)
                        <div class="location_item">
                            <div class="position-relative">
                                <img src="{{ asset($shop->cover_photo) }}" alt="post image" class="post_img" />
                                <div class="info_area">
                                    <div class="container">
                                        <div class="d-flex-between">
                                            <h4>{{ $shop->shop_category }}</h4>
                                            <div class="ratting_area">
                                                <img src="{{ asset('assets/app/icons/star_small_icon.svg') }}" alt="star small icon" />
                                                <span>{{ avgShopReview($shop->id) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="content">
                                <a href="{{ route('app.shopProfile', ['user_id'=>$shop->user_id]) }}"><h3>{{ $shop->name }}</h3></a>
                                <h5>{{ $shop->address }} @if ($shop->is_open == 1)
                                    <span> . Open now</span> @else <span style="color: red;"> . Closed Now</span>
                                @endif</h5>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="location_item" style="text-align: center;">
                    <p style="font-size: 15px;">No shop in bookmarks</p>
                </div>
                @endif
            </div>
        </div>
    </section>
</div>
