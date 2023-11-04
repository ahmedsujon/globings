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
                                <a href="{{ route('app.event.details', ['id' => $event->id]) }}">
                                    <img src="{{ asset('assets/app/images/post/location_img.png') }}" alt="post image"
                                        class="post_img" />
                                </a>
                                <div class="info_area">
                                    <div class="container">
                                        <div class="d-flex-between">
                                            {{-- <h4><a href="{{ route('app.shopProfile', ['user_id' => $post->user_id]) }}">Barber shop</a></h4> --}}
                                            <h4><a href="#">Barber shop</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <h3><a href="{{ route('app.event.details', ['id' => $event->id]) }}">{{ $event->name }}</a></h3>
                                <h5><img src="{{ asset('assets/app/icons/clock.svg') }}"></img>
                                    @if (Carbon\Carbon::parse($event->date)->isToday())
                                        {{ $event->date }} <span>Open now</span>
                                    @else
                                        {{ $event->date }}
                                    @endif
                                </h5>
                                <h5><img src="{{ asset('assets/app/icons/location.svg') }}"></img>
                                    {{ $event->location }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</div>
