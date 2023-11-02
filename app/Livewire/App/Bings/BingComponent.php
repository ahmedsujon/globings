<?php

namespace App\Livewire\App\Bings;

use Livewire\Component;
use App\Models\BingsHistory;
use Carbon\Carbon;

class BingComponent extends Component
{
    public $histories, $referred_bings = 0;

    public function mount()
    {
        $dates = BingsHistory::groupBy('created_at')->select('created_at')->where('user_id', user()->id)->orderBy('created_at', 'DESC')->get();

        $all_histories = [];
        foreach ($dates as $date) {
            $his = BingsHistory::where('user_id', user()->id)->whereDay('created_at', Carbon::parse($date->created_at)->format('d'))->whereMonth('created_at', Carbon::parse($date->created_at)->format('m'))->whereYear('created_at', Carbon::parse($date->created_at)->format('Y'))->get();

            $all_histories[] = [
                'date' => Carbon::parse($date->created_at)->format('F Y'),
                'data' => $his
            ];
        }

        $this->histories = $all_histories;
        $this->referred_bings = BingsHistory::where('user_id', user()->id)->where('type', 'referral')->get()->sum('bings');
    }

    public function render()
    {
        return view('livewire.app.bings.bing-component')->layout('livewire.app.layouts.base');
    }
}
