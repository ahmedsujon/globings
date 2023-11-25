<?php

namespace App\Livewire\App;

use App\Models\Category;
use App\Models\CommentLike;
use App\Models\CommentReply;
use App\Models\CommentReplyLike;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $categories, $cities, $pagination_value = 50, $search_term, $comment, $comment_filter_by, $content, $images = [], $tags, $sort_category, $sort_city, $sort_tag;
    public function mount()
    {
        $this->search_term = request()->get('search');
        $this->categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
        $this->cities = Shop::where('city', '!=', '')->pluck('city')->toArray();

        $this->sort_category = request()->get('category');
        $this->sort_city = request()->get('city');
        $this->sort_tag = request()->get('tag');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'content' => 'required',
            'tags' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:png,jpg,jpeg,gif|image|max:2048',
        ]);
    }

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

    public function removeImg($key)
    {
        unset($this->images[$key]);
    }

    public function createPost()
    {
        $this->validate([
            'content' => 'required',
            'tags' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:png,jpg,jpeg,gif|image|max:2048',
        ]);

        $post = new Post();
        $post->category_id = 1;
        $post->slug = Str::slug(Str::lower(Str::random(4)) . ' ' . Str::lower(Str::random(4)) . ' ' . Str::lower(Str::random(4)));
        $post->user_id = user()->id;
        $post->content = $this->content;
        $post->tags = $this->tags;
        $post->searchable_tags = tagify_array($this->tags);
        $post->status = 1;
        if ($this->images) {
            $postImgs = [];
            foreach ($this->images as $key => $img) {
                $fileName = uniqid() . Carbon::now()->timestamp . '.' . $this->images[$key]->extension();
                $this->images[$key]->storeAs('posts', $fileName);

                $name = 'uploads/posts/' . $fileName;
                $postImgs[] = $name;
            }
            $post->images = $postImgs;
        }
        $post->save();

        session()->flash('post_created');
        return redirect()->route('app.home');

        $this->content = '';
        $this->images = '';
    }

    public function reInitializeSwiper()
    {
        $this->dispatch('reInitializeSwiper');
    }

    public function render()
    {
        $posts = Post::select('posts.*')->join('shops', 'shops.user_id', 'posts.user_id')->where('shops.name', 'like', '%' . $this->search_term . '%')->where('posts.status', 1)->orderBy('posts.created_at', 'DESC');

        if ($this->sort_category) {
            $categories = explode(',', $this->sort_category);

            $posts = $posts->whereIn('posts.category_id', $categories);
        }

        if ($this->sort_city) {
            $posts = $posts->where('shops.city', $this->sort_city);
        }

        if ($this->sort_tag) {
            $posts = $posts->where('posts.searchable_tags', 'like', '%'.$this->sort_tag.'%');
        }

        $posts = $posts->paginate($this->pagination_value);

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

        return view('livewire.app.home-component', ['posts' => $posts, 'comments' => $comments])->layout('livewire.app.layouts.base');
    }
}
