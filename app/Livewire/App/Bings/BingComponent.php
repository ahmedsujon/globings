<?php

namespace App\Livewire\App\Bings;

use App\Models\BingsHistory;
use App\Models\RedeemHistory;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class BingComponent extends Component
{
    public $histories, $referred_bings = 0, $amount, $bings;

    public function mount()
    {
        $dates = BingsHistory::groupBy('created_at')->select('created_at')->where('user_id', user()->id)->orderBy('created_at', 'DESC')->get();

        $all_histories = [];
        foreach ($dates as $date) {
            $his = BingsHistory::where('user_id', user()->id)->whereDay('created_at', Carbon::parse($date->created_at)->format('d'))->whereMonth('created_at', Carbon::parse($date->created_at)->format('m'))->whereYear('created_at', Carbon::parse($date->created_at)->format('Y'))->get();

            $all_histories[] = [
                'date' => Carbon::parse($date->created_at)->format('d F, Y'),
                'data' => $his,
            ];
        }

        $this->histories = $all_histories;
        $this->referred_bings = BingsHistory::where('user_id', user()->id)->where('type', 'referral')->get()->sum('bings');
    }

    public $payment_method, $phone, $email;

    public function redeem()
    {
        $this->validate([
            'payment_method' => 'required',
            'phone' => 'required_if:payment_method,bank',
            'email' => 'required_if:payment_method,paypal',
        ], [
            'payment_method.*' => 'Select payment method',
            'phone.*' => 'This field is required',
            'email.*' => 'This field is required',
        ]);
        sleep(1);

        if ($this->bings > user()->bings_balance) {
            $this->dispatch('error', ['message' => 'Not enough bings to redeem']);
        } else {
            $user = User::where('id', user()->id)->first();
            $user->bings_balance -= $this->bings;
            $user->save();

            $history = new RedeemHistory();
            $history->user_id = user()->id;
            $history->bings = $this->bings;
            $history->amount = $this->amount;
            $history->payment_method = $this->payment_method;
            $history->phone = $this->phone;
            $history->email = $this->email;
            $history->status = 0;
            $history->save();

            return redirect()->route('app.bingRedeemSuccess', ['redeem_history_id' => $history->id]);
        }

    }

    public function render()
    {
        $progress = 0;
        $target = 200;
        $bings = user()->bings_balance;

        $progress = ($bings / $target) * 100;

        if($progress >= 100){
            $progress = 100;
        }



        return view('livewire.app.bings.bing-component', ['progress' => $progress])->layout('livewire.app.layouts.base');
    }
}
