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
                  <a href="{{ route('app.shop.settings') }}">
                    <img src="{{ asset('assets/app/icons/shop_settings.svg') }}" alt="manage icon" />
                    <h5>Business Settings</h5>
                    <img
                      src="{{ asset('assets/app/icons/profile_right_arrow.svg') }}"
                      alt="right icon"
                    />
                  </a>
                </li>
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
                      <li>
                        <button type="button" id="profileEditModalBtn">Edit Profile</button>
                      </li>
                      <li>
                        <button type="button" id="profileEditModalBtns">Change Password</button>
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
                  <li>
                    <button type="button" id="settingNameModal">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon1.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Name</h5>
                    </button>
                  </li>
                  <li>
                    <button type="button" id="phoneModalBtn">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon3.svg') }}"
                        alt="manage icon"
                      />
                      <h5>{{ $profile->phone }}</h5>
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
                    </button>
                  </li>
                  <li>
                    <button type="button">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon5.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Date of birth</h5>
                    </button>
                  </li>
                  <li>
                    <button type="button">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon1.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Gender</h5>
                    </button>
                  </li>
                  <li>
                    <button type="button">
                      <img
                        src="{{ asset('assets/app/icons/setting_icon6.svg') }}"
                        alt="manage icon"
                      />
                      <h5>Language</h5>
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
    <div class="sing_modal_area" id="profileEditModalArea" wire:ignore.self>
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
          <form wire:submit.prevent='updateProfile'
            class="mobile_form_area d-flex flex-column justify-content-between"
          >
            <div>
              <div class="input_row">
                <label for="first_name">First Name</label>
                <input
                  type="text" wire:model="first_name"
                  placeholder="Enter First Name"
                  class="input_field"
                />
                @error('first_name')
                  <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror
              </div>
              <div class="input_row">
                <label for="last_name">Last Name</label>
                <input
                  type="text" wire:model="last_name"
                  placeholder="Enter Last Name"
                  class="input_field"
                />
                @error('last_name')
                  <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror
              </div>
              <div class="input_row">
                <label for="phone">Phone</label>
                <input
                  type="number" wire:model="phone"
                  placeholder="Enter Your Phone"
                  class="input_field"
                />
                @error('phone')
                  <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror
              </div>
              <div class="input_row">
                <label for="email">Email</label>
                <input
                  type="email" wire:model="email"
                  placeholder="Enter Your Email"
                  class="input_field"
                />
                @error('email')
                  <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror
              </div>
              <div class="input_row">
                <label for="dob">Date Of Birth</label>
                <input
                  type="date" wire:model="dob"
                  placeholder="Enter Date Of Birth"
                  class="input_field"
                />
                @error('dob')
                  <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror
              </div>
              <div class="input_row">
                <label for="gender">Select Gender</label>
                <select class="niceSelect" wire:model="gender">
                  <option data-display="Select Gender">
                    Select Gender
                  </option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
                @error('gender')
                  <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span><br>
                @enderror
              </div>
              {{-- <div class="input_row" wire:model="language">
                <label for="">Select your language</label>
                <select class="niceSelect">
                  <option data-display="Select language">
                    Select language
                  </option>
                  <option value="English">English</option>
                </select>
              </div> --}}
            </div>
            <button type="submit" class="login_btn login_btn_fill">
              Update Profile Details
            </button>
          </form>
        </div>
      </div>
    </div>
</div>