<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        //Creates 10 sample songs through the factory
        Song::factory(10)->create();
    }
}

/*
NOTES:
'Seeders' are used to create default data that will be present in the final database. This is used when setting up a database, so the data must be clear and structured.
*/
