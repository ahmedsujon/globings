<?php

namespace App\Livewire\App\Scanner;

use App\Models\ScanHistory;
use App\Models\Shop;
use Livewire\Component;

class ScanSuccessComponent extends Component
{
    public $shop, $scan_history;
    public function mount()
    {
        if(request()->get('scan_id')){
            $this->scan_history = ScanHistory::find(request()->get('scan_id'));
            $this->shop = Shop::find($this->scan_history->shop_id);
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.app.scanner.scan-success-component')->layout('livewire.app.layouts.base');
    }
}
