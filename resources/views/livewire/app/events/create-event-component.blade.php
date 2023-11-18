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
        </div>
    </header>
    <div class="post_modal_area pt-24 pb-90">
        <div class="post_header_area">
            <h4 class="notification_title">Create Post</h4>
        </div>
        <div class="header_border"></div>
        <form wire:submit.prevent='storeEvent' class="mobile_form_area post_form_area" id="postCreateFormSubmit">
            <div class="user_grid">
                @if (getUserByID($profile->id)->avatar)
                    <img src="{{ asset(getUserByID($profile->id)->avatar) }}" class="user_img" alt="user image" />
                @else
                    <img src="{{ asset('assets/images/avatar.png') }}" class="user_img" alt="user image" />
                @endif
                <div>
                    <h4>{{ $profile->first_name }} {{ $profile->last_name }}</h4>
                    <h6>{{ '@' . $profile->username }}</h6>
                </div>
            </div>

            <div class="input_row">
                <input type="text" wire:model.blur='name' placeholder="Event Name" class="input_field" />
                @error('name')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror
            </div>

            <div class="input_row">
                <input type="date" wire:model.blur='date' placeholder="Date" class="input_field" />
                @error('date')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror
            </div>

            <div class="input_row">
                <input type="text" wire:model.blur='location' placeholder="Location" class="input_field" />
                @error('location')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror
            </div>

            <div class="input_row">
                <textarea class="input_field" wire:model.blur='description' cols="30" rows="5"
                    placeholder="Share event details"></textarea>
                @error('description')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror
            </div>

            <div class="input_row">
                <label for="fileUpload" class="upload_label">
                    <img src="{{ asset('assets/app/icons/mdi_photo-library.svg') }}" alt="photo libray" />
                    <span>Add photos/videos</span>
                </label>
                <input type="file" wire:model.blur='banner' id="fileUpload" class="d-none" />
                @error('banner')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror

                <div class="uploadSlider" id="uploadSlider">
                    <div class="upload_slider_grid">
                        <div class="slider_img">
                            <div wire:loading wire:target='banner' wire:key='banner'>
                                <span class="spinner-border spinner-border-xs" role="status" aria-hidden="true"></span>
                                <small>Uploading</small>
                            </div>
                            @if ($banner)
                                <img src="{{ $banner->temporaryUrl() }}" class="upload_img w-auto"
                                    style="height: 55px; width: 55px;" />
                            @elseif ($updatedBanner)
                                <img src="{{ asset($updatedBanner) }}" class="upload_img w-auto"
                                    style="height: 55px; width: 55px;" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="login_btn login_btn_fill">
                {!! loadingStateWithTextApp('storeEvent', 'Post Event') !!}
            </button>
        </form>
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
    @endpush
</div>
