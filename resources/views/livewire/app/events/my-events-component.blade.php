<div>
    <header class="home_header_wrapper mt-24">
        <div class="container">
            <div class="d-flex-between">
                <a href="{{ route('app.home') }}" class="logo">
                    <img src="{{ asset('assets/app/images/header/header_logo.svg') }}" alt="logo" />
                </a>
                <ul class="header_right_list d-flex align-items-center justify-content-end flex-wrap">
                    <li>
                        <a href="{{ route('app.events.create') }}">
                            <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/app/icons/heart.svg') }}" alt="heart icon" />
                        </a>
                    </li>
                    <li>
                        @if (user())
                            <a href="{{ route('app.bings') }}" class="header_number_area">
                                <span class="circle_shape"></span>
                                <span class="number">{{ user()->bings_balance }}</span>
                                <img src="{{ asset('assets/app/icons/header_right_logo_icon.svg') }}" alt="plus icon"
                                    class="right_shape" />
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
            <form action="" id="searchForm" class="header_search">
                <input type="text" placeholder="Search" id="search_input" value="{{ request()->get('search') }}" />
                <button class="search_icon" type="submit">
                    <img src="{{ asset('assets/app/icons/search-lg.svg') }}" alt="search icon" />
                </button>
            </form>
        </div>
    </header>
    <main>
        <!-- Company Location Section  -->
        <section class="company_location_wrapper">
            <div class="location_area location_all_shop_area">
                <div class="container">
                    <h4 class="notification_title">My Events</h4>
                    @foreach ($events as $event)
                        <div class="location_item">
                            <div class="position-relative">
                                <a href="{{ route('app.event.details', ['id' => $event->id]) }}">
                                    @if ($event->extension == 'mp4' || $event->extension =='avi' || $event->extension =='mov')
                                        <video class="roundeds post_img" alt="200x200" width="200" height="120"
                                            width="100%" controls>
                                            <source src="{{ asset($event->banner) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @elseif ($event->extension == 'jpg' || $event->extension =='jpeg' || $event->extension =='png' || $event->extension =='gif')
                                        <img class="roundeds" alt="200x200" width="100%" height="100%"
                                            src="{{ asset($event->banner) }}" alt="Image" class="post_img">
                                    @else
                                        <p>This file type is not supported.</p>
                                    @endif
                                </a>
                                <div class="info_area">
                                    <div class="container">
                                        <div class="d-flex-between">
                                            {{-- <h4><a href="{{ route('app.shopProfile', ['user_id' => $post->user_id]) }}">Barber shop</a></h4> --}}
                                            {{-- <h4><a href="#">Barber shop</a></h4> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <h3><a
                                        href="{{ route('app.event.details', ['id' => $event->id]) }}">{{ $event->name }}</a>
                                </h3>
                                <h5><img src="{{ asset('assets/app/icons/clock.svg') }}">
                                    @if (Carbon\Carbon::parse($event->date)->isToday())
                                        {{ $event->date }} <span>Open now</span>
                                    @else
                                        {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}
                                    @endif
                                </h5>
                                <h5><img src="{{ asset('assets/app/icons/location.svg') }}">
                                    {{ $event->location }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</div>
