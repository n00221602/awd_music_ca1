<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Artist::factory()
        ->times(3)
        ->create();

        foreach(Song::all() as $song)
        {
            $artists = Artist::inRandomOrder()->take(rand(1,3))->pluck('id');
            $song->artists()->attach($artists);
        }
    }
}
