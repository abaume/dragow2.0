<?php

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'name'          => 'gloom'
        ]);
        Color::create([
            'name'          => 'gloomb'
        ]);
        Color::create([
            'name'          => 'gloomg'
        ]);
        Color::create([
            'name'          => 'sentinel'
        ]);
        Color::create([
            'name'          => 'sentinel_real'
        ])
        ;Color::create([
            'name'          => 'medusas'
        ]);
        Color::create([
            'name'          => 'scalebounds'
        ]);
        Color::create([
            'name'          => 'the_shear'
        ]);
        Color::create([
            'name'          => 'snack'
        ]);
        Color::create([
            'name'          => 'trapper_1'
        ]);
    }
}
