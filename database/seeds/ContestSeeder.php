<?php

use App\Models\Contest;
use Illuminate\Database\Seeder;

class ContestSeeder extends Seeder
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
            Contest::create([
                'level'         => $faker->word,
                'main_stat'     => $faker->word,
                'gain'          => $faker->word
            ]);
        }
    }
}
