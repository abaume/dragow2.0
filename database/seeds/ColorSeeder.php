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
    }
}
