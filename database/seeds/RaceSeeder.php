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
        $faker = \Faker\Factory::create();
        Race::create([
            'name'      => 'gloom',
            'feature'   => $faker->word
        ])
        ;Race::create([
        'name'      => 'medusas',
        'feature'   => $faker->word
    ]);
        Race::create([
            'name'      => 'scalebounds',
            'feature'   => $faker->word
        ]);
        Race::create([
            'name'      => 'sentinel',
            'feature'   => $faker->word
        ]);
        Race::create([
            'name'      => 'shear',
            'feature'   => $faker->word
        ]);
        Race::create([
            'name'      => 'snack',
            'feature'   => $faker->word
        ]);
        Race::create([
            'name'      => 'trapper',
            'feature'   => $faker->word
        ]);



//        for ($i = 0; $i < 5; $i++) {
//            $faker = \Faker\Factory::create();
//            Race::create([
//                'name'      => $faker->unique()->word,
//                'feature'   => $faker->word
//            ]);
//        }
    }
}
