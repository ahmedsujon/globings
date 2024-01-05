<section class="success_wrapper">
    <div class="container h-100">
        <div class="success_area d-flex flex-column justify-content-between align-items-center g-sm h-100">
            <div></div>
            <div class="success_content_area" style="text-align: center;">
                <img src="{{ asset('assets/app/icons/Checkmark.svg') }}" alt="check mark" />
                <h4>Successful</h4>
                <br>
                <h6>Your {{ $history->bings }} bings successfully <br>converted in €{{ $history->amount }}</h6>
                <br>
                <p style="font-size: 13.5px;">
                    We will transfer the amount in your bank soon.
                </p>
                <p style="margin-top: 20px;">
                    <small><a href="{{ route('app.home') }}">Back to Home</a></small>
                </p>
            </div>
            <a href="#" class="login_btn login_btn_fill"></a>
        </div>
    </div>
</section>
