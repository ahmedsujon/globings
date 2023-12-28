<?php

namespace App\Livewire\Admin\Support;

use App\Models\Support;
use Livewire\Component;
use Livewire\WithPagination;

class SupportComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;

    public function changeStatus($id)
    {
        $support = Support::find($id);
        if ($support->status == 0) {
            $support->status = 1;
        } else {
            $support->status = 0;
        }
        $support->save();
        $this->dispatch('success', ['message' => 'Status updated successfully']);
    }

    public function render()
    {
        $support_messages = Support::where('contact_name', 'like', '%'.$this->searchTerm.'%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.support.support-component', ['support_messages'=>$support_messages])->layout('livewire.admin.layouts.base');
    }
}
