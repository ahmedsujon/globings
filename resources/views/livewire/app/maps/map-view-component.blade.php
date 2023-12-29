<div>
    <style>
        .select2-dropdown {
            border: 1px solid #d7d7d7 !important;
            border-radius: 8px;
            background-color: white;
        }

        .select2-dropdown .select2-results__options {
            margin-top: 10px;
        }

        .select2-dropdown .select2-search__field {
            border-radius: 4px;
            height: 34px;
        }

        .select2-dropdown .select2-results__option {
            position: relative;
            font-size: 14px;
        }

        .select2-dropdown .select2-results__option--highlighted {
            background-color: transparent !important;
            color: black !important;
        }

        .select2-dropdown .select2-results__option--highlighted::after {
            position: absolute;
            right: 14px;
            content: "";
            display: inline-block;
            transform: rotate(45deg);
            height: 13px;
            width: 7px;
            border-bottom: 2px solid #1872f6;
            border-right: 2px solid #1872f6;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
        }

        .select2-container {
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle;
            border: 1px solid #ECECEC;
            padding-top: 5px;
            padding-left: 7px;
            border-radius: 49px;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #999;
            font-size: 15px;
            /* padding-bottom: 2px; */
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #999;
            font-size: 15px;
            /* padding-bottom: 2px; */
        }
    </style>
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
                        <a href="{{ route('app.my-favorite-shop') }}">
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
        </div>
    </header>
    {{-- <section class="company_location_wrapper">
        <div class="location_header" style="margin-top: -20px;">
            <div class="container">
                <input type="hidden" name="" id="category" value="{{ request()->get('category') }}">
                <form action="" class="location_form_area" wire:ignore>
                    <div class="d-flex align-items-center g-sm search_sceleton">
                        <div class="skeleton" style="width: 100%; height: 41px; border-radius: 40px;"></div>
                        <div class="skeleton" style=" width: 80px; height: 41px; border-radius: 40px;"></div>
                    </div>
                    <div class="search_grid search_grid_skeleton d-none">
                        <div class="position-relative" id="cirt_select">
                            <select id="locationSearchSelect">
                                <option value=""></option>
                                <option value="all"
                                    {{ 'all' == request()->get('city') || !request()->get('city') ? 'selected' : '' }}>
                                    Select city</option>
                                @foreach ($filter_cities as $city)
                                    <option value="{{ $city->city }}"
                                        {{ $city->city == request()->get('city') ? 'selected' : '' }}>
                                        {{ $city->city }}
                                    </option>
                                @endforeach
                            </select>
                            <img src="{{ asset('assets/app/icons/select_arrow_icon.svg') }}"
                                style="padding-top: 3px; padding-right: 5px;" alt="select arrow" class="arrow_icon" />
                        </div>
                        <a href="{{ route('app.shops') }}" class="map_btn">
                            <img src="{{ asset('assets/app/icons/shop_settings.svg') }}" />
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="category_slider_area border-0 pb-2" id="headerCategorySlider">
            <div class="container">
                <div class="d-flex align-items-center g-sm category_sceleton">
                    <div class="skeleton" style="width: 64px; height: 45px"></div>
                    <div class="skeleton" style="width: 64px; height: 45px"></div>
                    <div class="skeleton" style="width: 64px; height: 45px"></div>
                    <div class="skeleton" style="width: 64px; height: 45px"></div>
                    <div class="skeleton" style="width: 64px; height: 45px"></div>
                </div>
                <div class="swiper category_swiper_container d-none">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('app.map.view') }}?category={{ $category->id }}"
                                class="category_item {{ request()->get('category') == $category->id ? 'active_category' : '' }}">
                                <img src="{{ asset($category->icon) }}" alt="category icon" />
                                <h4>{{ $category->name }}</h4>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="company_map_wrapper">
        <div class="map_area chart_map_area">
            <!-- HTML -->
            <div class="map_item" id="mapItem"></div>
            <div class="map_top_btn_list" id="mapFilterListArea">
                <button type="button" class="active_map_list">Map View</button>
                <button type="button" class="list_btn">Liste View</button>
            </div>
            <div class="map_search_main_area">
                {{-- <form class="map_search_area" id="mapSearchArea">
                    <input type="search" placeholder="Search.." id="search_value" class="search_input" />
                    <button type="submit" class="search_btn" id="">
                        <img src="{{ asset('assets/app/icons/search-lg.svg') }}" alt="search icon" />
                    </button>
                </form> --}}
                <div class="container">
                    <div class="display-none" id="mapSearchArea">
                        <form action="" id="mapSearchForm" class="header_divided_search">
                            <div class="search_input_area">
                                <input type="text" placeholder="Search" class="search_input"
                                    value="{{ request()->get('search_value') }}" id="search_value" />
                            </div>
                            <input type="text" id="location_value" value="{{ request()->get('city') }}"
                                placeholder="Location" class="location_input" />
                            <button class="search_icon" type="submit">
                                <img src="{{ asset('assets/app/icons/search-lg-header.svg') }}" alt="search icon" />
                            </button>
                            <button class="filter_icon" type="button" id="mapCloseSearchBtn">
                                <img src="{{ asset('assets/app/icons/result_close_btn.svg') }}" alt="filter icon" />
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <button type="button" class="search_btn" id="mapSearchBtn">
                <img src="{{ asset('assets/app/icons/search-lg.svg') }}" alt="search icon" />
            </button>
        </div>
    </section>

    {{-- <section class="company_map_wrapper">
        <div class="map_area chart_map_area">
            <div class="map_item" id="mapItem" style="height: 67vh;"></div>
        </div>
    </section> --}}

    <input type="hidden" name="" id="shop_cords" value="{{ $shop_cords }}">

