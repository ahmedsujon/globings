<?php

namespace App\Livewire\App;

use App\Models\Category;
use App\Models\CommentLike;
use App\Models\CommentReply;
use App\Models\CommentReplyLike;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\SearchHistory;
use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $categories, $cities, $pagination_value = 50, $search_term, $comment, $comment_filter_by, $content, $images = [], $tags, $sort_category, $sort_sub_sub_category, $sort_location, $sort_tag, $sort_type, $search_histories;
    public function mount()
    {
        $this->search_term = request()->get('search');
        $this->categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('name', 'ASC')->get();
        $this->cities = Shop::groupBy('city')->where('city', '!=', '')->pluck('city')->toArray();
        $this->search_histories = SearchHistory::orderBy('count', 'DESC')->get();

        $this->sort_category = request()->get('category');
        $this->sort_sub_sub_category = request()->get('sub_categories');
        $this->sort_location = request()->get('location');
        $this->sort_tag = request()->get('tag');
        $this->sort_type = request()->get('sort') ? request()->get('sort') : 'ASC';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'content' => 'required',
            'tags' => 'required',
            'images' => 'required',
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

    public $post_status = 0;
    public function createPost()
    {
        $this->validate([
            'content' => 'required',
            'tags' => 'required',
            'images' => 'required',
        ]);

        if($this->post_status == 1){
            $post = new Post();
            $post->category_id = Shop::where('user_id', user()->id)->first()->category_id;
            $post->user_id = user()->id;
            $post->content = $this->content;
            $post->tags = $this->tags;
            $post->searchable_tags = tagify_array($this->tags);
            $post->status = 1;

            if ($this->images) {
                $postImgs = [];
                foreach ($this->images as $key => $img) {
                    $image = Image::make($this->images[$key])->resize(626, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->encode('webp', 75);
                    $directory = 'uploads/posts/';

                    $fileName = uniqid() . Carbon::now()->timestamp . '.webp';
                    Storage::disk('do_spaces')->put($directory.$fileName, $image->getEncoded());
                    $postImgs[] = env('DO_SPACES_ENDPOINT') . '/' . $directory . $fileName;

                    // $image = Carbon::now()->timestamp . '.' . $this->images[$key]->extension();
                    // $this->images[$key]->storeAs('uploads/posts', $image, 'do_spaces');
                    // $postImgs[] = env('DO_SPACES_ENDPOINT') . '/uploads/posts/' . $image;
                }
                $post->images = $postImgs;
            }
            $post->save();

            $shop = Shop::where('user_id', user()->id)->first();

            pushNotification('New Post', ''.$shop->name.' has created a new post');

            $this->content = '';
            $this->images = '';
            session()->flash('post_created');
            return redirect()->route('app.home');
        }
    }

    public $sub_categories;
    public function getSubCategories($cat)
    {
        $this->sub_categories = Category::where('status', 1)->where('parent_id', $cat)->orderBy('name', 'ASC')->get();
    }

    public function addSearchHistory($value, $location)
    {
        $getData = SearchHistory::where('search_value', $value)->where('location_value', $location)->first();

        if($getData) {
            $getData->count += 1;
            $getData->save();
        } else {
            $data = new SearchHistory();
            $data->search_value = $value;
            $data->location_value = $location;
            $data->count = 1;
            $data->save();
        }
    }

    public function render()
    {
        $posts = Post::select('posts.*')->join('shops', 'shops.user_id', 'posts.user_id')->where(function ($query) {
            $query->where('shops.name', 'like', '%' . $this->search_term . '%')
                ->orWhere('shops.shop_category', 'like', '%' . $this->search_term . '%')
                ->orWhere('posts.title', 'like', '%' . $this->search_term . '%')
                ->orWhere('posts.content', 'like', '%' . $this->search_term . '%')
                ->orWhere('posts.searchable_tags', 'like', '%' . $this->search_term . '%')
                ->orWhere('shops.sub_sub_category', 'like', '%' . $this->search_term . '%');
        })->where('posts.status', 1)->orderBy('posts.id', $this->sort_type);

        // if ($this->sort_category) {
        //     $posts = $posts->where('shops.category_id', $this->sort_category);
        // }

        // if ($this->sort_sub_sub_category) {
        //     $sub_sub_categories = explode(',', $this->sort_sub_sub_category);

        //     $posts = $posts->where(function ($query) use ($sub_sub_categories) {
        //         foreach ($sub_sub_categories as $category) {
        //             $query->orWhere('shops.sub_sub_category', 'LIKE', '%"'.$category.'"%');
        //         }
        //     });
        // }

        if ($this->sort_location) {
            $posts = $posts->where('shops.city', $this->sort_location);
        }

        if ($this->sort_tag) {
            $posts = $posts->where('posts.searchable_tags', 'like', '%' . $this->sort_tag . '%');
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
