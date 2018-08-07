<?php

use App\Models\Appearance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppearanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $races = DB::table('races')->pluck('id')->all();
        $colors = DB::table('colors')->pluck('id')->all();

        for ($i = 0; $i < 100; $i++) {
            $faker = \Faker\Factory::create();
            Appearance::create([
                'race' => $faker->randomElement($races),
                'color' => $faker->randomElement($colors),
                'link_asset' => '../assets/dragons/gloom.jpg'
            ]);
        }
    }
}
