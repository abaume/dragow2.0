<?php

use App\Models\Totem;
use Illuminate\Database\Seeder;

class TotemSeeder extends Seeder
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
            Totem::create([
                'name'          => $faker->unique()->name
            ]);
        }
    }
}
