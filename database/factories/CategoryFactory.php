<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_name = $this->faker->unique(true)->words($nb=4, $asText=true);
        $slug = Str::slug($category_name);
        
        return [
            'name' => $category_name,
            'slug' => $slug,
            'icon' => 'category_' . $this->faker->unique(true)->numberBetween(1, 5).'.png',
        ];
    }
}
