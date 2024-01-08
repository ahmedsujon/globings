<?php

namespace App\Livewire\Admin\Reward;

use App\Models\RedeemHistory;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class RewardRequestsComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;

    public function changeStatus($id)
    {
        $getUser = RedeemHistory::where('id', $id)->first();

        if ($getUser->status == 0) {
            $getUser->status = 1;

            $mailData['bings'] = $getUser->bings;
            $mailData['amount'] = $getUser->amount;
            Mail::send('emails.reward-success', $mailData, function ($message) use ($mailData) {
                $message->to($mailData['email'])->subject('Congratulations! Your bings successfully converted!');
            });
            $getUser->save();
        } else {
            $getUser->status = 0;
            $getUser->save();
        }
        $this->dispatchBrowserEvent('success', ['message' => 'Status updated successfully']);
    }
    public function render()
    {
        $reward_requests = RedeemHistory::where('user_id', 'like', '%' . $this->searchTerm . '%')->where('status', 0)->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.reward.reward-requests-component', ['reward_requests' => $reward_requests])->layout('livewire.admin.layouts.base');
    }
}
