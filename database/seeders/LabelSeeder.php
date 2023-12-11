<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Label;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {

        //calls the Label factory 3 times. Each time it's called, 4 songs are created for that Label.
        Label::factory()
        ->times(3)
        ->hasSongs(4)
        ->create();
    }
}
