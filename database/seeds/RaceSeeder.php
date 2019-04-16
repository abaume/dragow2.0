<?php

use App\Models\Race;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = DB::table('attributes')->pluck('id')->all();

        $faker = \Faker\Factory::create();
        Race::create([
            'name' => 'gloom',
            'attributes_uuid' => $faker->randomElement($attributes)
        ]);
        Race::create([
            'name' => 'medusas',
            'attributes_uuid' => $faker->randomElement($attributes)
        ]);
        Race::create([
            'name' => 'scalebounds',
            'attributes_uuid' => $faker->randomElement($attributes)
        ]);
        Race::create([
            'name' => 'sentinel',
            'attributes_uuid' => $faker->randomElement($attributes)
        ]);
        Race::create([
            'name' => 'shear',
            'attributes_uuid' => $faker->randomElement($attributes)
        ]);
        Race::create([
            'name' => 'snack',
            'attributes_uuid' => $faker->randomElement($attributes)
        ]);
        Race::create([
            'name' => 'trapper',
            'attributes_uuid' => $faker->randomElement($attributes)
        ]);
    }
}
