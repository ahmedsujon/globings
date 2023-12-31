<div>
    <section class="pricing_wrapper">
        <div class="price_text_area">
            <div class="container" style="text-align: center;">
                <h4 class="notification_title">Plan Payment</h4>
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
        <div class="container">
            <div class="pricing_item" style="text-align: center; margin-top: 20px;">
                <h4>Plan Details</h4>
                <div class="pricing_area">
                    <table class="table-sm" style="width: 100%; font-size: 14px;">
                        <tbody>
                            <tr>
                                <td style="width: 35%; border: 1px solid rgb(221, 221, 221); padding: 5px;"><b>Package</b></td>
                                <td style="width: 65%; border: 1px solid rgb(221, 221, 221); padding: 5px;">{{ $package->name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 35%; border: 1px solid rgb(221, 221, 221); padding: 5px;"><b>Plan</b></td>
                                <td style="width: 65%; border: 1px solid rgb(221, 221, 221); padding: 5px;">{{ $plan->name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 35%; border: 1px solid rgb(221, 221, 221); padding: 5px;"><b>Price</b></td>
                                <td style="width: 65%; border: 1px solid rgb(221, 221, 221); padding: 5px;">€{{ $plan->price }} / Month</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="pricing_item" style="text-align: center; margin-top: 50px;">
                <h4>Make Payment With</h4>
                @if (session()->has('error'))
                    <div style="background: rgb(224, 96, 96); width: 100%; padding: 10px; margin-top: 10px; margin-bottom: 10px;">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="pricing_area" style="text-align: center; padding-top: 20px; display: flex; align-items: center; justify-content: center;">
                    <form action="{{ route('app.payWithStripe') }}" method="POST">
                        @csrf
                        <input type="hidden" name="subscription_id" id="subscription_id" value="{{ $subscription->id }}" />
                        <button type="submit" style="border: 1px solid #1872F6 !important; padding: 0px 30px; border-radius: 10px; margin-right: 10px;">
                            <img src="{{ asset('assets/images/stripe.png') }}" style="height: 70px; width: auto;" alt="">
                        </button>
                    </form>

                    <form action="{{ route('app.payWithPaypal') }}" method="POST">
                        @csrf
                        <input type="hidden" name="sub_id" id="sub_id" value="{{ $subscription->id }}" />
                        <button type="submit" style="border: 1px solid #1872F6 !important; padding: 0px 30px; border-radius: 10px;">
                            <img src="{{ asset('assets/images/paypal.png') }}" style="height: 70px; width: auto;" alt="">
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
@push('scripts')
    {{-- <script src="https://js.stripe.com/v3/"></script>

    <script>
        var stripe = Stripe("{{ env('STRIPE_ID') }}");
        var elements = stripe.elements();

        var card = elements.create('card', {
            hidePostalCode: true,
            style: {
                base: {
                    iconColor: '#000000',
                    color: '#000000',
                    lineHeight: '40px',
                    fontWeight: 200,
                    fontFamily: 'Helvetica Neue',
                    fontSize: '16px',

                    '::placeholder': {
                        color: '#585858',
                    },
                },
            }
        });
        card.mount('#card-element');

        function setOutcome(result) {
            var successElement = document.querySelector('.success');
            var errorElement = document.querySelector('.error');
            successElement.classList.add('d-none');
            errorElement.classList.add('d-none');

            if (result.token) {
                successElement.querySelector('.token').textContent = result.token.id;
                $('#stripeToken').val(result.token.id);
                successElement.classList.remove('d-none');

                document.querySelector('form').submit();


            } else if (result.error) {
                errorElement.textContent = result.error.message;
                errorElement.classList.remove('d-none');
            }
        }

        card.on('change', function(event) {
            setOutcome(event);
        });

        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            stripe.createToken(card).then(setOutcome);
        });
    </script> --}}
@endpush
