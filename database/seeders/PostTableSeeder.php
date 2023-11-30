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
        $array = [1, 2, 3];
        for ($i = 1; $i <= 15; $i++) {
            $faker = Faker::create();
            $title = $faker->sentence;
            $slug = Str::slug($title);

            $collection = collect($array);
            $shuffled = $collection->shuffle();
            $values = $shuffled->all();

            $post = new Post();
            $post->user_id = 2;
            $post->category_id = Category::inRandomOrder()->first()->id;
            $post->title = $title;
            $post->slug = $slug;
            $post->content = $faker->paragraph;
            $post->images = ['assets/app/images/post/post_img'.$values[0].'.png', 'assets/app/images/post/post_img'.$values[1].'.png', 'assets/app/images/post/post_img'.$values[2].'.png'];
            $post->tags = '[{"value":"Tag 1"},{"value":"Tag 2"}]';
            $post->searchable_tags = '["Tag 1","Tag 2"]';
            $post->status = 1;
            $post->save();
        }
    }
}
