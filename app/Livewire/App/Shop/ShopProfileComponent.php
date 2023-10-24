<?php

namespace App\Livewire\App\Shop;

use App\Models\Contact;
use App\Models\Shop;
use Livewire\Component;

class ShopProfileComponent extends Component
{
    public $shop, $name, $email, $phone, $message;
    public function mount($user_id)
    {
        $shop = Shop::where('user_id', $user_id)->first();
        $this->shop = $shop;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
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

    public function render()
    {
        return view('livewire.app.shop.shop-profile-component')->layout('livewire.app.layouts.base');
    }
}