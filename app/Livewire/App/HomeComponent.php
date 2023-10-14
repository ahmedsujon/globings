<?php

namespace App\Livewire\App;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
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

    public function like($post_id)
    {
        if(user()){
            $getLike = PostLike::where('user_id', user()->id)->where('post_id', $post_id)->first();
            if($getLike){
                $getLike->delete();
            } else {
                $like = new PostLike();
                $like->user_id = user()->id;
                $like->post_id = $post_id;
                $like->save();
            }

        } else {
            return redirect()->route('login');
        }
    }

    public function comment($post_id)
    {
        if(user()){
            $comment = new PostComment();
            $comment->user_id = user()->id;
            $comment->post_id = $post_id;
            $comment->comment = $this->comment;
            $comment->status = 1;
            $comment->save();
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $posts = Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate($this->pagination_value);

        return view('livewire.app.home-component', ['posts' => $posts])->layout('livewire.app.layouts.base');
    }
}
