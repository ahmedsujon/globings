<?php

namespace App\Livewire\App\Profile;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use App\Models\PostLike;
use App\Models\CommentLike;
use App\Models\PostComment;
use App\Models\CommentReply;
use Livewire\WithPagination;
use App\Models\CommentReplyLike;

class RecentPostComponent extends Component
{
    use WithPagination;

    public $comment, $comment_filter_by, $content;

    public function like($post_id)
    {
        if (user()) {
            $getLike = PostLike::where('user_id', user()->id)->where('post_id', $post_id)->first();
            if ($getLike) {
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
        if (user()) {
            $this->validate([
                'comment' => 'required',
            ]);

            if ($this->comment_id) {
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
        if (user()) {
            $getLike = CommentLike::where('user_id', user()->id)->where('comment_id', $comment_id)->first();
            if ($getLike) {
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
        if (user()) {
            $getLike = CommentReplyLike::where('user_id', user()->id)->where('comment_reply_id', $comment_reply_id)->first();
            if ($getLike) {
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

    public function render()
    {
        $posts = Post::select('posts.*')->join('shops', 'shops.user_id', 'posts.user_id')->where('shops.name', 'like', '%' . request()->get('search') . '%')->where('posts.status', 1)->orderBy('posts.created_at', 'DESC')->get();

        if ($this->selected_post_id) {
            $comments = PostComment::where('post_id', $this->selected_post_id);

            if ($this->comment_filter_by) {
                if ($this->comment_filter_by == 'recent') {
                    $comments = $comments->orderBy('created_at', 'DESC');
                }

                if ($this->comment_filter_by == 'oldest') {
                    $comments = $comments->orderBy('created_at', 'ASC');
                }
            } else {
                $comments = $comments->orderBy('created_at', 'DESC');
            }

            $comments = $comments->paginate(10);
        } else {
            $comments = false;
        }

        return view('livewire.app.profile.recent-post-component', ['posts' => $posts, 'comments' => $comments])->layout('livewire.app.layouts.base');
    }
}
