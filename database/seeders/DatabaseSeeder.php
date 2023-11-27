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
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Song::factory()->count(50)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);


    }
}
