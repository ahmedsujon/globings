<?php

namespace App\Livewire\App\Bings;

use App\Models\RedeemHistory;
use Livewire\Component;

class RedeemSuccess extends Component
{
    public $history;
    public function mount($redeem_history_id){
        $this->history = RedeemHistory::find($redeem_history_id);
    }

    public function render()
    {
        return view('livewire.app.bings.redeem-success')->layout('livewire.app.layouts.base');
    }
}
