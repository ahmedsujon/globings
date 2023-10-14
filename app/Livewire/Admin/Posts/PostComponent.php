<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    
    public function render()
    {
        $articles = Post::where('title', 'like', '%'.$this->searchTerm.'%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.posts.post-component', ['articles'=>$articles])->layout('livewire.admin.layouts.base');
    }
}
