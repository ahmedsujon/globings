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
                    @foreach ($random_one as $post)
                        <button type="button" class="top_img recentPhotoBtn">
                        <img src="{{ asset('assets/app/images/others/image_gallery1.png') }}" alt="gallery image" />
                    </button>
                    @endforeach
                    
                    <div class="gallery_grid mt-24">
                        @foreach ($posts as $post)
                            <button type="button" class="gallery_img recentPhotoBtn">
                            <img src="{{ asset('assets/app/images/others/image_gallery3.png') }}" alt="gallery image" />
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
