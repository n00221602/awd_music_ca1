<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // $this->call(SongSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        // LabelSeeder calls hasSongs(). This seeds the songs table with 20 songs per label
        $this->call(LabelSeeder::class);
        // ArtistSeeder creates artists then gets all songs from the database and assigns artists to many songs
        $this->call(ArtistSeeder::class);


    }
}
