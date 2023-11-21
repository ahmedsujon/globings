<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            $faker = Faker::create();
            $title = $faker->sentence;
            $slug = Str::slug($title);

            $post = new Post();
            $post->user_id = 2;
            $post->category_id = Category::inRandomOrder()->first()->id;
            $post->title = $title;
            $post->slug = $slug;
            $post->content = $faker->paragraph;
            $post->images = ['assets/app/images/post/post_img1.png', 'assets/app/images/post/post_img2.png', 'assets/app/images/post/post_img3.png'];
            $post->status = 1;
            $post->save();
        }
    }
}
