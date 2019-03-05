<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        // Create 10 product records
        for ($i = 0; $i < 10; $i++) {
            Event::create([
                'title' => $faker->title,
                'description' => $faker->paragraph
            ]);
        }
    }
}
