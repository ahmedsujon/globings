<div>
    <section class="pricing_wrapper">
        <div class="price_text_area">
            <div class="container" style="text-align: center;">
                <h4 class="notification_title">Make Payment</h4>
            </div>
        </div>
        <div class="container">
                <form action="" wire:submit.prevent='subscribePlan'>
                        <div class="pricing_item">
                            <h4>AAAA:</h4>
                            <div class="pricing_area">
                                {{-- @foreach ($plan->timePlans as $timePlan)
                                    <div class="form-check">
                                        <input class="form-check-input" wire:model.live='plan_id' type="radio" value="{{ $timePlan->id }}" name="flexRadioDefault" id="basicCheckBox_{{ $timePlan->id }}" />
                                        <label class="form-check-label" for="basicCheckBox_{{ $timePlan->id }}">
                                            <h5 class="title" style="font-size: 16px;"><b>{{ $timePlan->name }}</b> - <small>€{{ $timePlan->price }}/month</small></h5>
                                            <p class="sub_title" style="font-size: 12px;">{{ $timePlan->description }}</p>
                                        </label>
                                    </div>
                                @endforeach --}}
                            </div>
                        </div>

                    {{-- @error('plan_id')
                        <div class="invalid-feedback" style="margin: -10px 0px 10px 25px;">{{ $message }}</div>
                    @enderror --}}

                    <button type="submit" class="login_btn login_btn_fill">
                        {!! loadingStateWithTextApp('subscribePlan', 'Subscribe') !!}
                    </button>
                </form>

        </div>
    </section>
</div>
