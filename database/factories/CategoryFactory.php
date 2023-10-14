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
        $name = $this->faker->unique(true)->words($nb=1, $asText=true);
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'avatar' => 'icon_' . $this->faker->unique(true)->numberBetween(1, 5).'.png',
            'status' => $this->faker->boolean(),
        ];
    }
}
