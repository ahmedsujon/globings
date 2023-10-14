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
        for ($i = 1; $i <= 20; $i++) {
            $faker = Faker::create();
            $title = $faker->sentence;
            $slug = Str::slug($title);

            $post = new Post();
            $post->user_id = 2;
            $post->category_id = Category::inRandomOrder()->first()->id;
            $post->title = $title;
            $post->slug = $slug;
            $post->content = $faker->paragraph;
            $post->images = ['assets/images/placeholder-rect.jpg', 'assets/images/placeholder-rect.jpg', 'assets/images/placeholder-rect.jpg'];
            $post->status = 1;
            $post->save();

        }
    }
}