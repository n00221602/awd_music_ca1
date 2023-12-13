<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'monthly_listeners' => $this->faker->numberBetween(100000, 10000000), //returns a fake number between 100,000 and 10,000,000
            'debut' => $this->faker->year($max = 'now'), //returns a fake year up until our current year
        ];
    }
}
