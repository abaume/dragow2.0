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
        /* GLOOM */
        $dragon = DB::table('races')->where("name", 'gloom')->first()->id;
        $color = DB::table('colors')->where("name", "gloom")->first()->id;
        $color2 = DB::table('colors')->where("name", "=", "gloomb")->first()->id;
        $color3 = DB::table('colors')->where("name", "=", "gloomg")->first()->id;
        Appearance::create([
            'race' => $dragon,
            'color' => $color
        ]);
        Appearance::create([
            'race' => $dragon,
            'color' => $color2
        ]);
        Appearance::create([
            'race' => $dragon,
            'color' => $color3
        ]);

        /* SENTINEL */
        $dragon = DB::table('races')->where("name", 'sentinel')->first()->id;
        $color = DB::table('colors')->where("name", "=", "sentinel")->first()->id;
        $color5 = DB::table('colors')->where("name", "=", "sentinel_real")->first()->id;
        Appearance::create([
            'race' => $dragon,
            'color' => $color
        ]);
        Appearance::create([
            'race' => $dragon,
            'color' => $color5
        ]);

        /* SCALEBOUNDS */
        $dragon = DB::table('races')->where("name", 'scalebounds')->first()->id;
        $color = DB::table('colors')->where("name", "=", "scalebounds")->first()->id;
        Appearance::create([
            'race' => $dragon,
            'color' => $color
        ]);

        /* MEDUSAS */
        $dragon = DB::table('races')->where("name", 'medusas')->first()->id;
        $color = DB::table('colors')->where("name", "=", "medusas")->first()->id;
        Appearance::create([
            'race' => $dragon,
            'color' => $color
        ]);

        /* SHEAR */
        $dragon = DB::table('races')->where("name", 'shear')->first()->id;
        $color = DB::table('colors')->where("name", "=", "the_shear")->first()->id;
        Appearance::create([
            'race' => $dragon,
            'color' => $color
        ]);

        /* SNACK */
        $dragon = DB::table('races')->where("name", 'snack')->first()->id;
        $color = DB::table('colors')->where("name", "=", "snack")->first()->id;
        Appearance::create([
            'race' => $dragon,
            'color' => $color
        ]);

        /* TRAPPER */
        $dragon = DB::table('races')->where("name", 'trapper')->first()->id;
        $color = DB::table('colors')->where("name", "=", "trapper_1")->first()->id;
        Appearance::create([
            'race' => $dragon,
            'color' => $color
        ]);
    }
}
