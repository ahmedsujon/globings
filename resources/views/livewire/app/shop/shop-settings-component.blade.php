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
                        <img src="{{ asset('assets/app/images/others/user_img.png') }}" alt="user image" />
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
                    <input type="text" wire:model.blur="website_url" placeholder="globings.com" class="input_field" />
                    @error('website_url')
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

                <div class="location_area">
                    <h4 class="notification_title">Location</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.9730352447!2d90.33728817432475!3d23.780818635510663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1695448421480!5m2!1sbn!2sbd"
                        style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="location_grid">
                        <img src="{{ asset('assets/app/icons/location.svg') }}" alt="location icon" />
                        <h5>address : de Waterloo 730, 1180 Uccle, Belgium</h5>
                    </div>
                </div>

                <button type="submit" class="login_btn login_btn_fill">
                    {!! loadingStateWithTextApp('updateShop', 'Save') !!}
                </button>
            </form>
        </div>
    </section>
</div>
