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

        $races = DB::table('races')->where("name", 'gloom')->first()->id;
        $color1 = DB::table('colors')->where("name", "gloom")->first()->id;
        $color2 = DB::table('colors')->where("name", "=", "gloomb")->first()->id;
        $color3 = DB::table('colors')->where("name", "=", "gloomg")->first()->id;

        Appearance::create([
            'race' => $races,
            'color' => $color1
        ]);
        Appearance::create([
            'race' => $races,
            'color' => $color2
        ]);
        Appearance::create([
            'race' => $races,
            'color' => $color3
        ]);
    }
}
