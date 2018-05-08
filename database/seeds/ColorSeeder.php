<?php

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create();
            Color::create([
                'name'          => $faker->unique()->word
            ]);
        }
    }
}
