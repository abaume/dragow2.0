<?php

use App\Models\Alliance;
use Illuminate\Database\Seeder;

class AllianceSeeder extends Seeder
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
            Alliance::create([
                'name' => $faker->unique()->word
            ]);
        }
    }
}
