<div>
    <main>
        <!-- Recent Photos Modal  -->
        <div class="pb-100">
            <div class="container">
                <div class="recent_photos_modal">
                    <div class="bing_back_area">
                        <div class="d-flex align-items-center flex-wrap g-xl">
                            <h4 class="notification_title">Recent Photos</h4>
                        </div>
                    </div>
                    @if (isset($allImages[0]))
                        <button type="button" class="top_img recentPhotoBtn">
                            <img src="{{ asset($allImages[0]) }}" alt="gallery image" />
                        </button>
                    @endif

                    <div class="gallery_grid mt-24">
                        @foreach ($allImages as $key => $img)
                            @if ($key != 0)
                                <button type="button" class="gallery_img recentPhotoBtn">
                                    <img src="{{ asset($img) }}" alt="gallery image" />
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
