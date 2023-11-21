<div>
    <style>
        .spinner-border {
            display: inline-block;
            width: 1.2rem;
            height: 1.2rem;
            vertical-align: -0.125em;
            border: 0.15em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: .75s linear infinite spinner-border;
            animation: .75s linear infinite spinner-border;
        }

        ul#search-result {
            position: absolute;
            z-index: 1001;
            width: 90%;
            background: #FFF;
            list-style: none;
            padding: 0;
            max-height: 220px;
            overflow-y: scroll;
            border: 1px solid #DFDFDF;
        }

        ul#search-result li {
            padding: 10px;
            font-size: 13px;
        }

        ul#to-search-result {
            position: absolute;
            z-index: 1001;
            width: 90%;
            background: #FFF;
            list-style: none;
            padding: 0;
            max-height: 220px;
            overflow-y: scroll;
            border: 1px solid #DFDFDF;
        }

        ul#to-search-result li {
            padding: 10px;
            font-size: 13px;
        }
    </style>
    <section class="shop_setting_profile_wrapper pb-90">
        <div class="shop_header_area">
            <div class="container">
                <div class="d-flex-between">
                    <a href="#">
                        <img src="{{ asset('assets/app/icons/profile_back.svg') }}" alt="" />
                    </a>
                    <label for="bannerUploadImage">
                        <div wire:loading wire:target='coverImage' wire:key='coverImage'>
                            <span class="spinner-border spinner-border" role="status" aria-hidden="true"></span>
                        </div>
                        <div wire:loading.remove wire:target='coverImage' wire:key='coverImage'>
                            <img src="{{ asset('assets/app/icons/edit_icon.svg') }}" alt="edit icon" />
                        </div>
                    </label>
                    <input type="file" wire:model='coverImage' id="bannerUploadImage" class="d-none" />
                </div>
                <div class="user_grid">
                    <div class="img_area">
                        <img src="{{ asset(getUserByID($shop->user_id)->avatar) }}" alt="user image" />
                    </div>
                    <div>
                        <h4>{{ $shop->name }}</h4>
                        <h5>Entrepreneur,</h5>
                    </div>
                </div>
            </div>
            @if ($coverImage)
                <img src="{{ asset($coverImage->temporaryUrl()) }}" alt="post image" class="cover_img" />
            @else
                @if ($shop->cover_photo)
                    <img src="{{ asset($shop->cover_photo) }}" alt="post image" class="cover_img" />
                @else
                    <img src="{{ asset('assets/images/placeholder-rect.jpg') }}" alt="post image" class="cover_img" />
                @endif
            @endif
        </div>

        <div class="container">
            <form wire:submit.prevent='updateShop' class="mobile_form_area post_form_area">
                <h3 class="notification_title">Update Shop Details</h3>
                <div class="input_row">
                    <input type="text" wire:model.blur="name" placeholder="Shop Name" class="input_field" />
                    @error('name')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        <br>
                    @enderror
                </div>

                <div class="input_row nice_select_row">
                    <select class="niceSelect" wire:model.blur="shop_category">
                        <option data-display="Shop Category">Shop Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('shop_category')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        <br>
                    @enderror
                </div>

                <div class="input_row">
                    <input type="text" wire:model.blur="website_url" placeholder="globings.com"
                        class="input_field" />
                    @error('website_url')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        <br>
                    @enderror
                </div>

                <div class="input_row">
                    <select wire:model.blur="bings_discount" class="input_field">
                        <option value="">Bings discount</option>
                        <option value="3">3% (25 Bings)</option>
                        <option value="5">5% (50 Bings)</option>
                        <option value="7">7% (75 Bings)</option>
                        <option value="10">10% (100 Bings)</option>
                        <option value="15">15% (150 Bings)</option>
                        <option value="20">20% (250 Bings)</option>
                        <option value="30">30% (300 Bings)</option>
                    </select>
                    @error('bings_discount')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        <br>
                    @enderror
                </div>

                <div class="input_row">
                    <textarea class="input_field" wire:model.blur="description" cols="30" rows="4"
                        placeholder="Share your business details"></textarea>
                    @error('description')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        <br>
                    @enderror
                </div>

                <div class="location_area" wire:ignore>
                    <h4 class="notification_title">Location</h4>

                    <div class="input-group">
                        <input type="text" placeholder="Search your address" id="location_address"
                            name="location_address" class="form-control" oninput="onTyping(this)" autocomplete="off" />
                        {{-- <a href="javascript:void(0)" onclick="getCurrentLocation();" class="input-group-text"
                            id="basic-addon2">
                            <i class="fas fa-map-marker-alt"></i>
                        </a> --}}
                    </div>
                    <ul id="search-result"></ul>

                    <div id="map" style="width: 100%; height: 220px; margin-top: 25px;"></div>

                    <br>

                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                    <input type="hidden" name="city" id="city">


                    <div class="location_grid">
                        <img src="{{ asset('assets/app/icons/location.svg') }}" alt="location icon" />
                        <h5><span id="location"></span></h5>
                    </div>
                </div>

                <button type="submit" class="login_btn login_btn_fill">
                    {!! loadingStateWithTextApp('updateShop', 'Save') !!}
                </button>
            </form>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        window.addEventListener('success', event => {
            $.toast({
                heading: "",
                text: event.detail[0].message,
                showHideTransition: "slide", //plain,fade
                icon: "success", //success,warning,error,info
                position: "bottom-center",
                hideAfter: 3000,
                loader: true,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            @if ($shop->latitude && $shop->longitude)
                reverseGeocode({{ $shop->latitude }}, {{ $shop->longitude }});
                setLocation({{ $shop->latitude }}, {{ $shop->longitude }}, '');
            @else
                getCurrentLocation();
            @endif
        });

        function getCurrentLocation() {
            navigator.geolocation.getCurrentPosition((position) => {
                const p = position.coords;

                $('#latitude').val(p.latitude);
                $('#longitude').val(p.longitude);

                @this.set('latitude', p.latitude);
                @this.set('longitude', p.longitude);

                reverseGeocode(p.latitude, p.longitude);
                setLocation(p.latitude, p.longitude, '');

            }, function(error) {
                if (error.code === 1) {
                    alert('Permission denied. Please allow location access in your browser settings.');
                } else {
                    alert('Error getting location: ' + error.message);
                }
            });
        }

        function reverseGeocode(latitude, longitude) {
            const apiUrl =
                `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}&zoom=18&addressdetails=1`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // console.log(data.address);
                    if (data.display_name) {
                        const fullAddress = data.display_name;
                        // $('#location_address').val(fullAddress);
                        $('#location').html(fullAddress);
                        @this.set('address', fullAddress);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        const resultsWrapperHTML = document.getElementById("search-result");
        let mapOptions = {
            center: [23.9456166, 90.2526382],
            zoom: 13
        }

        let map = new L.map('map', mapOptions);

        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);


        let marker = null;
        map.on('click', (event) => {

            if (marker !== null) {
                map.removeLayer(marker);
            }

            marker = L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);

            document.getElementById('latitude').value = event.latlng.lat;
            document.getElementById('longitude').value = event.latlng.lng;

            reverseGeocode(event.latlng.lat, event.latlng.lng);

            getCityFromCoordinates(event.latlng.lat, event.latlng.lng);

            @this.set('latitude', event.latlng.lat);
            @this.set('longitude', event.latlng.lng);
        });


        // search location handler
        let typingInterval

        // typing handler
        function onTyping(e) {
            clearInterval(typingInterval)
            const {
                value
            } = e

            typingInterval = setInterval(() => {
                clearInterval(typingInterval)
                searchLocation(value)
            }, 100)
        }

        // search handler
        function searchLocation(keyword) {
            if (keyword) {
                fetch(`https://nominatim.openstreetmap.org/search?q=${keyword}&format=json`)
                    .then((response) => {
                        return response.json()
                    }).then(json => {
                        if (json.length > 0) return renderResults(json)
                    })
            }
        }

        // render results
        function renderResults(result) {
            let resultsHTML = ""

            result.map((n) => {
                resultsHTML +=
                    `<li><a href="javascript:void(0)" onclick="setLocation(${n.lat},${n.lon},'${n.display_name}')">${n.display_name}</a></li>`
            })

            resultsWrapperHTML.innerHTML = resultsHTML
        }

        // clear results
        function clearResults() {
            resultsWrapperHTML.innerHTML = ""
        }

        // set location from search result
        function setLocation(lat, lon, display_name) {
            // set map focus
            map.setView(new L.LatLng(lat, lon), 13)

            // regenerate marker position
            if (marker !== null) {
                map.removeLayer(marker);
            }
            marker = L.marker([lat, lon]).addTo(map);

            getCityFromCoordinates(lat, lon);
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;
            // document.getElementById('location_address').value = display_name;
            $('#location').html(display_name);

            @this.set('latitude', lat);
            @this.set('longitude', lon);
            @this.set('addess', display_name);

            // clear results
            clearResults()
        }

        function getCityFromCoordinates(latitude, longitude) {

            // Your Google Maps API key
            const apiKey = 'AIzaSyAGyNcodnqOhezsqvDTvpWCwQRY55hEZ4Q';

            // API request
            fetch(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=${apiKey}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'OK') {
                        // Extract city from the response
                        const addressComponents = data.results[0].address_components;
                        let city = '';
                        for (let component of addressComponents) {
                            if (component.types.includes('locality')) {
                                city = component.long_name;
                                break;
                            }
                        }

                        $('#city').val(city);
                        @this.set('city', city);
                    } else {
                        console.log('Error: ', data.status);
                    }
                })
                .catch(error => {
                    console.error('Error fetching data: ', error);
                });
        }
    </script>
@endpush
