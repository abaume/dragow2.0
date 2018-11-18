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

        /*$races = DB::table('races')->pluck('id')->where("name", "=", "gloom");
        $color1 = DB::table('colors')->pluck('id')->where("name", "=", "gloom");
        $color2 = DB::table('colors')->pluck('id')->where("name", "=", "gloomb");
        $color3 = DB::table('colors')->pluck('id')->where("name", "=", "gloomg");

        Appearance::create([
            'race' => $races->first(),
            'color' => $color1->first()
        ]);
        Appearance::create([
            'race' => $races->first(),
            'color' => $color2->first()
        ]);
        Appearance::create([
            'race' => $races->first(),
            'color' => $color3->first()
        ]);*/

        /*$races = DB::table('races')->pluck('id')->all();
        $colors = DB::table('colors')->pluck('id')->all();

        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create();
            Appearance::create([
                'race' => $faker->randomElement($races),
                'color' => $faker->randomElement($colors),
            ]);
        }*/
    }
}
