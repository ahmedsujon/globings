<div>
    <main>
        <!-- Company Preview  Section  -->
        <section class="company_preview_wrapper mt-24">
            <div class="container">
                <div class="d-flex-between">
                    <h4 class="notification_title">Preview</h4>
                </div>
                <div class="slider_area" id="companySliderArea">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="slider_img">
                                    <img src="{{ asset($event->banner) }}" alt="post image" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post_info_list d-flex align-items-center flex-wrap g-xl">
                    <div class="list_item d-flex align-items-center flex-wrap">
                        <h4>Date:</h4>
                        <h5>{{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</h5>
                    </div>
                </div>
                <h2 class="company_title">{{ $event->name }}</h2>
                <div class="description_area company_bottom_border">
                    <h4 class="notification_title">Description</h4>
                    <p>
                        {{ $event->description }}
                    </p>
                </div>
                <div class="dealer_area company_bottom_border">
                    <button type="button" class="user_img_area" id="dealerProfileBtn">
                        <img src="{{ asset(user($event->id)->avatar) }}" alt="user image" class="user_img" />
                        <div>
                            <div class="dealer">Author</div>
                            <h5 class="sub_login">{{ user($event->id)->first_name }} {{ user($event->id)->last_name }}</h5>
                        </div>
                    </button>
                </div>
            </div>
        </section>
    </main>
</div>
