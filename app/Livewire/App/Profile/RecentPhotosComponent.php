<?php

namespace App\Livewire\App\Profile;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class RecentPhotosComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $categories, $pagination_value = 50, $search_term;

    public function mount()
    {
        $this->search_term = request()->get('search');
        $this->categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
    }

    public function render()
    {
        $allImages = [];

        $posts_img = Post::where('user_id', user()->id)->pluck('images')->toArray();
        foreach($posts_img as $post_img){
            foreach($post_img as $img){
                $allImages[] = $img;
            }
        }

        return view('livewire.app.profile.recent-photos-component', ['allImages'=>$allImages])->layout('livewire.app.layouts.base');
    }
}
