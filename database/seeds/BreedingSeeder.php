<?php

use App\Models\Breeding;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreedingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->pluck('id')->all();
        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create();
            Breeding::create([
                'name'      => $faker->word,
                'user_uuid' => $faker->randomElement($user)
            ]);
        }
    }
}
