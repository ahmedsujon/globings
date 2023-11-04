<div>
    <main>
        <!-- Company Location Section  -->
        <section class="company_location_wrapper">
            <div class="location_area location_all_shop_area">
                <div class="container">
                    <h4 class="notification_title">Recent Events</h4>
                    @foreach ($events as $event)
                    <div class="location_item">
                        <div class="position-relative">
                            <img src="{{ asset('assets/app/images/post/location_img.png') }}" alt="post image" class="post_img" />
                            <div class="info_area">
                                <div class="container">
                                    <div class="d-flex-between">
                                        <h4>Barber shop</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <h3>{{ $event->name }}</h3>
                            <h5><img src="{{ asset('assets/app/icons/clock.svg') }}"></img> 
                                @if (Carbon\Carbon::parse($event->date)->isToday())
                                {{ $event->date }} <span>Open now</span>
                            @else
                                {{ $event->date }}
                            @endif    
                            </h5>
                            <h5><img src="{{ asset('assets/app/icons/location.svg') }}"></img> {{ $event->location }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</div>
