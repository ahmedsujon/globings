<?php

namespace App\Livewire\App\Shop;
use App\Models\Category;
use App\Models\User;
use Livewire\Component;

class ShopsComponent extends Component
{
    public $categories, $pagination_value = 50, $search_term;
    public $phone, $edit_id;
    
    public function mount()
    {
        $this->search_term = request()->get('search');
        $this->categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
    }

    public function updatePhone()
    {
        $this->validate([
            'phone' => 'required',
        ]);

        $data = User::find($this->edit_id);
        $data->phone = $this->phone;
        $data->save();
    }

    public function render()
    {
        return view('livewire.app.shop.shops-component')->layout('livewire.app.layouts.base');
    }
}
