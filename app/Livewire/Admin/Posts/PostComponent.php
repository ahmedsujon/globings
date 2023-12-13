<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    public $delete_id;

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatch('show_delete_confirmation');
    }

    public function deleteData()
    {
        $brand = Post::find($this->delete_id);
        $brand->delete();
        $this->dispatch('post_deleted');
        $this->delete_id = '';
    }

    public function render()
    {
        $articles = Post::where('content', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.posts.post-component', ['articles' => $articles])->layout('livewire.admin.layouts.base');
    }
}
