<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->name,
            'date' => $this->faker->date(),
            'location' => $this->faker->address,
            'description' => $this->faker->text(500),
            'description' => $this->faker->text(500),
            'banner' => 'assets/images/placeholder-rect.jpg',
        ];
    }
}
