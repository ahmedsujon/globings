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
        if(request()->get('category')){
            $posts = Post::select('posts.*')->join('shops', 'shops.user_id', 'posts.user_id')->where('posts.category_id', request()->get('category'))->where('shops.name', 'like', '%'.$this->search_term.'%')->where('posts.status', 1)->orderBy('posts.created_at', 'DESC')->paginate($this->pagination_value);
        } else {
            $posts = Post::select('posts.*')->join('shops', 'shops.user_id', 'posts.user_id')->where('shops.name', 'like', '%'.$this->search_term.'%')->where('posts.status', 1)->orderBy('posts.created_at', 'DESC')->paginate($this->pagination_value);
        }

        $random_one = Post::inRandomOrder()->take(1)->get();
        return view('livewire.app.profile.recent-photos-component', ['posts'=>$posts, 'random_one'=>$random_one])->layout('livewire.app.layouts.base');
    }
}
