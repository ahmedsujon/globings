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
    
</div>
