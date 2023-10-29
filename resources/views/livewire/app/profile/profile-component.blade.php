<div>
    <main>
        <!-- Profile Manage Section  -->
        <section class="profile_manage_wrapper">
          <div
            class="profile_top_area"
            style="background-image: url('assets/app/images/others/profilel_bg.png')"
          >
            <div class="container">
              <div class="d-flex-between">
                <h4 class="notification_title">Manage Profile</h4>
                <button type="button" id="settingProfileBtn">
                  <img src="{{ asset('assets/app/icons/settings-white.svg') }}" alt="setting icon" />
                </button>
              </div>
              <div class="user_grid">
                <div class="img_area">
                  <img src="{{ asset('assets/app/images/others/user_img.png') }}" alt="user image" />
                </div>
                <div>
                    <h4>{{ $profile->first_name }} {{ $profile->last_name }}</h4>
                    <h5>{{ '@'.$profile->username }}</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="number_top_area">
            <div class="container">
              <div class="number_area d-flex align-items-center flex-wrap g-sm">
                <img src="{{ asset('assets/app/icons/profile_store_icon.svg') }}" alt="store icon" />
                <h4>150 Bings</h4>
              </div>
            </div>
          </div>
          <div class="others_content_area">
            <div class="container">
              <h4 class="notification_title">Other</h4>
              <ul class="manage_list">
                <li>
                  <a href="{{ route('app.recent-posts') }}">
                    <img src="{{ asset('assets/app/icons/manage_icon1.svg') }}" alt="manage icon" />
                    <h5>Recent posts</h5>
                    <img
                      src="{{ asset('assets/app/icons/profile_right_arrow.svg') }}"
                      alt="right icon"
                    />
                  </a>
                </li>
                <li>
                    <a href="{{ route('app.recent-photos') }}">
                    <img src="{{ asset('assets/app/icons/manage_icon2.svg') }}" alt="manage icon" />
                    <h5>Recent photos</h5>
                    <img
                      src="{{ asset('assets/app/icons/profile_right_arrow.svg') }}"
                      alt="right icon"
                    />
                    </a>
                </li>
                <li>
                  <button type="button" id="placeModalBtn">
                    <img src="{{ asset('assets/app/icons/manage_icon3.svg') }}" alt="manage icon" />
                    <h5>My places</h5>
                    <img
                      src="{{ asset('assets/app/icons/profile_right_arrow.svg') }}"
                      alt="right icon"
                    />
                  </button>
                </li>
                <li>
                  <button type="button">
                    <img src="{{ asset('assets/app/icons/manage_icon4.svg') }}" alt="manage icon" />
                    <div>
                      <h5>Share my profile</h5>
                      <h6>
                        Get you
                        <span class="number_area">
                          <img
                            src="{{ asset('assets/app/icons/store_green_icon.svg') }}"
                            alt="store icon"
                          />
                          <span>150 Bings</span>
                        </span>
                        invite bonus!
                      </h6>
                    </div>
                    <img
                      src="{{ asset('assets/app/icons/profile_right_arrow.svg') }}"
                      alt="right icon"
                    />
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </section>
      </main>
  
      <!-- Profile Modal  -->
      <div class="sing_modal_area profile_modal_area" id="profileModalArea">
        <div class="container">
          <div class="profile_modal_header">
            <button type="button" class="back_btn" id="profileHideModal">
              <img src="{{ asset('assets/app/icons/profile_back.svg') }}" alt="back icon" />
            </button>
            <h4 class="notification_title">Profile View</h4>
          </div>
          <div class="cover_img mt-24">
            <img src="{{ asset('assets/app/images/post/post_img1.png') }}" alt="cover image" />
          </div>
          <div class="user_img_area">
            <img src="{{ asset('assets/app/images/post/post_img2.png') }}" alt="user image" />
          </div>
          <div class="user_info">
            <h4 class="notification_title">Fouad Zahaer</h4>
            <h5>@Fouad2042</h5>
          </div>
          <div class="user_location_info">
            <h3>Entrepreneur, Globings.com</h3>
            <div class="location_outer_grid">
              <div class="location_grid">
                <img src="{{ asset('assets/app/icons/calendar.svg') }}" alt="calender" />
                <h4 class="location_title">Joined August 2022</h4>
              </div>
              <div class="location_grid">
                <img src="{{ asset('assets/app/icons/location.svg') }}" alt="calender" />
                <h4 class="location_title">Soignies, Belgium</h4>
              </div>
            </div>
            <div class="message_btn_grid d-flex align-items-center flex-wrap">
              <button type="button" class="message_btn follow_btn">
                Following
              </button>
              <a href="#" class="message_btn">Send Message</a>
            </div>
          </div>
          <!-- Post Home Section  -->
          <section class="post_home_wrapper" id="homePostArea">
            <div class="container">
              <div class="post_grid">
                <div class="hash_area">
                  <div class="hash_icon">
                    <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                    <h4>Bruxelles</h4>
                  </div>
                  <div class="middle_bar"></div>
                  <button type="button" class="post_user_area">
                    <img
                      src="{{ asset('assets/app/images/post/post_img3.png') }}"
                      alt=""
                      class="user_img"
                    />
                    <h5>Le Fuse</h5>
                  </button>
                </div>
                <div class="post_area">
                  <div class="swiper post_slider1">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img1.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img2.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                  </div>
                  <div class="action_area d-flex align-items-center flex-wrap">
                    <button type="button" class="heart_icon" id="heartIcon">
                      <svg
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                          stroke="#F73636"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button
                      type="button"
                      class="coment_area postCommentBtn d-flex align-items-center flex-wrap"
                    >
                      <img
                        src="{{ asset('assets/app/icons/comment_icon.svg') }}"
                        alt="comment icon"
                      />
                      <h5>Comment</h5>
                    </button>
                  </div>
                </div>
              </div>
              <div class="post_grid">
                <div class="hash_area">
                  <div class="hash_icon">
                    <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                    <h4>Bruxelles</h4>
                  </div>
                  <div class="middle_bar"></div>
                  <button type="button" class="post_user_area">
                    <img
                      src="{{ asset('assets/app/images/post/post_img3.png') }}"
                      alt=""
                      class="user_img"
                    />
                    <h5>Le Fuse</h5>
                  </button>
                </div>
                <div class="post_area">
                  <div class="swiper post_slider2">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img2.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img3.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img2.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img3.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img2.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img3.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                  </div>
                  <div class="action_area d-flex align-items-center flex-wrap">
                    <button type="button" class="heart_icon" id="heartIcon">
                      <svg
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                          stroke="#F73636"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button
                      type="button"
                      class="coment_area postCommentBtn d-flex align-items-center flex-wrap"
                    >
                      <img
                        src="{{ asset('assets/app/icons/comment_icon.svg') }}"
                        alt="comment icon"
                      />
                      <h5>Comment</h5>
                    </button>
                  </div>
                </div>
              </div>
              <div class="post_grid">
                <div class="hash_area">
                  <div class="hash_icon">
                    <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                    <h4>Bruxelles</h4>
                  </div>
                  <div class="middle_bar"></div>
                  <button type="button" class="post_user_area">
                    <img
                      src="{{ asset('assets/app/images/post/post_img3.png') }}"
                      alt=""
                      class="user_img"
                    />
                    <h5>Le Fuse</h5>
                  </button>
                </div>
                <div class="post_area">
                  <div class="swiper post_slider1">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img1.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img2.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                  </div>
                  <div class="action_area d-flex align-items-center flex-wrap">
                    <button type="button" class="heart_icon" id="heartIcon">
                      <svg
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                          stroke="#F73636"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button
                      type="button"
                      class="coment_area postCommentBtn d-flex align-items-center flex-wrap"
                    >
                      <img
                        src="{{ asset('assets/app/icons/comment_icon.svg') }}"
                        alt="comment icon"
                      />
                      <h5>Comment</h5>
                    </button>
                  </div>
                </div>
              </div>
              <div class="post_grid">
                <div class="hash_area">
                  <div class="hash_icon">
                    <img src="{{ asset('assets/app/icons/hash_icon.svg') }}" alt="hash icon" />
                    <h4>Bruxelles</h4>
                  </div>
                  <div class="middle_bar"></div>
                  <button type="button" class="post_user_area">
                    <img
                      src="{{ asset('assets/app/images/post/post_img3.png') }}"
                      alt=""
                      class="user_img"
                    />
                    <h5>Le Fuse</h5>
                  </button>
                </div>
                <div class="post_area">
                  <div class="swiper post_slider2">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img2.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img3.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img2.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img3.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img2.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="slider_img">
                          <img
                            src="{{ asset('assets/app/images/post/post_img3.png') }}"
                            alt="post image"
                          />
                        </div>
                      </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                  </div>
                  <div class="action_area d-flex align-items-center flex-wrap">
                    <button type="button" class="heart_icon" id="heartIcon">
                      <svg
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M7.99511 3.42388C6.66221 1.8656 4.43951 1.44643 2.76947 2.87334C1.09944 4.30026 0.86432 6.68598 2.17581 8.3736C3.26622 9.77674 6.56619 12.7361 7.64774 13.6939C7.76874 13.801 7.82925 13.8546 7.89982 13.8757C7.96141 13.8941 8.02881 13.8941 8.0904 13.8757C8.16097 13.8546 8.22147 13.801 8.34248 13.6939C9.42403 12.7361 12.724 9.77674 13.8144 8.3736C15.1259 6.68598 14.9195 4.28525 13.2207 2.87334C11.522 1.46144 9.32801 1.8656 7.99511 3.42388Z"
                          stroke="#F73636"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                    <button
                      type="button"
                      class="coment_area postCommentBtn d-flex align-items-center flex-wrap"
                    >
                      <img
                        src="{{ asset('assets/app/icons/comment_icon.svg') }}"
                        alt="comment icon"
                      />
                      <h5>Comment</h5>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
  
      <!-- My Place Modal  -->
      <div class="sing_modal_area" id="placeModalArea">
        <div class="container">
          <div class="my_place_modal">
            <div class="bing_back_area">
              <div class="container">
                <div class="d-flex align-items-center flex-wrap g-xl">
                  <button type="button" class="close_btn" id="placeCloseBtn">
                    <img src="{{ asset('assets/app/icons/coain_back_icon.svg') }}" alt="back icon" />
                  </button>
                  <h4 class="notification_title">My places</h4>
                </div>
              </div>
            </div>
            <form action="" class="post_search_form place_search_form">
              <input type="search" placeholder="Search Map" />
              <img
                src="{{ asset('assets/app/icons/post_search_icon.svg') }}"
                alt="search icon"
                class="search_icon"
              />
            </form>
          </div>
        </div>
        <!-- Company Map Area  -->
        <section class="company_map_wrapper place_map_wrapper">
          <div class="map_area">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.9730352447!2d90.33728817432475!3d23.780818635510663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1695448421480!5m2!1sbn!2sbd"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
          <div class="map_slider_area" id="mapSliderArea">
            <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="slider_item">
                    <img
                      src="{{ asset('assets/app/images/post/post_img1.png') }}"
                      alt="slidr image"
                      class="slider_img"
                    />
                    <h4>Hair Cut - Barber</h4>
                    <div class="star_area">
                      <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                      <span>4.5</span>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="slider_item">
                    <img
                      src="{{ asset('assets/app/images/post/post_img1.png') }}"
                      alt="slidr image"
                      class="slider_img"
                    />
                    <h4>Hair Cut - Barber</h4>
                    <div class="star_area">
                      <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                      <span>4.5</span>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="slider_item">
                    <img
                      src="{{ asset('assets/app/images/post/post_img1.png') }}"
                      alt="slidr image"
                      class="slider_img"
                    />
                    <h4>Hair Cut - Barber</h4>
                    <div class="star_area">
                      <img src="{{ asset('assets/app/icons/star_black.svg') }}" alt="star black" />
                      <span>4.5</span>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="slider_item">
                    <img
                      src="{{ asset('assets/app/images/post/post_img1.png') }}"
                      alt="slidr image"
                      class="slider_img"
                    />
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
      <!-- Profile Setting Modal  -->
      <div class="sing_modal_area" id="settingProfileModalArea">
        <div class="profile_setting_modal">
          <section class="profile_manage_wrapper">
            <div class="profile_top_area">
              <div class="container">
                <div class="d-flex-between">
                  <div class="d-flex align-items-center flex-wrap g-xl">
                    <button type="button" id="settingProfileCloseBtn">
                      <img
                        src="{{ asset('assets/app/icons/white_cross_icon.svg') }}"
                        alt="cross icon"
                      />
                    </button>
                    <h5 class="notification_title">Settings Profile</h5>
                  </div>
  
                  <div class="dropdown">
                    <button
                      type="button"
                      id="dropdownMenuButton1"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <img src="{{ asset('assets/app/icons/dot_icon.svg') }}" alt="dot icon" />
                    </button>
                    <ul
                      class="dropdown-menu"
                      aria-labelledby="dropdownMenuButton1"
                    >
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li>
                        <a class="dropdown-item" href="#">Another action</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="user_grid">
                  <label for="uploadUserImage" class="img_area">
                    <img src="{{ asset('assets/app/icons/user_icon.svg') }}" alt="user image" />
                    <!-- <img src="{{ asset('assets/app/images/others/user_img.png') }}" alt="user image" /> -->
                    <img
                      src="{{ asset('assets/app/icons/edit_icon.svg') }}"
                      alt="edit icon"
                      class="edit_icon"
                    />
                  </label>
                  <div>
                    <h4>{{ $profile->first_name }} {{ $profile->last_name }}</h4>
                    <h5>{{ '@'.$profile->username }}</h5>
                  </div>
                </div>
                <input type="file" id="uploadUserImage" class="d-none" />
              </div>
            </div>
  
            <div class="others_content_area">
              <div class="container">
                <h4 class="notification_title">Settings</h4>
                <ul class="manage_list">
                  {{-- <li>
                    <button type="button" id="settingNameModal">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon1.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Mohammad Khan</h5>
                    </button>
                  </li> --}}
                  <li>
                    <button type="button" id="settingNameModal">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon1.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Name</h5>
                      <img
                        src="{{ asset('assets/app/icons/setting_edit_icon.svg') }}"
                        alt="right icon"
                      />
                    </button>
                  </li>
                  <li>
                    <button type="button" id="profileEditModalBtn">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon2.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Bio</h5>
                      <img
                        src="{{ asset('assets/app/icons/setting_edit_icon.svg') }}"
                        alt="right icon"
                      />
                    </button>
                  </li>
                  <li>
                    <button type="button" id="phoneModalBtn">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon3.svg') }}"
                        alt="manage icon"
                      />
                      <h5>+32 000 00 00</h5>
                      <img
                        src="{{ asset('assets/app/icons/setting_edit_icon.svg') }}"
                        alt="right icon"
                      />
                    </button>
                  </li>
                  <li>
                    <button type="button">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon4.svg') }}"
                        alt="manage icon"
                      />
                      <h5>
                        <a href="mailto:fouadzaher@gmail.com"
                          >fouadzaher@gmail.com</a
                        >
                      </h5>
                      <img
                        src="{{ asset('assets/app/icons/setting_edit_icon.svg') }}"
                        alt="right icon"
                      />
                    </button>
                  </li>
                  <li>
                    <button type="button">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon5.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Date of birth</h5>
                      <img
                        src="{{ asset('assets/app/icons/setting_edit_icon.svg') }}"
                        alt="right icon"
                      />
                    </button>
                  </li>
                  <li>
                    <button type="button">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon1.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Gender</h5>
                      <img
                        src="{{ asset('assets/app/icons/setting_edit_icon.svg') }}"
                        alt="right icon"
                      />
                    </button>
                  </li>
                  <li>
                    <button type="button">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon6.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Language</h5>
                      <img
                        src="{{ asset('assets/app/icons/setting_edit_icon.svg') }}"
                        alt="right icon"
                      />
                    </button>
                  </li>
                  <li>
                    <button type="button">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon7.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Password Change</h5>
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- Setting Edit Modal  -->
      <div class="sing_modal_area" id="profileEditModalArea">
        <div class="profile_edit_modal">
          <div class="bing_back_area">
            <div class="container">
              <div class="d-flex align-items-center flex-wrap g-xl">
                <button type="button" class="close_btn" id="profileEditCloseBtn">
                  <img src="{{ asset('assets/app/icons/coain_back_icon.svg') }}" alt="back icon" />
                </button>
                <h4 class="notification_title">Personal Details</h4>
              </div>
            </div>
          </div>
          <div class="container">
            <form
              action=""
              class="mobile_form_area d-flex flex-column justify-content-between"
            >
              <div>
                <div class="input_row">
                  <label for="">First Name</label>
                  <input
                    type="email"
                    placeholder="Enter First Name"
                    class="input_field"
                  />
                  <div class="input_error">Enter First Name</div>
                </div>
                <div class="input_row">
                  <label for="">Last Name</label>
                  <input
                    type="email"
                    placeholder="Enter Last Name"
                    class="input_field"
                  />
                  <div class="input_error">Enter Last Name</div>
                </div>
                <div class="input_row">
                  <label for="">Select your language</label>
                  <select class="niceSelect">
                    <option data-display="Select language">
                      Select language
                    </option>
                    <option value="1">English</option>
                    <option value="2">Bangla</option>
                  </select>
                </div>
              </div>
  
              <button type="submit" class="login_btn login_btn_fill">
                Update Profile Details
              </button>
            </form>
          </div>
        </div>
      </div>
      <!-- Setting Name Modal  -->
      <div class="sing_modal_area" id="settingNameModal">
        <div class="profile_edit_modal">
          <div class="bing_back_area">
            <div class="container">
              <div class="d-flex align-items-center flex-wrap g-xl">
                <button type="button" class="close_btn" id="profilePhoneCloseBtn">
                  <img src="{{ asset('assets/app/icons/coain_back_icon.svg') }}" alt="back icon" />
                </button>
                <h4 class="notification_title">Personal Details</h4>
              </div>
            </div>
          </div>
          <div class="container">
            <form
              action=""
              class="mobile_form_area d-flex flex-column justify-content-between"
            >
              <div>
                <div class="input_row">
                  <label for="">Name</label>
                  <input
                    type="number"
                    placeholder="Enter  Number"
                    class="input_field"
                  />
                  <div class="input_error">Enter Number</div>
                </div>
              </div>
  
              <button type="submit" class="login_btn login_btn_fill">
                Update Profile Details
              </button>
            </form>
          </div>
        </div>
      </div>
      <!-- Setting Phone Modal  -->
      <div class="sing_modal_area" id="profilePhoneModalArea">
        <div class="profile_edit_modal">
          <div class="bing_back_area">
            <div class="container">
              <div class="d-flex align-items-center flex-wrap g-xl">
                <button type="button" class="close_btn" id="profilePhoneCloseBtn">
                  <img src="{{ asset('assets/app/icons/coain_back_icon.svg') }}" alt="back icon" />
                </button>
                <h4 class="notification_title">Personal Details</h4>
              </div>
            </div>
          </div>
          <div class="container">
            <form wire:submit.prevent='updatePhone'
              class="mobile_form_area d-flex flex-column justify-content-between"
            >
              <div>
                <div class="input_row">
                  <label for="">Phone Number</label>
                  <input
                    type="number" wire:mode="phone"
                    placeholder="Enter  Number"
                    class="input_field"
                  />
                  @error('phone')
                  <span class="text-danger" style="font-size: 11.5px;">{{ $message
                      }}</span>
                  <br>
                  @enderror
                </div>
              </div>
              <button type="submit" class="login_btn login_btn_fill">
                {!! loadingStateWithText('updatePhone', 'Update Phone') !!}
              </button>
            </form>
          </div>
        </div>
      </div>
</div>