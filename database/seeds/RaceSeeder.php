<?php

use App\Models\Race;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $faker = \Faker\Factory::create();
            Race::create([
                'name'      => $faker->unique()->word,
                'feature'   => $faker->word
            ]);
        }
    }
}
