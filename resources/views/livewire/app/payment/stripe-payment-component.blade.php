<div>
    <section class="pricing_wrapper">
        <div class="price_text_area">
            <div class="container" style="text-align: center;">
                <h4 class="notification_title">Make Payment</h4>
            </div>
        </div>
        <div class="container">
            <div class="pricing_item" style="text-align: center;">
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

            <div class="pricing_item" style="text-align: center; margin-top: 35px;">
                <h4>Pay via Stripe</h4>
                <div class="pricing_area" style="text-align: center; padding-top: 20px;">
                    <form action="{{ route('app.payWithStripe') }}" method="POST">
                        @csrf
                        <input type="hidden" name="subscription_id" id="subscription_id" value="{{ $subscription->id }}" />
                        <button type="submit" class="login_btn login_btn_fill">
                            Pay Now
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
