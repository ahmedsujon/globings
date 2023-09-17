<?php

namespace App\Livewire\App;

use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        return view('livewire.app.index-component')->layout('livewire.app.layouts.base');
    }
}
