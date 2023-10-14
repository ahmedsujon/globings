<?php

namespace App\Livewire\App;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class HomeComponent extends Component
{
    public $categories;
    public function mount()
    {
        $this->categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
    }

    public function render()
    {
        $posts = Post::where('status', 1)->orderBy('created_at', 'DESC')->get();

        return view('livewire.app.home-component', ['posts' => $posts])->layout('livewire.app.layouts.base');
    }
}
