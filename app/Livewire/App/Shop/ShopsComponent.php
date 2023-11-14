<?php

namespace App\Livewire\App\Shop;
use App\Models\Post;
use App\Models\Shop;
use App\Models\User;
use Livewire\Component;
use App\Models\Category;

class ShopsComponent extends Component
{
    public $categories, $pagination_value = 50, $searchTerm;
    public $phone, $edit_id;
    public function mount()
    {
        $this->searchTerm = request()->get('search');
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
        $shops = Shop::orderBy('id', 'DESC')
        ->where('city', 'like', '%' . $this->searchTerm . '%')
        ->paginate($this->pagination_value);
        return view('livewire.app.shop.shops-component', ['shops'=>$shops])->layout('livewire.app.layouts.base');
    }
}
