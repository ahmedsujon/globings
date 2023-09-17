<div>
    <!-- Sign In Section  -->
    <section class="sing_in_wrapper">
        <div class="container">
            <h3 class="sigin_title">Sign in</h3>
            <h5 class="sing_in_sub_title">
                Please sign in to your Globings account
            </h5>
            <form wire:submit.prevent='userLogin' class="mobile_form_area needs-validation">
                <div class="input_row">
                    <label for="">Email</label>
                    <input type="email" placeholder="Enter email" class="input_field" wire:model.blur='email' />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if (session()->has('error'))
                        <div class="invalid-feedback">{{ session('error') }}</div>
                    @endif
                </div>
                <div class="input_row">
                    <label for="">Password</label>
                    <input type="password" placeholder="Enter password" class="input_field" id="passwordInput" wire:model.blur='password' />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="password_area" id="passwordArea">
                        <button type="button" class="eye_open_icon" id="eyeOpenIcon">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                        <button type="button" class="eye_close_icon" id="eyeCloseIcon">
                            <i class="fa-regular fa-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <div class="d-flex-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rememberCheckbox" />
                        <label for="rememberCheckbox"> Remember Me </label>
                    </div>
                    <button type="button" class="forget_link" id="forgetModalOpenBtn">
                        Forgot password
                    </button>
                </div>
                <button type="submit" class="login_btn login_btn_fill">
                    {!! loadingStateWithTextApp('userLogin', 'Sign In') !!}
                </button>
                <div class="dont_account text-center">
                    Don’t have an account?
                    <button type="button" id="createAccountBtn">
                        Create Account
                    </button>
                </div>
                <div class="others_login_area">
                    <h5 class="others_text">or Sign in with</h5>
                    <div class="others_btn d-flex align-items-center justify-content-center flex-wrap">
                        <button type="button">
                            <img src="{{ asset('assets/app/icons/others_option_icon1.svg') }}" alt="others login icoin" />
                        </button>
                        <button type="button">
                            <img src="{{ asset('assets/app/icons/others_option_icon2.svg') }}" alt="others login icoin" />
                        </button>
                        <button type="button">
                            <img src="{{ asset('assets/app/icons/others_option_icon3.svg') }}" alt="others login icoin" />
                        </button>
                    </div>
                    <h6 class="sub_login text-center">Continue without signing in</h6>
                </div>
            </form>
        </div>

        <!-- Sign In Modal  -->
        <div wire:ignore.self class="sing_modal_area" id="signUpSidebarArea">
            <div class="container">
                <button class="back_icon" id="singUpBackBtn">
                    <img src="{{ asset('assets/app/icons/Back.svg') }}" alt="back icon" />
                </button>

                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab"
                            aria-controls="pills-home" aria-selected="true">
                            Private
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab"
                            aria-controls="pills-profile" aria-selected="false">
                            Professional
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <h3 class="sigin_title">Create Private account</h3>
                        <h5 class="sing_in_sub_title">
                            Please sign up to your Globings account
                        </h5>
                        <form action="" class="mobile_form_area needs-validation" novalidate>
                            <div class="input_row">
                                <label for="">First Name</label>
                                <input type="text" placeholder="Enter first name here" class="input_field"
                                    required />
                                <div class="invalid-feedback">Enter First Name</div>
                            </div>
                            <div class="input_row">
                                <label for="">Last Name</label>
                                <input type="text" placeholder="Enter last name here" class="input_field" />
                            </div>
                            <div class="input_row">
                                <label for="">Email</label>
                                <input type="email" placeholder="abcdef1234@gmail.com" class="input_field"
                                    required />
                                <div class="invalid-feedback">Enter Email</div>
                            </div>
                            <div class="input_row">
                                <label for="">Password</label>
                                <input type="password" placeholder="Enter your password" class="input_field"
                                    id="passwordInput2" required />
                                <div class="invalid-feedback">Enter Password</div>
                                <div class="password_area" id="passwordArea2">
                                    <button type="button" class="eye_open_icon" id="eyeOpenIcon2">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button type="button" class="eye_close_icon" id="eyeCloseIcon2">
                                        <i class="fa-regular fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="input_row">
                                <label for="">Confirm Password</label>
                                <input type="password" placeholder="Enter your password" class="input_field"
                                    id="passwordInput3" required />
                                <div class="invalid-feedback">Enter Password</div>
                                <div class="password_area" id="passwordArea3">
                                    <button type="button" class="eye_open_icon" id="eyeOpenIcon3">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button type="button" class="eye_close_icon" id="eyeCloseIcon3">
                                        <i class="fa-regular fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="agreeCheckbox" />
                                    <label for="agreeCheckbox">
                                        I agree to the
                                        <a href="https://translate.google.com/?sl=en&tl=bn&op=translate"
                                            target="_blank">User Agreement</a>
                                        and <a href="#" target="_blank">Privacy Policy</a> of
                                        using Globings
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="login_btn login_btn_fill">
                                Create Account
                            </button>
                            <div class="dont_account text-center">
                                Already a member?
                                <button type="button">Sign in</button>
                            </div>
                            <div class="others_login_area">
                                <h5 class="others_text">Or Log In With</h5>
                                <div class="others_btn d-flex align-items-center justify-content-center flex-wrap">
                                    <button type="button">
                                        <img src="{{ asset('assets/app/icons/others_option_icon1.svg') }}"
                                            alt="others login icoin" />
                                    </button>
                                    <button type="button">
                                        <img src="{{ asset('assets/app/icons/others_option_icon2.svg') }}"
                                            alt="others login icoin" />
                                    </button>
                                    <button type="button">
                                        <img src="{{ asset('assets/app/icons/others_option_icon3.svg') }}"
                                            alt="others login icoin" />
                                    </button>
                                </div>
                                <h6 class="sub_login text-center">
                                    Continue without signing in
                                </h6>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <h3 class="sigin_title">Create Professional account</h3>
                        <h5 class="sing_in_sub_title">
                            Please sign up to your Globings account
                        </h5>
                        <form action="" class="mobile_form_area needs-validation" novalidate>
                            <div class="input_row">
                                <label for="">First Name</label>
                                <input type="text" placeholder="Enter first name here" class="input_field"
                                    required />
                                <div class="invalid-feedback">Enter First Name</div>
                            </div>
                            <div class="input_row">
                                <label for="">Last Name</label>
                                <input type="text" placeholder="Enter last name here" class="input_field" />
                            </div>
                            <div class="input_row">
                                <label for="">Email</label>
                                <input type="email" placeholder="abcdef1234@gmail.com" class="input_field"
                                    required />
                                <div class="invalid-feedback">Enter Email</div>
                            </div>
                            <div class="input_row">
                                <label for="">Password</label>
                                <input type="password" placeholder="Enter your password" class="input_field"
                                    id="passwordInput4" required />
                                <div class="invalid-feedback">Enter Password</div>
                                <div class="password_area" id="passwordArea4">
                                    <button type="button" class="eye_open_icon" id="eyeOpenIcon4">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button type="button" class="eye_close_icon" id="eyeCloseIcon4">
                                        <i class="fa-regular fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="input_row">
                                <label for="">Confirm Password</label>
                                <input type="password" placeholder="Enter your password" class="input_field"
                                    id="passwordInput5" required />
                                <div class="invalid-feedback">Enter Password</div>
                                <div class="password_area" id="passwordArea5">
                                    <button type="button" class="eye_open_icon" id="eyeOpenIcon5">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button type="button" class="eye_close_icon" id="eyeCloseIcon5">
                                        <i class="fa-regular fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="agreeCheckbox" />
                                    <label for="agreeCheckbox">
                                        I agree to the
                                        <a href="https://translate.google.com/?sl=en&tl=bn&op=translate"
                                            target="_blank">User Agreement</a>
                                        and <a href="#" target="_blank">Privacy Policy</a> of
                                        using Globings
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="login_btn login_btn_fill">
                                Create Account
                            </button>
                            <div class="dont_account text-center">
                                Already a member?
                                <button type="button">Sign in</button>
                            </div>
                            <div class="others_login_area">
                                <h5 class="others_text">Or Log In With</h5>
                                <div class="others_btn d-flex align-items-center justify-content-center flex-wrap">
                                    <button type="button">
                                        <img src="{{ asset('assets/app/icons/others_option_icon1.svg') }}"
                                            alt="others login icoin" />
                                    </button>
                                    <button type="button">
                                        <img src="{{ asset('assets/app/icons/others_option_icon2.svg') }}"
                                            alt="others login icoin" />
                                    </button>
                                    <button type="button">
                                        <img src="{{ asset('assets/app/icons/others_option_icon3.svg') }}"
                                            alt="others login icoin" />
                                    </button>
                                </div>
                                <h6 class="sub_login text-center">
                                    Continue without signing in
                                </h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forget Password Modal  -->
        <div class="sing_modal_area" id="forgetSidebarArea">
            <div class="container">
                <button class="back_icon" id="forgetBackBtn">
                    <img src="{{ asset('assets/app/icons/Back.svg') }}" alt="back icon" />
                </button>
                <div class="forget_modal_area">
                    <h3 class="sigin_title">Mobile Verification</h3>
                    <h5 class="sing_in_sub_title">
                        Submit your mobile to get <b>5</b> digits code
                    </h5>
                    <form action="" class="mobile_form_area needs-validation" novalidate
                        id="resetPasswordForm">
                        <div class="input_row">
                            <label for="">Phone Number</label>
                            <input type="tel" placeholder="" id="telephone" class="phone_input_field" />
                        </div>

                        <button type="submit" class="login_btn login_btn_fill">
                            Send Code
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pin Modal  -->
        <div class="sing_modal_area" id="verifySidebarArea">
            <div class="container">
                <button class="back_icon" id="verifyBackBtn">
                    <img src="{{ asset('assets/app/icons/Back.svg') }}" alt="back icon" />
                </button>
                <div class="forget_modal_area">
                    <h3 class="sigin_title">Enter the code</h3>
                    <h5 class="sing_in_sub_title">
                        Plese enter the <b> 5-digit</b> code sent to: <br />
                        +966 3001234567
                    </h5>
                    <form action="" class="mobile_form_area needs-validation" novalidate>
                        <div class="input_row">
                            <div class="d-flex-between">
                                <label for="">Enter code</label>
                                <label for="" class="reset_code_btn">Resend</label>
                            </div>
                            <div class="verify_pin_area">
                                <input type="text" id="verifyPin" maxlength="5" autofocus />
                            </div>
                        </div>

                        <button type="submit" class="login_btn login_btn_fill">
                            Verify
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
