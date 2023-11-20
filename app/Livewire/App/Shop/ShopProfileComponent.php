<?php

namespace App\Livewire\App\Shop;

use App\Models\Contact;
use App\Models\Shop;
use App\Models\ShopBookmark;
use App\Models\ShopFavourite;
use App\Models\ShopReview;
use Livewire\Component;

class ShopProfileComponent extends Component
{
    public $shop, $name, $email, $phone, $message, $rating, $comment, $total_reviews, $reviews;
    public function mount($user_id)
    {
        $shop = Shop::where('user_id', $user_id)->first();
        $this->shop = $shop;

        $this->total_reviews = ShopReview::where('shop_id', $shop->id)->count();
        $this->reviews = ShopReview::where('shop_id', $shop->id)->get();

        if (!session()->has('shop_visited')){
            $shop = Shop::where('id', $shop->id)->first();
            $shop->visited += 1;
            $shop->save();

            session()->put('shop_visited', 'true');
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);
    }

    public function sendContactMsg()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $msg = new Contact();
        $msg->shop_id = $this->shop->id;
        $msg->name = $this->name;
        $msg->email = $this->email;
        $msg->phone = $this->phone;
        $msg->message = $this->message;
        $msg->save();

        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';

        session()->flash('success_contact', 'Contact message sent successfully');
    }

    public function favorite()
    {
        if(user()){
            $getFav = ShopBookmark::where('shop_id', $this->shop->id)->where('user_id', user()->id)->first();
            if($getFav){
                $getFav->delete();
            } else {
                $fav = new ShopBookmark();
                $fav->shop_id = $this->shop->id;
                $fav->user_id = user()->id;
                $fav->save();
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function addReview()
    {
        $this->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $getReview = ShopReview::where('shop_id', $this->shop->id)->where('user_id', user()->id)->first();

        if(!$getReview){
            $msg = new ShopReview();
            $msg->shop_id = $this->shop->id;
            $msg->user_id = user()->id;
            $msg->rating = $this->rating;
            $msg->comment = $this->comment;
            $msg->save();

            $this->rating = '';
            $this->comment = '';

            session()->flash('success_review', 'Review added successfully');
        } else {
            session()->flash('error_review', 'Already reviewed');
        }
    }

    public function render()
    {
        return view('livewire.app.shop.shop-profile-component')->layout('livewire.app.layouts.base');
    }
}