</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.search_sceleton').addClass('d-none');
                $('.search_grid_skeleton').removeClass('d-none');

                $('.category_sceleton').addClass('d-none');
                $('.category_swiper_container').removeClass('d-none');
            }, 2000);
        });
    </script>
    <script>
        $('#locationSearchSelect').on('select2:select', function(e) {
            var data = e.params.data;

            var value = data['id'];
            var category = $('#category').val();

            window.location.href = "{{ URL::to('/map-view') }}?city=" + value + '&category=' + category;
        });

        $('.list_btn').on('click', function() {
            window.location.href = "{{ URL::to('/shops') }}";
        });

        $('#mapSearchForm').on('submit', function(e) {
            e.preventDefault();

            var value = $('#search_value').val();
            var city = $('#location_value').val();
            window.location.href = "{{ URL::to('/map-view') }}?search_value=" + value + '&city=' + city;
        });
    </script>
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
    <script>
        $(document).ready(function() {
            var list = JSON.parse($('#shop_cords').val());

            initMap(list);

            let map,
                infoWindow,
                currentCord = {};

            async function initMap(positionList) {
                const origin = {
                    lat: 39.21587946892194,
                    lng: 35.29780273277126
                };
                const destination = {
                    lat: 39.184660480337456,
                    lng: 35.35519860981352
                };
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
                    // center: { lat: 39.21587946892194, lng: 35.29780273277126 },
                    zoom: 13,
                    mapId: "globings",
                    gestureHandling: "greedy",
                    zoomControl: false,
                    mapTypeId: "roadmap",
                });

                //! show user current location geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            infoWindow.setPosition(pos);
                            // infoWindow.setContent("Location found.");
                            // infoWindow.open(map);
                            map.setCenter(pos);

                            //Current Location Marker
                            const beachFlagImg = document.createElement("img");

                            beachFlagImg.src = "assets/icons/map_marker_2.png";

                            const beachFlagMarkerView = new AdvancedMarkerElement({
                                map,
                                position: {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                },
                                content: beachFlagImg,
                                title: "A marker using a custom PNG Image",
                            });
                            currentCord = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            new ClickEventHandler(map, {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            });
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }

                //Custom marker location route
                var marker, i;
                var markers = new Array();
                const directionsService = new google.maps.DirectionsService();
                const directionsRenderer = new google.maps.DirectionsRenderer({
                    map: map,
                    suppressMarkers: true,
                    polylineOptions: {
                        strokeColor: "#f90101",
                    },
                });

                for (i = 0; i < positionList.length; i++) {
                    //Current Location Marker
                    const markerDiv = document.createElement("div");
                    const beachFlagImg = document.createElement("img");
                    markerDiv.classList.add("custom_marker");
                    markerDiv.appendChild(beachFlagImg);
                    beachFlagImg.src = positionList[i][3];
                    marker = new AdvancedMarkerElement({
                        position: new google.maps.LatLng(
                            positionList[i][1],
                            positionList[i][2]
                        ),
                        content: markerDiv,
                        map: map,
                    });

                    markers.push(marker);

                    google.maps.event.addListener(
                        marker,
                        "click",
                        (function(marker, i) {
                            return function() {
                                infoWindow.setContent(positionList[i][0]);
                                infoWindow.open(map, marker);

                                directionsService.route({
                                        origin: currentCord,
                                        destination: {
                                            lat: positionList[i][1],
                                            lng: positionList[i][2],
                                        },
                                        travelMode: google.maps.TravelMode.DRIVING,
                                    },
                                    (response, status) => {
                                        console.log("response:", response);
                                        if (status === "OK") {
                                            directionsRenderer.setDirections(response);
                                        } else {
                                            window.alert(
                                                "Directions request failed due to " + status
                                            );
                                        }
                                    }
                                );
                            };
                        })(marker, i)
                    );
                }

                // pathBetween.setMap(map);
                class ClickEventHandler {
                    constructor(map, origin) {
                        this.origin = origin;
                        this.map = map;
                        this.directionsService = directionsService;
                        this.directionsRenderer = directionsRenderer;
                        this.directionsRenderer.setMap(map);
                        this.placesService = new google.maps.places.PlacesService(map);
                        this.infowindow = infoWindow;
                        this.infowindowContent =
                            document.getElementById("infowindow-content");
                        this.infowindow.setContent(this.infowindowContent);
                        // Listen for clicks on the map.
                        this.map.addListener("click", this.handleClick.bind(this));
                    }

                    handleClick(event) {
                        console.log("ClickEventHandler - constructor - origin:", origin);
                        console.log("You clicked on: " + event.latLng);
                        $.toast({
                            heading: "Success",
                            // text: "And these were just the basic demos! Scroll down to check further details on how to customize the output.",
                            showHideTransition: "slide", //plain,fade
                            icon: "success", //success,warning,error,info
                            position: "bottom-center",
                            hideAfter: 3000,
                            loader: true,
                            //   position: {
                            //     left: 120,
                            //     top: 120
                            // },
                            // bgColor: '#FF1356',
                            // textColor: 'white'
                            // loaderBg: '#9EC600'
                        });
                    }
                }
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
        });
    </script>
@endpush
