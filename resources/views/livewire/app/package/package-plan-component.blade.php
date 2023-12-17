<div>
    <section class="pricing_wrapper">
        <div class="price_text_area">
            <div class="container" style="text-align: center;">
                <h4 class="notification_title">Plan Subscription</h4>

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
            @if ($plans->count() > 0)
                <form action="" wire:submit.prevent='subscribePlan'>
                    @foreach ($plans as $plan)
                        <div class="pricing_item">
                            <h4>{{ $plan->name }}:</h4>
                            <div class="pricing_area">
                                @foreach ($plan->timePlans as $timePlan)
                                    <div class="form-check">
                                        <input class="form-check-input" wire:model.live='plan_id' type="radio" value="{{ $timePlan->id }}" name="flexRadioDefault" id="basicCheckBox_{{ $timePlan->id }}" />
                                        <label class="form-check-label" for="basicCheckBox_{{ $timePlan->id }}">
                                            <h5 class="title" style="font-size: 16px;"><b>{{ $timePlan->name }}</b> - <small>€{{ $timePlan->price }}/month</small></h5>
                                            <p class="sub_title" style="font-size: 12px;">{{ $timePlan->description }}</p>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    @error('plan_id')
                        <div class="invalid-feedback" style="margin: -10px 0px 10px 25px;">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="login_btn login_btn_fill">
                        {!! loadingStateWithTextApp('subscribePlan', 'Subscribe') !!}
                    </button>
                </form>
            @else

            @endif
        </div>
    </section>
</div>
