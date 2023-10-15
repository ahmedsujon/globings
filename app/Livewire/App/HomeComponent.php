<?php

namespace App\Livewire\App;

use App\Models\Category;
use App\Models\CommentLike;
use App\Models\CommentReply;
use App\Models\CommentReplyLike;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $categories, $pagination_value = 7, $comment, $comment_filter_by, $content, $images = [];
    public function mount()
    {
        $this->categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'content' =>'required',
            'images' =>'required',
        ]);
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

    public $total_like = 0, $selected_post_id, $all_post_reacts;
    public function getPostInfo($post_id)
    {
        $this->total_like = total_post_like($post_id);
        $this->selected_post_id = $post_id;

        $reacted_users = PostLike::where('post_id', $post_id)->pluck('user_id')->toArray();
        $this->all_post_reacts = User::whereIn('id', $reacted_users)->select('id', 'first_name', 'last_name', 'avatar')->get();
    }

    public $comment_id;
    public function replyComment($comment_id)
    {
        $this->comment_id = $comment_id;
        $this->dispatch('focusOnComment');
    }

    public function addComment()
    {
        if(user()){
            $this->validate([
                'comment' => 'required'
            ]);

            if($this->comment_id){
                $comment = new CommentReply();
                $comment->user_id = user()->id;
                $comment->comment_id = $this->comment_id;
                $comment->comment = $this->comment;
                $comment->status = 1;
                $comment->save();
            } else {
                $comment = new PostComment();
                $comment->user_id = user()->id;
                $comment->post_id = $this->selected_post_id;
                $comment->comment = $this->comment;
                $comment->status = 1;
                $comment->save();
            }

            $this->comment = '';
            $this->comment_id = '';
        } else {
            return redirect()->route('login');
        }
    }

    public function likeComment($comment_id)
    {
        if(user()){
            $getLike = CommentLike::where('user_id', user()->id)->where('comment_id', $comment_id)->first();
            if($getLike){
                $getLike->delete();
            } else {
                $like = new CommentLike();
                $like->user_id = user()->id;
                $like->comment_id = $comment_id;
                $like->save();
            }

        } else {
            return redirect()->route('login');
        }
    }

    public function likeCommentReply($comment_reply_id)
    {
        if(user()){
            $getLike = CommentReplyLike::where('user_id', user()->id)->where('comment_reply_id', $comment_reply_id)->first();
            if($getLike){
                $getLike->delete();
            } else {
                $like = new CommentReplyLike();
                $like->user_id = user()->id;
                $like->comment_reply_id = $comment_reply_id;
                $like->save();
            }

        } else {
            return redirect()->route('login');
        }
    }

    public function createPost()
    {
        $this->validate([
            'content' =>'required',
            'images' =>'required',
        ]);

        dd($this->content);
    }

    public function reInitializeSwiper()
    {
        $this->dispatch('reInitializeSwiper');
    }

    public function render()
    {
        $posts = Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate($this->pagination_value);

        if($this->selected_post_id){
            $comments = PostComment::where('post_id', $this->selected_post_id);

            if($this->comment_filter_by){
                if($this->comment_filter_by == 'recent'){
                    $comments = $comments->orderBy('created_at', 'DESC');
                }

                if($this->comment_filter_by == 'oldest'){
                    $comments = $comments->orderBy('created_at', 'ASC');
                }
            }

            else {
                $comments = $comments->orderBy('created_at', 'DESC');
            }

            $comments = $comments->paginate(10);
        } else {
            $comments = false;
        }

        return view('livewire.app.home-component', ['posts' => $posts, 'comments' => $comments])->layout('livewire.app.layouts.base');
    }
}
