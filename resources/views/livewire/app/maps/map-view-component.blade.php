<div>
    <header class="home_header_wrapper mt-24">
        <div class="container">
            <div class="d-flex-between">
                <a href="{{ route('app.home') }}" class="logo">
                    <img src="{{ asset('assets/app/images/header/header_logo.svg') }}" alt="logo" />
                </a>
                <ul class="header_right_list d-flex align-items-center justify-content-end flex-wrap">
                    <li>
                        @auth
                            @if (user()->account_type == 'Professional')
                                @if (userHasActiveSubscription())
                                    <a href="javascript:void(0)" id="openPostCreateBtn">
                                        <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                                    </a>
                                @else
                                    <a href="{{ route('app.plans') }}">
                                        <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                                    </a>
                                @endif
                            @endif
                        @else
                            <a href="{{ route('login') }}">
                                <img src="{{ asset('assets/app/icons/plus-circle.svg') }}" alt="plus icon" />
                            </a>
                        @endauth
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/app/icons/heart.svg') }}" alt="heart icon" />
                        </a>
                    </li>
                    <li>
                        <a href="#" class="header_number_area">
                            <span class="circle_shape"></span>
                            <span class="number">60</span>
                            <img src="{{ asset('assets/app/icons/header_right_logo_icon.svg') }}" alt="plus icon"
                                class="right_shape" />
                        </a>
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

    <section class="company_map_wrapper">
        <div class="map_area chart_map_area">
            <!-- HTML -->
            <div class="map_item" id="mapItem"></div>
        </div>
        <div class="map_slider_area" id="mapSliderArea">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="sw iper-slide">
                        <div class="slider_item">
                            <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="slidr image" class="slider_img" />
                            <h4>Hair Cut - Barber</h4>
                            <div class="star_area">
                                <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                                <span>4.5</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slider_item">
                            <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="slidr image" class="slider_img" />
                            <h4>Hair Cut - Barber</h4>
                            <div class="star_area">
                                <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                                <span>4.5</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slider_item">
                            <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="slidr image" class="slider_img" />
                            <h4>Hair Cut - Barber</h4>
                            <div class="star_area">
                                <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                                <span>4.5</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slider_item">
                            <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="slidr image" class="slider_img" />
                            <h4>Hair Cut - Barber</h4>
                            <div class="star_area">
                                <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                                <span>4.5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
                d[l](f, ...n))
        })
        ({
            key: "AIzaSyCZnWMhN9HzTZtpRqvtY3pFrDXW0Zvunpo",
            v: "weekly"
        });
    </script>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2Sj5vCXxKzL6WUq58i_qcubPGFVbY4Lg&callback=initMap&v=weekly" defer></script> -->


    <script>
        let map, infoWindow;

        async function initMap() {
            const {
                Map
            } = await google.maps.importLibrary("maps");
            infoWindow = new google.maps.InfoWindow();
            const {
                AdvancedMarkerElement,
                PinElement
            } =
            await google.maps.importLibrary("marker");
            const {
                Place
            } = await google.maps.importLibrary("places");
            //Initial show map
            map = new Map(document.getElementById("mapItem"), {
                center: {
                    lat: 39.21587946892194,
                    lng: 35.29780273277126
                },
                zoom: 8,
                mapId: "globings",
            });


            //Add location
            // Marker with image  .
            // const beachFlagImg = document.createElement("img");

            // beachFlagImg.src = "assets/app/icons/map_marker.png";

            // const beachFlagMarkerView = new AdvancedMarkerElement({
            //     map,
            //     position: {
            //         lat: 39.21587946892194,
            //         lng: 35.29780273277126
            //     },
            //     content: beachFlagImg,
            //     title: "A marker using a custom PNG Image",
            // });

            //default marker
            const marker = new AdvancedMarkerElement({
                map,
                position: {
                    lat: 39.184660480337456,
                    lng: 35.35519860981352
                },
            });
        }

        //Show error message
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation ?
                "Error: The Geolocation service failed." :
                "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }

        initMap();
    </script>
@endpush
