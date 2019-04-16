<?php

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributSeeder extends Seeder
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
            Attribute::create([
                'strength'   => $faker->randomDigitNotNull(),
                'intelligence'  => $faker->randomDigitNotNull(),
                'resistance'  => $faker->randomDigitNotNull(),
                'speed'  => $faker->randomDigitNotNull(),
                'discretion'  => $faker->randomDigitNotNull()
            ]);
        }
    }
}
