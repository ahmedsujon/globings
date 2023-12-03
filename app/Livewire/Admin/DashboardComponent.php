<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\Shop;
use App\Models\User;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $total_admin = Admin::count();
        $total_user = User::count();
        $total_shop = Shop::count();
        $total_post = Post::count();
        $total_category = Category::where('parent_id', 0)->count();
        $total_sub_category = Category::where('parent_id', '!=', 0)->count();
        $shops = Shop::orderBy('id', 'DESC')->paginate();
        return view(
            'livewire.admin.dashboard-component',
            [
                'total_admin' => $total_admin,
                'total_user' => $total_user,
                'total_shop' => $total_shop,
                'total_post' => $total_post,
                'total_category' => $total_category,
                'total_sub_category' => $total_sub_category,
                'shops' => $shops,
            ]
        )->layout('livewire.admin.layouts.base');
    }
}
