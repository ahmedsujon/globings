<div>
    <section class="success_wrapper">
        <div class="container h-100">
            <div class="success_area d-flex flex-column justify-content-between align-items-center g-sm h-100">
                <div></div>
                <div class="success_text">
                    <img src="{{ asset('assets/app/icons/done_check.svg') }}" alt="done check" class="done_check_icon" />
                    <h4 style="font-size: 22px;">Congratulations!</h4>

                    <p style="margin-top: 7px; font-size: 13px;">You have got 5% discount on <b>{{ $shop->name }}</b></p>

                    <p style="margin-top: 20px;">
                        <small><a href="{{ route('app.home') }}">Back to Home</a></small>
                    </p>
                </div>
                <a href="#" class="login_btn login_btn_fill"></a>
            </div>
        </div>
    </section>
</div>
