<div>
    <style>
        .input_field {
            border: 1px solid grey !important;
        }
        .input_field:focus {
            outline: 1px solid grey !important;
        }
    </style>
    <section class="pricing_wrapper">
        <div class="price_text_area">
            <div class="container" style="text-align: center;">
                <h5 class="notification_title">Account Verification</h5>
                <div style="position: absolute; right: 10px; top: 15px; background: white; border-radius: 50%; width: 35px; height: 35px;">
                    <a href="{{ route('logout') }}" style="padding-top: 4px; padding-right: 15px;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px;"
                            class="icon icon-tabler icon-tabler-logout" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2.5" stroke="#ff0000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                        </svg>
                    </a>
                    <form id="logout-form" style="display: none;" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <h6 class="sing_in_sub_title" style="text-align: center;">
                Enter the verification code that we have send to your email address. <br>
                <p style="font-size: 15px; margin-top: 5px; margin-bottom: 20px;"><b>{{ user()->email }}</b></p>
            </h6>
            <form wire:submit.prevent='verifyAccount' class="mobile_form_area">
                <div class="input_row" style="margin-top: 30px; margin-bottom: 30px;">
                    <input type="number" style="text-align: center;" placeholder="Enter your code" wire:model.blur='code' class="input_field" />
                    @error('code')
                        <div class="input_error">{{ $message }}</div>
                    @enderror
                    @if (session()->has('error'))
                        <div class="input_error">{{ session('error') }}</div>
                    @endif

                    <p style="float: right; margin-top: 3px; margin-bottom: 15px; font-size: 14px;" wire:click.prevent='resendCode'><span wire:loading wire:target='resendCode' wire:key='resendCode'><i class="fa fa-spinner fa-spin"></i></span> Resend Code</p>
                </div>

                <button type="submit" class="login_btn login_btn_fill">
                    {!! loadingStateWithTextApp('verifyAccount', 'Verify') !!}
                </button>

            </form>
        </div>
    </section>
</div>
@push('scripts')
    <script>
        window.addEventListener('resend_success', event => {
            $.toast({
                heading: "",
                text: 'Code sent successfully',
                showHideTransition: "slide", //plain,fade
                icon: "success", //success,warning,error,info
                position: "bottom-center",
                hideAfter: 3000,
                loader: true,
            });
        });
    </script>
@endpush
