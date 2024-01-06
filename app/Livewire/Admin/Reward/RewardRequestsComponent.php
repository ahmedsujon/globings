<?php

namespace App\Livewire\Admin\Reward;

use App\Models\RedeemHistory;
use Livewire\Component;
use Livewire\WithPagination;

class RewardRequestsComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;

    public function changeStatus($id)
    {
        $bings = RedeemHistory::find($id);
        if ($bings->status == 0) {
            $bings->status = 1;
        } else {
            $bings->status = 0;
        }
        $bings->save();
        $this->dispatch('success', ['message' => 'Status updated successfully']);
    }
        public function render()
    {
        $reward_requests = RedeemHistory::where('user_id', 'like', '%' . $this->searchTerm . '%')->where('status', 0)->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.reward.reward-requests-component', ['reward_requests'=>$reward_requests])->layout('livewire.admin.layouts.base');
    }
}
