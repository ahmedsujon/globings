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
                    @foreach ($shops as $shop)
                        <div class="swiper-slide">
                            <div class="slider_item">
                                <img src="{{ asset($shop->cover_photo) }}" alt=""
                                    class="slider_img" />
                                <h4>{{ $shop->name }}</h4>
                                <div class="star_area">
                                    <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                                    <span>{{ avgShopReview($shop->id) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" name="" id="shop_cords" value="{{ $shop_cords }}">

</div>

@push('scripts')
    <script>
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();

            var value = $('#search_input').val();

            window.location.href = "{{ URL::to('/map-view') }}?search=" + value;
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

                console.log(positionList);

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
                            console.log("initMap - position:", position);
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

                            beachFlagImg.src = "{{ asset('assets/app/icons/map_marker.png') }}";

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
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }

                new ClickEventHandler(map, currentCord);

                var marker, i;
                var markers = new Array();
                const directionsService = new google.maps.DirectionsService();
                console.log("directionsService:", directionsService.route());
                const directionsRenderer = new google.maps.DirectionsRenderer({
                    map: map,
                    suppressMarkers: true,
                });

                for (i = 0; i < positionList.length; i++) {
                    // console.log("initMap - i:", i,positionList[i])
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(
                            positionList[i][1],
                            positionList[i][2]
                        ),
                        map: map,
                    });

                    markers.push(marker);

                    google.maps.event.addListener(
                        marker,
                        "click",
                        (function(marker, i) {
                            return function() {
                                console.log(
                                    "google.maps.event.addListener - marker:",
                                    marker,
                                    i,
                                    positionList[i][1]
                                );
                                infoWindow.setContent(positionList[i][0]);
                                infoWindow.open(map, marker);

                                // directionsRenderer.setDirections({})
                                // directionsService.route({})
                                console.log("currentCord:", currentCord);
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
                                                "Directions request failed due to unavailable routes"
                                            );
                                        }
                                    }
                                );
                            };
                        })(marker, i)
                    );
                }



                // pathBetween.setMap(map);
                google.maps.event.addListener(markers, "click", function(marker, i) {
                    return function() {
                        console.log("Test");
                    };
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

            function isIconMouseEvent(e) {
                console.log("isIconMouseEvent - e:", e, e.placeId);
                return e.placeId;
            }

            class ClickEventHandler {
                origin;
                map;
                directionsService;
                directionsRenderer;
                placesService;
                infowindow;
                infowindowContent;
                constructor(map, origin) {
                    this.origin = origin;
                    this.map = map;
                    this.directionsService = new google.maps.DirectionsService();
                    this.directionsRenderer = new google.maps.DirectionsRenderer();
                    this.directionsRenderer.setMap(map);
                    this.placesService = new google.maps.places.PlacesService(map);
                    this.infowindow = new google.maps.InfoWindow();
                    this.infowindowContent =
                        document.getElementById("infowindow-content");
                    this.infowindow.setContent(this.infowindowContent);
                    // Listen for clicks on the map.
                    this.map.addListener("click", this.handleClick.bind(this));
                }
                handleClick(event) {
                    console.log("You clicked on: " + event.latLng);
                    // If the event has a placeId, use it.
                    if (isIconMouseEvent(event)) {
                        console.log("You clicked on place:" + event.placeId);
                        // Calling e.stop() on the event prevents the default info window from
                        // showing.
                        // If you call stop here when there is no placeId you will prevent some
                        // other map click event handlers from receiving the event.
                        event.stop();
                        if (event.placeId) {
                            this.calculateAndDisplayRoute(event.placeId);
                            this.getPlaceInformation(event.placeId);
                        }
                    }
                }
                calculateAndDisplayRoute(placeId) {
                    const me = this;

                    this.directionsService
                        .route({
                            origin: this.origin,
                            destination: {
                                placeId: placeId
                            },
                            travelMode: google.maps.TravelMode.WALKING,
                        })
                        .then((response) => {
                            me.directionsRenderer.setDirections(response);
                        })
                        .catch((e) =>
                            window.alert("Directions request failed due to " + status)
                        );
                }
                getPlaceInformation(placeId) {
                    const me = this;

                    this.placesService.getDetails({
                            placeId: placeId
                        },
                        (place, status) => {
                            if (
                                status === "OK" &&
                                place &&
                                place.geometry &&
                                place.geometry.location
                            ) {
                                me.infowindow.close();
                                me.infowindow.setPosition(place.geometry.location);
                                me.infowindowContent.children["place-icon"].src = place.icon;
                                me.infowindowContent.children["place-name"].textContent =
                                    place.name;
                                me.infowindowContent.children["place-id"].textContent =
                                    place.place_id;
                                me.infowindowContent.children["place-address"].textContent =
                                    place.formatted_address;
                                me.infowindow.open(me.map);
                            }
                        }
                    );
                }
            }


        });
    </script>
@endpush
