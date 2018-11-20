<?php

use App\Models\Dragon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DragonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $breeding = DB::table('breedings')->pluck('id')->all();
        $appearance = DB::table('appearances')->pluck('id')->all();

        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create();
            Dragon::create([
                'name'              => $faker->word,
                'gender'            => $faker->randomElement(['male', 'female']),
                'statistics'        => $faker->randomDigit,
                'breeding_uuid'     => $faker->randomElement($breeding),
                'appearance_uuid'   => $faker->randomElement($appearance)
            ]);
        }
    }
}
