<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */


class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        //Creates the sample data for our database
        return [
            'title' => fake()->sentence,
            'genre' => fake()->word,
            'album' => fake()->word,
            'release_date' => fake()->date,
            'length' => fake()->time,
            'created_at' => now(),
            'created_at' => now(),
            'song_image' => fake()->imageUrl,

        ];
    }
}
/*
NOTES:
'Factories' are used to create temporary data that will not be present in the final database. This is only used for testing, so the data is randomized and only used as sample data
*/
