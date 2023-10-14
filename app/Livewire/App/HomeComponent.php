<?php

namespace App\Livewire\App;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;

    public $categories, $pagination_value = 7;
    public function mount()
    {
        $this->categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
    }

    public function render()
    {
        $posts = Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate($this->pagination_value);

        return view('livewire.app.home-component', ['posts' => $posts])->layout('livewire.app.layouts.base');
    }
}
